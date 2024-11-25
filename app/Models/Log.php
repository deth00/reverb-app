<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'log_score';

    protected $fillable = [
        'subject_id',
        'resgis_id',
        'socre',
        'no'
    ];
}
