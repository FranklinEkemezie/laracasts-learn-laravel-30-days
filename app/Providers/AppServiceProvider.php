<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use App\Policies\JobPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        //

        // Prevent lazy loading
        Model::preventLazyLoading();

        // Configure Pagination
//        Paginator::useBootstrapFive();

        // Commenting out to show how to implement authorisation
        // using Policy instead of gates
//        Gate::define('edit-job', function (User $user, Job $job) {
//            return $job->employer->user->is($user);
//        });

//        Gate::policy(Job::class, JobPolicy::class);
    }
}
