<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bid extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function bidbidder()
    {
        return $this->hasMany(bidbidder::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
