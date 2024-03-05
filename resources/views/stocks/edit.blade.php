@extends('stocks.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Edit Stock</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('stocks.index') }}"> Back</a>
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

    <form id="updateForm">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name" value="{{ $stock->product_name }}" class="form-control" placeholder="Product Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Description:</strong>
                    <textarea class="form-control" name="product_desc" style="height:150px"  placeholder="Product Description">{{ $stock->product_desc }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Qty:</strong>
                    <input type="number" name="product_qty" class="form-control" style="height:150px" value="{{ $stock->product_qty }}"  placeholder="Quantity">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button id="update" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#delete').click(function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('stocks.update', $stock->id) }}",
                    data: $('#deleteForm').serialize(),
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>

@endsection
