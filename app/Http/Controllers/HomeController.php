<?php

namespace App\Http\Controllers;

use App\Models\bid;
use App\Models\Category;
use App\Models\item;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        
    
        $totalActiveBids = bid::where('bid_status', 'active')->count();

        $totalAuctions = item::count();

        $totalCategories = Category::count();

        $newCustomers = User::where('created_at', '>=', Carbon::now()->subDays(7))->count();

        $todaysBids = Item::select(
            'items.name as item_name',
            'items.image_path',
            'categories.name as category_name',
            'bidbidders.bid_amount',
            'bidbidders.bid_id',
            'sellers.name as seller_name',
            'bidders.name as bidder_name'
        )
        ->join('bids', 'bids.item_id', '=', 'items.id')
        ->join('users as sellers', 'items.seller_id', '=', 'sellers.id')
        ->join('bidbidders', 'bids.id', '=', 'bidbidders.bid_id')
        ->join('users as bidders', 'bidbidders.bidder_id', '=', 'bidders.id')
        ->join('categories', 'categories.id', '=', 'items.category_id')
        ->where('bids.bid_status', 1)
        ->where('items.is_approved', 1)
        ->whereDate('bidbidders.created_at', Carbon::today())
        ->whereIn('bidbidders.bid_amount', function ($query) {
            $query->select(DB::raw('MAX(bidbidders.bid_amount)'))
                  ->from('bidbidders')
                  ->join('bids', 'bidbidders.bid_id', '=', 'bids.id')
                  ->where('bids.bid_status', 1)
                  ->groupBy('bids.item_id');
        })
        ->get();
        return view('admin.dashboard', compact('totalActiveBids', 'totalAuctions', 'totalCategories', 'newCustomers', 'todaysBids'));
    }

    public function seller(){
        return view('seller.dashboard');
    }
    public function bidder(){
        return view('bidder.dashboard');
    }
}
