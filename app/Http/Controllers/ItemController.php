<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function approved()
    {
        $sellerId = Auth::id();

        $items = item::select(
            'items.name as item_name',
            'items.image_path',
            'items.seller_id',
            'items.bid_price',
            'categories.name as category',
            'bids.bid_status',
            'bidbidders.bid_amount',
        )
        ->join('bids', 'bids.item_id', '=', 'items.id')
        ->join('bidbidders', 'bids.id', '=', 'bidbidders.bid_id')
        ->join('categories', 'categories.id', '=', 'items.category_id')        
        ->where('items.seller_id', $sellerId)
        ->where('is_approved', 1)
        ->whereIn('bidbidders.bid_amount', function ($query) {
        $query->select(DB::raw('MAX(bidbidders.bid_amount)'))
                  ->from('bidbidders')
                  ->join('bids', 'bidbidders.bid_id', '=', 'bids.id')
                  ->where('bids.bid_status', 1)
                  ->groupBy('bids.item_id');
        })
        ->get();

        return view('seller.myitems.approved', compact('items'));
    }

    public function pending(){
        $sellerId = Auth::id();

        $items = Item::select(
            'items.name',
            'items.image_path',
            'items.seller_id',
            'items.bid_price',
            'items.condition',
            'categories.name as category'
        )
        ->join('categories', 'categories.id', '=', 'items.category_id')        
        ->where('items.seller_id', $sellerId)
        ->where('items.is_approved', 0) 
        ->get();
        return view ('seller.myitems.pending', compact('items'));
    }

    public function create(){
        $categories = Category::orderby('id','DESC')->get();
       return view('seller.additem',compact('categories'));
    }

    public function store(Request $request){
        $sellerId = Auth::id();
        $request->validate([
            'name'=>'required|max:255',
            'description'=>'required|max:255',
            'bidprice'=>'required|max:255',
        ]);
        $filename ="";
        if($request->hasFile('image')){
            $filename = $request->getSchemeAndHttpHost().'/images/'.time().'.'. $request->image->extension();
            $request->image->move(public_path('/images/'),$filename);
        }
            item::create([
                'category_id' => $request->selectedcategoryId,
                'condition' => $request->selectedcondition,
                'name' => $request->name,
                'bid_price' => $request->bidprice,
                'description' => $request->description,
                'image_path' => $filename,
                'admin_id' => '1',
                'seller_id'=> $sellerId,
            ]);
            return redirect()->route('seller.additem')->with('success','item added successfully.');
    }


}
