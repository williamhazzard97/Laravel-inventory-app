<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class itemController extends Controller
{
    public function addForm() {
        return view('add');
    }
    
    public function insertItem(Request $request){
        $data = new Item;
        $data->item_name = $request->item_name;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->category = $request->category; 
        $data->price = $request->price;     

        $data->save();

        return view('home', [
            'items' => Item::all()
        ]);

    }

    public function delete($id) {
        $data = Item::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function edit($id) {
        $item = Item::find($id);

        return view('edit', compact('item'));
    }

    public function update(Request $request, $id) {
        $item = Item::find($id);

        $item->item_name = $request->input('item_name');
        $item->description = $request->input('description');
        $item->quantity = $request->input('quantity');
        $item->category = $request->input('category');
        $item->price = $request->input('price');

        $item->update();

        return redirect('/')->with('status', "Data updated successfully");
    }

    public function search(Request $request) {
        $search = $request->input('query');
        $items = Item::where ('item_name', 'LIKE', '%' .$search . '%')->get();

        return view('search', compact('items'));
    }

    
}
