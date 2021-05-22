<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'priority_value'
    ];

    /**
     * Get the name of priority depends on prio value.
     */
    public function toDo()
    {
        return $this->belongsTo(ToDo::class);
    }
}
