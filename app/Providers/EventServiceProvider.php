<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Module;
use App\Models\Partner;
use App\Models\Language;
use App\Models\HomeStep6;

use App\Models\ModuleStep;
use App\Observers\PageObserver;
use App\Models\PhotoGalleryStep0;
use App\Models\PhotoGalleryStep1;
use App\Observers\ModuleObserver;
use App\Observers\PartnerObserver;
use App\Observers\LanguageObserver;
use App\Observers\HomeStem6Observer;
use App\Observers\ModuleStepObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Observers\PhotoGalleryStep0Observer;
use App\Observers\PhotoGalleryStep1Observer;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        HomeStep6::observe(HomeStem6Observer::class);
    }
}
