<?php

namespace App\Http\Controllers;

use App\Models\bid;
use App\Models\item;
use Illuminate\Http\Request;

class AdminRequestController extends Controller
{
    public function index(){
        $items = item::where('is_approved', '0')->get();
            return view('admin.requests.index', compact('items'));
    }

    public function approveItem($id)
{
    $item = item::find($id);
    $item->is_approved = 1;
    $item->save();

    $bid = new bid();
        $bid->seller_id = $item->seller_id;
        $bid->item_id = $item->id;
        $bid->bid_increament = 500;
        $bid->bid_status = 1; 
        $bid->save();

    return redirect()->back()->with('success', 'Item approved successfully.');
}
    public function destroyItem($id){
        $item = item::find($id);
        $item->is_approved = 2;
        $item->save();

        return redirect()->back()->with('error', 'Item dismissed successfully.');
    }
}
