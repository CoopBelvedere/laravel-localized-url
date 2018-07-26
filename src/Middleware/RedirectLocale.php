<?php

namespace Belvedere\LocalizedUrl\Middleware;

use Belvedere\LocalizedUrl\LocalizedUrlFacade as LocalizedUrl;
use Closure;

class RedirectLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $defaultLocale = LocalizedUrl::getDefaultLocale();
        $urlLocale = $request->segment(1);

        if (config('localized-url.default_locale_redirect')) {
            if ($urlLocale === $defaultLocale) {
                $redirectUri = preg_replace(
                    "/\/$defaultLocale\/?/i", "/", $request->getRequestUri()
                );
                return redirect()->to($redirectUri);
            }
        } elseif ($urlLocale !== $defaultLocale &&
                  ! LocalizedUrl::isAllowed($urlLocale)) {
            $redirectUri = "/$defaultLocale".$request->getRequestUri();
            return redirect()->to($redirectUri);
        }

        return $next($request);
    }
}
