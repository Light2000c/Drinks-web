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
                        <div class="form-group">
                            <div class="row">
                                <div class="col form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Product Name">
                                </div>

                                <div class="col form-group">
                                    <label for="price">Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="example@gmail.com">
                                </div>
                            </div>

                            <div class="row">
                            <div class="col form-group">
                                <label for="name">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Create Password">
                            </div>

                            <div class="col form-group">
                                <label for="name">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>


                        <div class="d-grid">
                            <button class="btn btn-primary btn-block">Add Member</button>
                        </div>

                        </div>
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
                                <th class="border-top-0">Phone</th>
                                <th class="border-top-0">Created_at</th>
                                <th class="border-top-0">Updated_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
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