<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioType extends Model
{
    use HasFactory;

    protected $table = 'portfolio_type';
    protected $primaryKey = 'type_id';

    protected $fillable = [
        'type_name',
        'type_icon'
    ];

    public function Portfolio()
    {
        return $this->belongsTo('App\Models\Portfolio','type_id','type_id');
    }
}
