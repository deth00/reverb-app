<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registed extends Model
{
    use HasFactory;

    protected $table = 'registeds';

    protected $fillable = [
        'subject_id',
        'name',
        'bod',
        'age',
        'age_phuk',
        'phao',
        'visa_sphoc',
        'thitsadee',
        'tumneng_phuk',
        'tumneng_lut',
        'tumneng_ying',
        'score',
        'no',
        'img',
    ];
}
