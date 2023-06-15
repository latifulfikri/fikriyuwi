<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    protected $primaryKey = 'contact_id';

    protected $fillable = [
        'contact_name',
        'contact_icon',
        'contact_link',
    ];
}
