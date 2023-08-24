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
                <h4 class="card-title">Product</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
             
            </div>            
            <div class="card-content mb-2">
                <div>
                    <div id="productForm" class="m-2 p-2 border">
                        <div class="form-group">
                            <div class="row">
                                <div class="col form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Product Name">
                                </div>

                                <div class="col form-group">
                                    <label for="price">Email</label>
                                    <input class="form-control" type="number" name="price" placeholder="Product Price">
                                </div>
                            </div>

                            <div class="row">
                            <div class="col form-group">
                                <label for="name">Current Password</label>
                                <input class="form-control" type="password" name="discount" placeholder="Password">
                            </div>

							<div class="col form-group">
                                <label for="name">New Password</label>
                                <input class="form-control" type="password" name="discount" placeholder="Product Discount">
                            </div>

							<div class="col form-group">
                                <label for="name">Confirm Password</label>
                                <input class="form-control" type="password" name="discount" placeholder="Product Discount">
                            </div>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-block">Save Changes</button>
                        </div>

                        </div>
                        </div>
                    </div>
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