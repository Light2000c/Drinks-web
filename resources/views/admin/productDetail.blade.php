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

                    <div class="row">
                        <div class="col m-2 p-2 ">

                            <div>
                                <img src="" alt="">
                            </div>

                            <div class="col form-group">
                                <label for="image">Image</label>
                                <input class="form-control" type="file" name="image" placeholder="Product Brand">
                            </div>


                            <div class="col form-group">
                                <label for="price">Colour (Optional)</label>
                                <input class="form-control" type="text" name="colour" placeholder="Product Colour">
                            </div>

                            <div class="col form-group">
                                <label for="size">Size (Optional)</label>
                                <input class="form-control" type="text" name="size" placeholder="Product Size">
                            </div>
                      
                    </div>
                    <div  class="col m-2 p-2 ">
                        <div class="form-group">
                                <div class="col form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Product Name">
                                </div>

                                <div class="col form-group">
                                    <label for="price">Price</label>
                                    <input class="form-control" type="number" name="price" placeholder="Product Price">
                                </div>


                            <div class="col form-group">
                                <label for="name">Discount</label>
                                <input class="form-control" type="number" name="discount" placeholder="Product Discount">
                            </div>

                            <div class="col form-group">
                                <label for="price">Category</label>
                                <select class="form-control" name="" id="">
                                    <option value="" selected>Select Product Category</option>
                                </select>
                            </div>

                            <div class="col form-group">
                                <label for="brand">Brand (Optional)</label>
                                <input class="form-control" type="text" name="brand" placeholder="Product Brand">
                            </div>


                            <div class="col form-group">
                                <label for="price">Description</label>
                                <textarea class="form-control" name="description" id=""  rows="6">Product Description Here....</textarea>
                            </div>

                        </div>
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
<!--/ Recent Transactions -->

<!--/ Basic Horizontal Timeline -->
</div>
</div>
</div>
<!-- END: Content-->


@endsection