@extends('layout')

@section('content')
<h2>Add Stock Items</h2>

<form name="addItemForm" action="{{url('saveData')}}" method="post" id="addItemForm" action="home.blade.php" enctype="multipart/form-data">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <label for="item_name">Item Name:</label>
        <input type="text" placeholder="Item name..." name="item_name">

        <label for="decription">Item Description:</label>
        <input type="text" placeholder="Item description..." name="description">

        <label for="quantity">Stock Quantity:</label>
        <input type="text" placeholder="Stock quantity..." name="quantity">

        <label for="category">Category:</label>
        <select name="category">
            <option value="Low">Household</option>
            <option value="Gardening">Gardening</option>
            <option value="Electronics">Electronics</option>
            <option value="DIY Hardware">DIY Hardware</option>
        </select>
        <button type="submit" value="Add Item" class="btn btn-primary">Save New Item</button>
    </form>




@endsection