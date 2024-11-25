<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $table = 'subjects';

    protected $fillable = [
        'created_date',
        'created_time',
        'name',
        'registed',
        'selected',
        'total',
        'expire',
        'status',
        'user_id'
    ];
}
