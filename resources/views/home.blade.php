
@extends('layout')

@section('content')
<div class="col-12 d-flex justify-content-end">
<a href="add"><button href="add" class="btn btn-primary btn-block mt-4">Add New Item</button></a>
<form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/search') }}">
    <input class="form-control me-2" type="search" placeholder="Search items" name="query" aria-label="Search">
    <button class="btn btn-primary" type="submit">Search</button>
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
    </td>
    <td>
        {{$item['category']}}
    </td>
    <td>
        {{$item['price']}}
    </td>
    <td>
        {{$item['file_path']}}
    </td>
    
    <td>
        <a href="{{url('edit/'.$item->id)}}"><button class="btn btn-primary btn-block mt-4">Edit</button> </a>
        <a href="delete/{{$item->id}}"><button class="btn btn-primary btn-block mt-4">Delete</button> </a>
    </td>
    
</tr>
@endforeach

@endsection