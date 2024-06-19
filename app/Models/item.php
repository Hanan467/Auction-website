<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;

    public function bids()
    {
        return $this->belongsTo(Bid::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    protected $fillable = [
        'name',
        'description',
        'bid_price',
        'category_id', 
        'admin_id',
        'seller_id',
        'condition',
        'image_path',
    ];
}
