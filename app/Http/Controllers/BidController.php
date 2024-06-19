<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function index(){
        $items = Item::select(
            'items.name',
            'items.image_path',
            'items.bid_price',
            'items.condition',
            'categories.name as category',
            'users.username',
        )
        ->join('categories', 'categories.id', '=', 'items.category_id')   
        ->join('users', 'users.id', '=', 'items.seller_id')        
        ->where('items.is_approved', 1) 
        ->get();
        return view('bidder.auction',compact('items'));
    }

    public function bid(){

    }
}
