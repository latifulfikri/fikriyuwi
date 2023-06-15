<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PortfolioType extends Model
{
    use HasFactory;

    protected $table = 'portfolio_type';
    protected $primaryKey = 'type_id';

    protected $fillable = [
        'type_name',
        'type_icon'
    ];

    public function Portfolios(): HasMany
    {
        return $this->hasMany('App\Models\Portfolio','type_id','type_id');
    }
}
