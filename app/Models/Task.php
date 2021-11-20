<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'project_id',
        'assigned_to',
    ];

    /**
     * Get the project associated with the task.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    /**
     * Get the assigned user associated with the task.
     */
    public function assignedTo()
    {
        return $this->belongsTo(User::class,'assigned_to','id');
    }
}
