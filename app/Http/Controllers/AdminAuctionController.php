<?php

namespace App\Http\Controllers;

use App\Models\bid;
use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAuctionController extends Controller
{
    public function closed()
    {
        $bids = item::select(
            'items.name as item_name',
            'items.image_path',
            'items.category',
            'bidbidders.bid_amount',
            'sellers.name as seller_name',
            'bidders.name as bidder_name'
        )
        ->join('bids', 'bids.item_id', '=', 'items.id')
        ->join('users as sellers', 'items.seller_id', '=', 'sellers.id')
        ->join('bidbidders', 'bids.id', '=', 'bidbidders.bid_id')
        ->join('users as bidders', 'bidbidders.bidder_id', '=', 'bidders.id')
        ->where('bids.bid_status', 0)
        ->whereIn('bidbidders.bid_amount', function ($query) {
            $query->select(DB::raw('MAX(bidbidders.bid_amount)'))
                  ->from('bidbidders')
                  ->join('bids', 'bidbidders.bid_id', '=', 'bids.id')
                  ->where('bids.bid_status', 0)
                  ->groupBy('bids.item_id');
        })
        ->get();

                    return view('admin.bids.closed', compact('bids'));
        
    }

    public function active(){
        $bids = item::select(
            'items.name as item_name',
            'items.image_path',
            'items.category',
            'bidbidders.bid_amount',
            'bidbidders.bid_id',
            'sellers.name as seller_name',
            'bidders.name as bidder_name'
        )
        ->join('bids', 'bids.item_id', '=', 'items.id')
        ->join('users as sellers', 'items.seller_id', '=', 'sellers.id')
        ->join('bidbidders', 'bids.id', '=', 'bidbidders.bid_id')
        ->join('users as bidders', 'bidbidders.bidder_id', '=', 'bidders.id')
        ->where('bids.bid_status', 1)
        ->whereIn('bidbidders.bid_amount', function ($query) {
            $query->select(DB::raw('MAX(bidbidders.bid_amount)'))
                  ->from('bidbidders')
                  ->join('bids', 'bidbidders.bid_id', '=', 'bids.id')
                  ->where('bids.bid_status', 1)
                  ->groupBy('bids.item_id');
        })
        ->get();
        return view('admin.bids.active', compact('bids'));

    }

    public function details($id){
        $bids = item::select(
            'items.name as item_name',
            'bidbidders.bid_amount',
            'bidders.name as bidder_name'

        )
        ->join('bids', 'bids.item_id', '=', 'items.id')
        ->join('bidbidders', 'bids.id', '=', 'bidbidders.bid_id')
        ->join('users as bidders', 'bidbidders.bidder_id', '=', 'bidders.id')
        ->where('bids.bid_status', 1 && 'bidbidders.bid_id', $id)
        ->get();
        return view('admin.bids.details', compact('bids'));
    }

    public function destroyBid($id){
        $item = bid::find($id);
        $item->bid_status = 2;
        $item->save();

        return redirect()->back()->with('success', 'bid dismissed successfully.');
    }
}
