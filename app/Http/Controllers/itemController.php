<?php

namespace App\Http\Controllers;


use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Log;
use App\Mail\signUp;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

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
        
        //Upload file with preset file path and specify the storage disk to be used
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('item_files', $fileName, 'public');
        $data->file_path = '/' . $filePath;

        Storage::disk('public')->put('testFile2.txt', 'Contents');

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
     * Find the correct item record using primary key and find(id) helper,
     * replace data with the appropriate field data from edit form
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
     * Grab the query entered by the user in the search bar 
     * and query the database items table for a term LIKE the search query 
     */
    public function search(Request $request) {
        $search = $request->input('query');
        $items = Item::where ('item_name', 'LIKE', '%' .$search . '%')->get();

        //Display the search results and use compact() helper to create array of items string args
        return view('search', compact('items'));
    }

    /**
     * Find the specific item record using id, 
     * assign file name to variable, 
     * parse variable into download arguments along with data type
     */
    public function fileDownload(Request $request, $id){
        $item = Item::find($id);
        if(Storage::disk('public')->exists($item->file_path)) {
            $path = Storage::disk('public')->path($item->file_path);
            return Response::download($path);

            //Two lines below are to download from the apps public folder, not storage public disk
            //$filepath = public_path('uploads/testFile.txt');
            //return Response::download($filepath); 
        }
        else {
            return redirect('/404');
        } 
    }

    /**
     * Assign variable with inputted value of 'sortCategory', 
     * get items from the database table that match category term, 
     * return view of category group
     */
    public function sortCategory(Request $request) {
        $categoryValue = $request->input('sortCategory');
        $items = Item::where ('category', 'LIKE', '%' .$categoryValue . '%')->get();
        return view('categorySorted', compact('items'));
    }

    /**
     * Assign variable with inputted value of 'sortStock', 
     * get items from the database table in desc or asc order based on user input
     */
    public function sortStock(Request $request) {
        $orderDirection = $request->input('sortStock');
        if ($orderDirection == "Highest") {
            $items = Item::orderBy('quantity', 'DESC')->get();
            return view('stockSorted', compact('items'));
       }
       else {
            $items = Item::orderBy('quantity')->get();
            return view('stockSorted', compact('items'));
       }
       
    }

    /**
     * Generate items based on quantity level, 
     * display items with less than 3 units in stock
     */
    public function lowStock() {
        $items = Item::where('quantity', '<', '3')->get();
        return view('home', compact('items'));
    }

    /**
     * Add stock quantity
     */
    public function addStock(Request $request, $id) {
        $addition = 1;
        $items = Item::find($id);
        $items->quantity += $addition;
        $items->save();
        return view('home', ['items' => Item::all()]);
    }

    /**
     * Subtract stock quantity
     */
    public function subStock(Request $request, $id) {
        $subtraction = 1;
        $items = Item::find($id);
        if ($items->quantity >= 1) {
            $items->quantity -= $subtraction;
            $items->save();
            return view('home', ['items' => Item::all()]);
        }
        else {
            //If quantity is 0 then display flash message 
            return back()->with('error','Item out of stock!');
        }
    }

    /**
     * Send email 
     */
    public function sendEmail() {
        Mail::to('fake@email.com')->send(new signUp());
        return view('home', ['items' => Item::all()]);
    }


    /**
     * Call api to generate data for table
     */
    public function generateData() {
        $response = Http::get('http://127.0.0.1:8001/api/items');

        if ($response->status() !== 200) {
            return 'Failed';
        }

        $itemName = $response->json('item_name');

        if(empty($itemName)) {
            return 'ITEM NAME';
        }
        return $itemName;

    }
}
