
@extends('layout')

@section('content')
<div class="col-12 d-flex justify-content-end">
<a href="add"><button href="add" class="btn btn-primary btn-block mt-4">Add New Item</button></a>
<form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/search') }}">
    <input class="form-control me-2" type="search" placeholder="Search items" name="query" aria-label="Search">
    <button class="btn btn-primary" type="submit">Search</button>
</form>
<form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/sortCategory') }}">
    <select name="sortCategory" id="sortCategory">
            <option value="Household">Household</option>
            <option value="Gardening">Gardening</option>
            <option value="Electronics">Electronics</option>
            <option value="DIY Hardware">DIY Hardware</option>
    </select>
    <button class="btn btn-primary" type="submit">Sort by category</button>
</form>
<form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/sortStock') }}">
    <select name="sortStock" id="sortStock">
            <option value="Lowest">Low -> High</option>
            <option value="Highest">High -> Low</option>
    </select>
    <button class="btn btn-primary" type="submit">Sort by stock</button>
</form>
<form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/lowStock') }}">
    <button class="btn btn-primary" type="submit">View Low Stock Items</button>
</form>
<form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/sendEmail') }}">
    
    <button class="btn btn-primary" type="submit">Send Email</button>
</form>

</div>


<table class="table table-bordered table-hover table-responsive">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Item ID</th>
            <th scope="col">Item Name</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">File</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
@foreach ($items as $item)
<tr>
    <td>
        {{$item['id']}}
    </td>
    
    <td>
        {{$item['item_name']}}
    </td>
    <td>
        {{$item['description']}}
    </td>
    <td>
        {{$item['quantity']}}
        <br>
        <a href="/addStock/{{$item->id}}"><button class="btn btn-primary btn-block mt-4">+</button> </a>
        <a href="/subStock/{{$item->id}}"><button class="btn btn-primary btn-block mt-4">-</button> </a>
    </td>
    <td>
        {{$item['category']}}
    </td>
    <td>
        {{$item['price']}}
    </td>
    <td>
    <a href="/download/{{$item->id}}" class="btn btn-primary">{{$item['file_path']}}</a>
    </td>
    
    <td>
        <a href="{{url('edit/'.$item->id)}}"><button class="btn btn-primary btn-block mt-4">Edit</button> </a>
        <a href="delete/{{$item->id}}"><button class="btn btn-primary btn-block mt-4">Delete</button> </a>
    </td>


   
    
</tr>
@endforeach

@endsection