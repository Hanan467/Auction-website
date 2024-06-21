<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BidderController extends Controller
{
    public function index(){
        $bidderId = Auth::id();
        $bids = item::select(
            'items.name as item_name',
            'items.image_path',
            'categories.name',
            'bidbidders.bid_amount',
            'sellers.name as seller_name',
            'bidders.name as bidder_name'
        )
        ->join('bids', 'bids.item_id', '=', 'items.id')
        ->join('users as sellers', 'items.seller_id', '=', 'sellers.id')
        ->join('bidbidders', 'bids.id', '=', 'bidbidders.bid_id')
        ->join('users as bidders', 'bidbidders.bidder_id', '=', 'bidders.id')
        ->join('categories', 'categories.id', '=', 'items.category_id')
        ->where('bids.bid_status', 0)
        ->where('bidders.id', $bidderId) 
        ->get();
                    return view('bidder.history', compact('bids'));
        

    }
}
