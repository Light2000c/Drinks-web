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
                <h4 class="card-title">Team Member Table</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
             
            </div>            
            <div class="card-content mb-2">
                <div>
                    <div class="d-flex justify-content-end m-2">
                        <button id="addMember" class="btn btn-primary"> Add Team Member</button>
                    </div>

                    <div id="addMemberForm" class="m-2 p-2 border">
                        <div class="d-flex justify-content-end mb-2">
                            <button id="closeForm" class="btn btn-primary"> Close Form</button>
                        </div>

                        <form action="{{ route('admin-team-member') }}" method="post">
                            @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" value="{{ old("fullname") }}" name="fullname" placeholder="Product Name">
                                    @error('fullname')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col form-group">
                                    <label for="price">Email</label>
                                    <input class="form-control" type="email" value="{{ old("email") }}" name="email" placeholder="example@gmail.com">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                            <div class="col form-group">
                                <label for="name">Password</label>
                                <input class="form-control" type="password" value="{{ old("password") }}" name="password" placeholder="Create Password">
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col form-group">
                                <label for="name">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>


                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">Add Member</button>
                        </div>
                        </div>
                    </form>

                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>                               
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($team_members as $member)
                            <tr>
                                <td>{{ $member->id }}</td>
                                <td>{{ $member->fullname }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->created_at }}</td>
                                <td>
                                    <form action="{{ route('admin-delete-account', $member) }}" method="post">
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
                @if(!$team_members->count())
                <div class="m-2">
                    <div class="alert alert-info" role="alert">
                        There are no team members to display yet..
                    </div>
                </div>
                @endif
                <div class="m-2">
                    {{ $team_members->links('pagination::bootstrap-5') }}
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

<script>
    $('document').ready(function(){
        $('#addMember').hide();

        $('#closeForm').click(function() {
       $('#addMemberForm').hide();
       $('#addMember').show();
    });


    $('#addMember').click(function() {
       $('#addMemberForm').show();
       $('#addMember').hide();
    });

    });



</script>


@endsection