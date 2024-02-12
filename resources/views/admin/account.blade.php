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
                <h4 class="card-title">Account Table</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
             
            </div>            
            <div class="card-content">
                </div>

                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>                               
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Phone</th>
                                <th class="border-top-0">Created_at</th>
                                <th class="border-top-0">Updated_at</th>
                            </tr>
                        </thead>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->fullname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <form action="{{ route('admin-delete-account', $user) }}" method="post">
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
            @if(!$users->count())
            <div class="m-2">
                <div class="alert alert-info" role="alert">
                    There are no users to display yet..
                </div>
            </div>
            @endif
            <div class="m-2">
                {{ $users->links('pagination::bootstrap-5') }}
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