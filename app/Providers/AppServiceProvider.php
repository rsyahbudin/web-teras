<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        $this->configureDefaults();

        // Share global contact info to all views
        try {
            // Check if table exists to avoid errors during migration
            if (\Illuminate\Support\Facades\Schema::hasTable('page_contents')) {
                $globalContent = \App\Models\PageContent::where('key', 'like', 'contact_%')
                    ->pluck('value', 'key');
                
                \Illuminate\Support\Facades\View::share('global_contact', $globalContent);
            }
        } catch (\Exception $e) {
            // Fail silently during setup/migrations
        }
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null
        );
    }
}
