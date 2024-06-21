<?php

namespace App\Http\Controllers;

use App\Models\bid;
use App\Models\bidbidder;
use App\Models\Category;
use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BidController extends Controller
{
    public function index($category = null){
        $query = Item::select(
            'items.id',
            'items.name',
            'items.image_path',
            'items.bid_price',
            'items.condition',
            'categories.name as category',
            'users.username'
        )
        ->join('categories', 'categories.id', '=', 'items.category_id')
        ->join('users', 'users.id', '=', 'items.seller_id')
        ->where('items.is_approved', 1);

        if ($category) {
            $query->where('categories.name', $category);
        }

        $items = $query->get();
        $categories = Category::orderBy('id', 'DESC')->get();

        return view('bidder.auction', compact('items', 'categories'));
    }

    public function bid($id){
        $item = Item::select(
            'items.id',
            'items.name',
            'items.image_path',
            'items.bid_price',
            'items.condition',
            'items.description',
            'categories.name as category',
            'users.username',
        )
        ->join('categories', 'categories.id', '=', 'items.category_id')   
        ->join('users', 'users.id', '=', 'items.seller_id')        
        ->where('items.is_approved', 1)
        ->where('items.id', $id)
        ->first();

        $categories = Category::orderby('id','DESC')->get();

        return view('bidder.placebid',compact('item','categories'));
    }


    public function placebid(Request $request){
        $bidderId = Auth::id();
        $request->validate([
            'bid_amount' => 'required|numeric|min:0.01',
            'item_id' => 'required|exists:items,id',
        ]);

        $bid = DB::table('bids')
        ->join('items', 'bids.item_id', '=', 'items.id')
        ->where('items.id', $request->item_id)
        ->select('bids.id')
        ->first();

        $existingBid = DB::table('bidbidders')
        ->where('bidbidders.bidder_id', $bidderId)
        ->where('bidbidders.bid_id', $bid->id)
        ->exists();
        if ($existingBid) {
        return redirect()->back()->with('error', 'You have already placed a bid for this item!');
        }

        $item = Item::findOrFail($request->item_id);
        $bidPrice = $item->bid_price;

        if ($request->bid_amount <= $bidPrice) {
            return redirect()->back()->with('error', 'Bid amount must be greater than the current bid price!');
        }
            
        bidbidder::create([
            'bidder_id' => $bidderId,
            'bid_amount' => $request->bid_amount,
            'bid_id' => $bid->id, 
        ]);

        return redirect()->back()->with('success', 'Bid placed successfully!');
    }
}
