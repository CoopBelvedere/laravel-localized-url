<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Locale Redirect
    |--------------------------------------------------------------------------
    |
    | When you access an url with the locale prefix for the default language
    | ex.: /en/my-article, it will automatically redirects to /my-article
    | if this value is true. To avoid the redirection, set it to false.
    |
    */

    'default_locale_redirect' => true,

    /*
    |--------------------------------------------------------------------------
    | Application Allowed Locales
    |--------------------------------------------------------------------------
    |
    | The allowed translation locales for your application. This array of
    | locales is used to validate the url prefix from the user request
    | and change the config with the right language for that locale.
    |
    */

    'locales' => ['en', 'es', 'fr'],

];
