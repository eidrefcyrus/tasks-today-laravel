<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'task_date',
        'is_archived',
    ];

    protected $casts = [
        'task_date' => 'date',
        'is_archived' => 'boolean',
    ];
}