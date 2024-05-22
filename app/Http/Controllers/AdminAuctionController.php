<?php

namespace App\Http\Controllers;

use App\Models\bid;
use Illuminate\Http\Request;

class AdminAuctionController extends Controller
{
    public function closed(){
        $data = bid::where('bid_status', 'closed')->get();
        return view('admin.bids.closed', compact('data'));
    }
}
