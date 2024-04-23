<?php

namespace App\Providers;

use App\Events\MatchIsFinished;
use App\Events\WinnerSelected;
use App\Events\UserAttemptJoinMatch;
use App\Listeners\CheckCountGamersMatch;
use App\Listeners\CheckMatchIsFinished;
use App\Listeners\CheckUserAttemptJoinMatch;
use App\Listeners\ScoringPoints;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\ExampleEvent::class => [
            \App\Listeners\ExampleListener::class,
        ],
        UserAttemptJoinMatch::class => [
            CheckCountGamersMatch::class,
            CheckUserAttemptJoinMatch::class,
        ],
        MatchIsFinished::class => [
            CheckMatchIsFinished::class,
        ],
        WinnerSelected::class => [
            ScoringPoints::class,
        ],
    ];

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
