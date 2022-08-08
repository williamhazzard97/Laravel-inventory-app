@extends('layout')

@section('content')
<h2>Add Stock Items</h2>

<form name="editItemForm" action="{{ url('update/'.$item->id) }}" method="post" id="editItemForm" action="home.blade.php" enctype="multipart/form-data">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    @method('PUT')    
    <label for="item_name">Item Name:</label>
        <input type="text" placeholder="Item name..." name="item_name" value="{{ $item->item_name }}">

        <label for="decription">Item Description:</label>
        <input type="text" placeholder="Item description..." name="description" value="{{ $item->description }}">

        <label for="quantity">Stock Quantity:</label>
        <input type="text" placeholder="Stock quantity..." name="quantity" value="{{ $item->quantity }}">

        <label for="category">Category:</label>
        <select name="category" value="{{ $item->category }}">
            <option value="Low">Household</option>
            <option value="Gardening">Gardening</option>
            <option value="Electronics">Electronics</option>
            <option value="DIY Hardware">DIY Hardware</option>
        </select>

        <label for="price">Price (£):</label>
        <input type="text" placeholder="Price..." name="price" value="{{ $item->price }}">
        <button type="submit" value="Edit Item" class="btn btn-primary">Save New Item</button>
    </form>




@endsection