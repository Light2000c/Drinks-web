@extends('layouts.admin.app')

@section('content')


<!-- Recent Transactions -->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body"><!-- eCommerce statistic -->

<div class="row">
    <div id="recent-transactions" class="col-12">
        <div class="card pb-2">
            <div class="card-header">
                <h4 class="card-title">Cart Table</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
             
            </div>            
            <div class="card-content">
                </div>

                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>                               
                                <th class="border-top-0">Product ID</th>
                                <th class="border-top-0">User ID</th>
                                <th class="border-top-0">Product Name</th>
                                <th class="border-top-0">Price</th>
                                <th class="border-top-0">Quantity</th>
                                <th class="border-top-0">Total</th>
                                <th class="border-top-0">Created_at</th>
                                <th class="border-top-0">Updated_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                            <tr>
                                <td>{{ $cart->id }}</td>
                                <td>{{ $cart->product_id }}</td>
                                <td>{{ $cart->user_id }}</td>
                                <td>{{ Str::words($cart->product->name, 8) }}</td>
                                <td>{{ $cart->product->price }}</td>
                                <td>{{ $cart->quantity }}</td>
                                <td>{{ number_format($cart->quantity * $cart->product->price) }}</td>
                                <td>{{ $cart->created_at }}</td>
                                <td>{{ $cart->updated_at }}</td>
                                <td>
                                    <form action="{{ route('admin-delete-cart', $cart) }}" method="post">
                                        @csrf
                                        @method("delete")
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="m-2">
                {{ $carts->links('pagination::bootstrap-5') }}
            </div>
            </div>
        </div>
    </div>
</div>
<!--/ Recent Transactions -->

<!--/ Basic Horizontal Timeline -->
</div>
</div>
</div>
<!-- END: Content-->


@endsection