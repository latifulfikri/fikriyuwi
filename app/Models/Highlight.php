<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    use HasFactory;

    protected $table = 'highlight';
    protected $primaryKey = 'highlight_id';

    protected $fillable = [
        'highlight_id',
        'highlight_text',
        'highlight_active'
    ];
}
