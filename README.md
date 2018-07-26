# Laravel localized URL

This is a laravel package to create simple locale prefixed routes and setting
that locale in your laravel app. Be careful if you choose to use this package,
as no more features will be added. For a more complete solution, please use
[Laravel Localization Package](https://github.com/mcamara/laravel-localization).

### Prerequisites
- PHP 7
- Laravel 5.6

### Configuration

```
php artisan vendor:publish --provider="Belvedere\LocalizedUrl\LocalizedUrlServiceProvider"
```

In the `app/config/localized-url.php` file:

Set `default_locale_redirect` to `true` if you want the default language to
be removed from the url when accessed directly.

The `locales` key are the locales allowed in your url. If it's an array, it
will use those locales, but you can also pass a key from another config file,
like `app.locales` if you already have this set in your application.

You can add the locale prefix to your `app/Providers/RouteServiceProvider.php`:

```
use Belvedere\LocalizedUrl\LocalizedUrlFacade as LocalizedUrl;

class RouteServiceProvider extends ServiceProvider
{

...

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->prefix(LocalizedUrl::urlPrefix())
             ->group(base_path('routes/web.php'));
    }
```

Also add `\Belvedere\LocalizedUrl\Middleware\RedirectLocale::class,` to your
`web` stack in `app/Http/Middleware/Kernel.php` for the redirections to work.

*You're all set!*

### This package does not:

- Detect the browser language and keep the language in the session.
- Have any helpers to get the current route in other languages.
- Have any kind of solutions for dynamic content translations.

If you feel that's more what you need, you can consider using the
[Laravel Localization Package](https://github.com/mcamara/laravel-localization)
instead.

## License

[MIT](https://github.com/coopbelvedere/laravel-localized-url/blob/master/LICENSE)

Copyright (c) 2017-present, Coopérative Belvédère Communication
