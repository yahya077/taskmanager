<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
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
        'user_id',
    ];

    /**
     * Get the phone associated with the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
