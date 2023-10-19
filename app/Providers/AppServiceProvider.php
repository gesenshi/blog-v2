<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Jenssegers\Date\Date;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Date::setLocale(config('app.locale'));

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->greeting('Привет!')
                ->subject('Подтверждение адреса электронной почты')
                ->line('Нажмите на кнопку ниже, чтобы подтвердить ваш адрес электронной почты.')
                ->action('Подтвердить адрес электронной почты', $url);
        });

    }
}