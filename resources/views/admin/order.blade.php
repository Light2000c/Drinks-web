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
                <h4 class="card-title">Order Table</h4>
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
                                <th class="border-top-0">Rerence ID</th>
                                <th class="border-top-0">Total</th>
                                <th class="border-top-0">Created_at</th>
                                <th class="border-top-0">Updated_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product_id }}</td>
                                <td>{{ $order->user_id }}</td>
                                <td>{{ $order->product->name }}</td>
                                <td>₦{{ number_format($order->product->price) }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->reference_id }}</td>
                                <td>₦{{ number_format($order->product->price * $order->quantity) }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                                <td>
                                    <form action="{{ route('admin-delete-order', $order) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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