<?php

namespace App\Observers;

use App\Models\Team;

class TeamObserver
{
    /**
     * Handle the Team "created" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function created(Team $team)
    {
        return $this->clearAllCache();
    }

    /**
     * Handle the Team "updated" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function updated(Team $team)
    {
        //
        return $this->clearAllCache();
    }

    /**
     * Handle the Team "deleted" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function deleted(Team $team)
    {
        //
        return $this->clearAllCache();
    }

    /**
     * Handle the Team "restored" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function restored(Team $team)
    {
        //
        return $this->clearAllCache();
    }

    /**
     * Handle the Team "force deleted" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function forceDeleted(Team $team)
    {
        //
        return $this->clearAllCache();
    }

    private function clearAllCache()
    {

        cache()->pull('teams_cache');

        cache()->pull("teams_cache_active");
    }
}
