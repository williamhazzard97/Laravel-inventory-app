
@extends('layout')

@section('content')
<div class="col-12 d-flex justify-content-end">
<a href="add"><button class="btn btn-primary btn-block mt-4">Add New Item</button></a>
</div>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Item ID</th>
            <th scope="col">Item Name</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Category</th>
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
        <a href="{{url('edit/'.$my_reminder->id)}}"><button class="btn btn-primary ">Edit</button> </a>
        <a href="delete/{{$my_reminder->id}}"><button class="btn btn-primary ">Delete</button> </a>
    </td>
</tr>
@endforeach

@endsection