@extends('layout')

@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" id="btn-back" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                <input type="text" name="code" class="form-control" placeholder="Code"id="code">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" id="name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <!--input type="text" name="status" class="form-control" placeholder="Status"-->
                <select name="status" class="form-control">
                    <option value="">Eliga una opcion</option>
                    <option value="0">Activo</option>
                    <option value="1">Inactivo</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                <input type="text" name="quantity" class="form-control" placeholder="Quantity">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <!--input type="text" name="category_id" class="form-control" placeholder="Category id"-->
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category PLUCK:</strong>
                <!--input type="text" name="category_id" class="form-control" placeholder="Category id"-->
                <select name="category_id" class="form-control">
                    @foreach ($pluckCategories as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category AJAX:</strong>
                <!--input type="text" name="category_id" class="form-control" placeholder="Category id"-->
                <select name="category_ajax" id="category_ajax" class="form-control">
                </select>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<script type="text/javascript">
$( document ).ready(function() {
    
    console.log( "ready!" );
    document.getElementById('name').value = 'test js 2';
    $('#code').val('code from jquery');

    /* setTimeout( function() {
        console.log("Delayed for 2 second.");
        //$('#btn-back').click();
        $.get( "{{ route('categories.indexJson') }}", function( response ) {
            console.log( 'categories: ', response );
        });

    }, "5000"); */

    $.get( "{{ route('categories.indexJson') }}", function( response ) {
        console.log( 'categories: ', response );
        // Its good but not efficient
        /* $.each(response.data.categories, function(key, value) {   
            console.log(value);
            $option = $("<option></option>").attr("value", key).text(value)
            $('#category_ajax').append($option);
        }); */

        // Its BETTER WAY
        options = '';
        $.each(response.data.categories, function(key, value) {   
            options += '<option value="'+key+'">'+value+'</option>';
        });
        //console.log(options);
        $('#category_ajax').append(options);
    });

});
</script>

@endsection