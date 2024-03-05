@extends('stocks.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Add Stock</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('stocks.index') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="addStockForm">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Description:</strong>
                    <textarea class="form-control" style="height:150px" name="product_desc" placeholder="Product Description"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Qty:</strong>
                    <input type="number" class="form-control" name="product_qty" placeholder="Quantity">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="button" id="submitForm" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submitForm').click(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('stocks.store') }}',
                    data: $('#addStockForm').serialize(),
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                    },
                    error: function(error) {
                        // Handle error response
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
