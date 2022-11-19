@extends('layout')

@section('content')
<br><br>
@if ($message = Session::get('success'))
    @php
        //session()->get('success');
    @endphp
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = session()->get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="row">
    <form action="{{ route('products.index') }}" method="GET">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Filtro por ID</strong>
                <input type="text" name="id" class="form-control" placeholder="Id">
            </div>
            <div class="form-group">
                <strong>Filtro por Nombre</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 8 CRUD Example from scratch</h2>
        </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nro</th>
            <th>Id</th>
            <th>Code</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Status Accessor</th>
            <th>Status Accessor Sale</th>
            <th>Category</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $key => $product)
        <tr>
            <td>{{ ($key+1) }}</td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->code }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $status = $product->status ? 'Active' : 'Inactive' }}</td>
            <td>{{ $product->statusFormat }}</td>
            <td>{{ $product->statusFormatSale }}</td>
            <td>{{ $product->category ? $product->category->name : '' }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onClick="return confirm('Esta seguro de eliminar?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
