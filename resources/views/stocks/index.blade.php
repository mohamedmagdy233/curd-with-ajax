@extends('stocks.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Simple Stock Management Application | BH</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success" href="{{ route('stocks.create') }}"> Add Stock</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($stocks) > 0)
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Qty.</th>
                <th width="280px">More</th>
            </tr>
            @foreach ($stocks as $stock)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $stock->product_name }}</td>
                    <td>{{ $stock->product_desc }}</td>
                    <td>{{ $stock->product_qty }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('stocks.show', $stock->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('stocks.edit', $stock->id) }}">Edit</a>
                        <button class="btn btn-danger delete-btn" data-id="{{ $stock->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="alert alert-alert">Start Adding to the Database.</div>
    @endif

    {!! $stocks->links() !!}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function(e) {
                e.preventDefault();
                var stockId = $(this).data('id');
                if (confirm('Are you sure you want to delete this stock?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('stocks') }}/" + stockId,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            // Handle success response
                            console.log(response);
                            // Optionally, you can remove the deleted row from the table
                            // $(this).closest('tr').remove();
                        },
                        error: function(error) {
                            // Handle error response
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script>

@endsection

