<?php

namespace Belvedere\LocalizedUrl;

class LocalizedUrl
{
    /**
     * The default locale of the application.
     *
     * @var string
     */
    protected $defaultLocale;

    /**
     * Initialize the locale manager.
     *
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;

        $this->setDefaultLocale($app->getLocale());

        $this->setCurrentLocale($app->request->segment(1));
    }

    /**
     * Set the default locale.
     *
     * @return void
     */
    public function setDefaultLocale($locale)
    {
        $this->defaultLocale = $locale;
    }

    /**
     * Get the default locale of the application.
     *
     * @return string
     */
    public function getDefaultLocale()
    {
        return $this->defaultLocale;
    }

    /**
     * Set the current locale for the application.
     *
     * @param  string  $locale
     * @return void
     */
    public function setCurrentLocale($locale)
    {
        if ($this->isAllowed($locale)) {
            $this->app->setLocale($locale);
        }
    }

    /**
     * Get the current locale pf the application.
     *
     * @param  string  $locale
     * @return void
     */
    public function getCurrentLocale()
    {
        return $this->app->getLocale();
    }

    /**
     * Check if the current locale is the default.
     *
     * @return boolean
     */
    public function isDefault()
    {
        return $this->getDefaultLocale() === $this->getCurrentLocale();
    }

    /**
     * Check if the requested locale is allowed.
     *
     * @param  string  $locale
     * @return boolean
     */
    public function isAllowed($locale)
    {
        $locales = config('localized-url.locales');

        if (! is_array($locales)) {
            $locales = config($locales, []);
        }

        return in_array($locale, $locales);
    }

    /**
     * Return the locale url prefix.
     *
     * @return string
     */
    public function urlPrefix()
    {
        if (config('localized-url.default_locale_redirect'))
            return $this->isDefault() ? '' : $this->getCurrentLocale();
        else
            return $this->getCurrentLocale();
    }
}
