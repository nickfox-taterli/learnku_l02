<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        //这里的Event的名字可以从vendor/laravel/ui/auth-backend/VerifiesEmails.php找到,用了event函数调用,那个就是event,实际上evenet应该可以在很多不同地方用.
        //上面下面Class的名字要不同,不然会报错重复定义.
        \Illuminate\Auth\Events\Verified::class => [
            \App\Listeners\EmailVerified::class,
        ],
        \Illuminate\Auth\Events\PasswordReset::class => [
            \App\Listeners\PasswordResetDone::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
