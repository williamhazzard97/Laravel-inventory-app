@extends('layout')

@section('content')
<h2>Add Stock Items</h2>

<form class="form form-control-lg" name="addItemForm" action="{{url('saveData')}}" method="post" id="addItemForm" action="home.blade.php" enctype="multipart/form-data">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <label for="supplier_id">Supplier ID:</label>
        <input type="text" placeholder="Supplier ID..." name="supplier_id">
    
        <label for="item_name">Item Name:</label>
        <input type="text" placeholder="Item name..." name="item_name">

        <label for="decription">Item Description:</label>
        <input type="text" placeholder="Item description..." name="description">

        <label for="quantity">Stock Quantity:</label>
        <input type="text" placeholder="Stock quantity..." name="quantity">

        <label for="category">Category:</label>
        <select name="category">
            <option value="Household">Household</option>
            <option value="Gardening">Gardening</option>
            <option value="Electronics">Electronics</option>
            <option value="DIY Hardware">DIY Hardware</option>
        </select>

        <label for="price">Price (£):</label>
        <input type="text" placeholder="Price..." name="price">

        <label  for="chooseFile">Select file</label>
        <input type="file" name="file" id="chooseFile">

        <button type="submit" value="Add Item" class="btn btn-primary">Save New Item</button>


    </form>




@endsection