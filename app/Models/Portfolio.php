<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolio';
    protected $primaryKey = 'portfolio_id';

    protected $fillable = [
        'portfolio_headline',
        'portfolio_description',
        'portfolio_role',
        'portfolio_accomplished',
        'portfolio_link',
        'type_id',
        'portfolio_image'
    ];

    public function Type(): BelongsTo
    {
        return $this->belongsTo('App\Models\PortfolioType','type_id','type_id');
    }
}
