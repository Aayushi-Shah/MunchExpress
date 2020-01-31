<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Resturant;
use Illuminate\Http\Request;

class RestoOrderController extends Controller
{
    public function index($id){
        $resto = Resturant::find($id);

        if(!$resto){
            abort(404, 'The resturant you are looking for is not present');
        }

        $orders = Orders::where('resto_id', $id)
            ->orderBy('isComplete')
            ->paginate(20);

        return view('orders.order-index')
        ->with('orders', $orders)
        ->with('resto', $resto);
    }

    public function add($id){
        $resto = Resturant::find($id);

        if(!$resto){
            abort(404, 'The resturant you are looking for is not present');
        }
        return view('orders.order-add')->with('resto', $resto);
    }
}
