<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'experience';
    protected $primaryKey = 'experience_id';

    protected $fillable = [
        'experience_id',
        'experience_headline',
        'experience_company',
        'experience_start',
        'experience_end',
        'experience_description',
        'experience_certificate'
    ];
}
