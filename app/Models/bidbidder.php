<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bidbidder extends Model
{
    use HasFactory;

    public function bids()
    {
        return $this->belongsTo(Bid::class);
    }

    protected $fillable = [
        'bidder_id',
        'bid_id',
        'bid_amount', 
    ];
}
