<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Models\Module;
use App\Models\ModuleStep;
use App\Models\Language;
use App\Models\PhotoGalleryStep0;
use App\Models\PhotoGalleryStep1;
use App\Observers\ModuleObserver;
use App\Observers\ModuleStepObserver;
use App\Observers\LanguageObserver;
use App\Observers\PhotoGalleryStep0Observer;
use App\Observers\PhotoGalleryStep1Observer;

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
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Module::observe(ModuleObserver::class);
        ModuleStep::observe(ModuleStepObserver::class);
        Language::observe(LanguageObserver::class);
        PhotoGalleryStep0::observe(PhotoGalleryStep0Observer::class);
        PhotoGalleryStep1::observe(PhotoGalleryStep1Observer::class);
    }
}
