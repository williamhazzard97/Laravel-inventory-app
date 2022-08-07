<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class itemController extends Controller
{
    //
    public function insertItem(Request $request){
        $data = new Item;
        $data->item_name = $request->item_name;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->category = $request->category;     

        $data->save();

        return view('home', [
            'items' => Item::all()
        ]);

    }
}
