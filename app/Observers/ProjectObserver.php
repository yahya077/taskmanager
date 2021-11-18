<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $project
     * @return void
     */
    public function creating(Project $project)
    {
        $project->user_id = auth()->id();
    }
}
