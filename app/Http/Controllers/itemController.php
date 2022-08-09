<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class itemController extends Controller
{
    /**
     * Show add new item form
     */
    public function addForm() {
        return view('add');
    }
    /**
     * Insert data from add new item form into items table within inventory database
     */
    public function insertItem(Request $request){
        $data = new Item;
        $data->item_name = $request->item_name;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->category = $request->category; 
        $data->price = $request->price; 

        //Get current sessions user id from the auth() helper
        $current_user_id = auth()->user()->id;
        $data->user_id = $current_user_id;
        
        //Upload file with preset file path
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
        $data->file_path = '/storage/' . $filePath;

        $data->save();

        return view('home', [
            'items' => Item::all()
        ]);

    }

    /**
     * Find item by primary key (id) and remove from database table
     */
    public function delete($id) {
        $data = Item::find($id);
        $data->delete();
        return redirect()->back();
    }

    /**
     * Return the view of the edit item form
     */
    public function edit($id) {
        $item = Item::find($id);

        return view('edit', compact('item'));
    }

    /**
     * Find the correct item record using primary key and find(id) helper, replace data with the appropriate field data from edit form
     */
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

    /**
     * Grab the query entered by the user in the search bar and query the database items table for a term LIKE the search query 
     */
    public function search(Request $request) {
        $search = $request->input('query');
        $items = Item::where ('item_name', 'LIKE', '%' .$search . '%')->get();

        //Display the search results and use compact() helper to create array of items string args
        return view('search', compact('items'));
    }

    /**
     * Find the specific item record using id, assign file name to variable, parse variable into download arguments along with data type
     */
    public function fileDownload($id){
        $file = Item::find($id);

        $attachment = $file->file_path;
        return Response::download($attachment);
}
    
}
