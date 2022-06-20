<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Models\Module;
use App\Observers\ModuleObserver;
use App\Models\ModuleStep;
use App\Observers\ModuleStepObserver;
use App\Models\Language;
use App\Observers\LanguageObserver;
use App\Models\PhotoGalleryStep0;
use App\Observers\PhotoGalleryStep0Observer;
use App\Models\PhotoGalleryStep1;
use App\Observers\PhotoGalleryStep1Observer;
use App\Models\Page;
use App\Observers\PageObserver;
use App\Models\Partner;
use App\Observers\PartnerObserver;

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
        Page::observe(PageObserver::class);
        Partner::observe(PartnerObserver::class);
        PhotoGalleryStep0::observe(PhotoGalleryStep0Observer::class);
        PhotoGalleryStep1::observe(PhotoGalleryStep1Observer::class);
    }
}
