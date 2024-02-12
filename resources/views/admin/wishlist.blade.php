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
                <h4 class="card-title">wish Table</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
             
            </div>            
            <div class="card-content">
                </div>

                <div class="table-responsive">
                    <table id="recent-wishs" class="table table-hover table-xl mb-0">
                        <thead>
                            <tr>
                                <th class="bwish-top-0">ID</th>                               
                                <th class="bwish-top-0">Product ID</th>
                                <th class="bwish-top-0">User ID</th>
                                <th class="bwish-top-0">Product Name</th>
                                <th class="bwish-top-0">Price</th>
                                <th class="bwish-top-0">Created_at</th>
                                <th class="bwish-top-0">Updated_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wishes as $wish)
                            <tr>
                                <td>{{ $wish->id }}</td>
                                <td>{{ $wish->product_id }}</td>
                                <td>{{ $wish->user_id }}</td>
                                <td>{{ $wish->product->name }}</td>
                                <td>₦{{ number_format($wish->product->price) }}</td>
                                <td>{{ $wish->created_at }}</td>
                                <td>{{ $wish->updated_at }}</td>
                                <td>
                                    <form action="{{ route('admin-delete-wishes', $wish) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if(!$wishes->count())
                <div class="m-2">
                    <div class="alert alert-info" role="alert">
                        There is no save item to display yet..
                    </div>
                </div>
                @endif
                <div class="m-2">
                    {{ $wishes->links('pagination::bootstrap-5') }}
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