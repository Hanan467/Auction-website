<?php

namespace App\Http\Controllers;

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

    return redirect()->back()->with('success', 'Item approved successfully.');
}
    public function destroyItem($id){
        $item = item::find($id);
        $item->is_approved = 2;
        $item->save();

        return redirect()->back()->with('error', 'Item dismissed successfully.');
    }
}
