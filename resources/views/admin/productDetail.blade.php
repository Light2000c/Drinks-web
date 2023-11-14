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
                                <h4 class="card-title">Product - {{ $product->name }}</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                            </div>
                            <div class="card-content mb-2">

                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
                                        <strong>Error!</strong> {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endIf

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                                        <strong>Success!</strong> {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endIf

                                <form action="{{ route('admin-product-details', $product) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div>

                                        <div class="row">
                                            <div class="col m-2 p-2 ">

                                                <div class="d-flex justify-content-center">
                                                    <img class="img-fluid" src="/products/{{ $product->image }}"
                                                        alt="" style="height: 300px">
                                                </div>

                                                <div class="col form-group">
                                                    <label for="image">Image</label>
                                                    <input class="form-control" type="file" name="image"
                                                        placeholder="Product Brand">
                                                    @error('image')
                                                        <small class='text-danger'>{{ $message }}</small>
                                                    @enderror
                                                </div>


                                                <div class="col form-group">
                                                    <label for="price">Colour (Optional)</label>
                                                    <input class="form-control" type="text" name="colour"
                                                        value="{{ $product->colour }}" placeholder="Product Colour">
                                                    @error('colour')
                                                        <small class='text-danger'>{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col form-group">
                                                    <label for="size">Size (Optional)</label>
                                                    <input class="form-control" type="text" name="size"
                                                        value="{{ $product->size }}" placeholder="Product Size">
                                                    @error('size')
                                                        <small class='text-danger'>{{ $message }}</small>
                                                    @enderror
                                                </div>


                                            </div>
                                            <div class="col m-2 p-2 ">
                                                <div class="form-group">
                                                    <div class="col form-group">
                                                        <label for="name">Name</label>
                                                        <input class="form-control" type="text" name="name"
                                                            value="{{ $product->name }}" placeholder="Product Name">
                                                        @error('name')
                                                            <small class='text-danger'>{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="col form-group">
                                                        <label for="price">Price</label>
                                                        <input class="form-control" type="number" name="price"
                                                            value="{{ $product->price }}" placeholder="Product Price">
                                                        @error('price')
                                                            <small class='text-danger'>{{ $message }}</small>
                                                        @enderror
                                                    </div>


                                                    <div class="col form-group">
                                                        <label for="name">Discount (Optional)</label>
                                                        <input class="form-control" type="number" name="discount"
                                                            value="{{ $product->discount }}"
                                                            placeholder="Product Discount">
                                                        @error('discount')
                                                            <small class='text-danger'>{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="col form-group">
                                                        <label for="price">Category</label>
                                                        <select class="form-control" name="category" id="">
                                                            <option value="">Select Product Category</option>
                                                            @foreach($categories as $category)
                                                            @if($product->category == $category->title)
                                                            <option value="{{ $category->title }}" selected>{{ $category->title }}</option>
                                                            @else
                                                            <option value="{{ $category->title }}" >{{ $category->title }}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @error('category')
                                                            <small class='text-danger'>{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="col form-group">
                                                        <label for="brand">Quantity (Optional)</label>
                                                        <input class="form-control" value="{{ $product->quantity }}" type="number" name="quantity"
                                                            placeholder="Product Quantity">
                                                        @error('quantity')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="col form-group">
                                                        <label for="brand">Brand (Optional)</label>
                                                        <input class="form-control" type="text" name="brand"
                                                            value="{{ $product->brand }}" placeholder="Product Brand">
                                                        @error('brand')
                                                            <small class='text-danger'>{{ $message }}</small>
                                                        @enderror
                                                    </div>


                                                    <div class="col form-group">
                                                        <label for="price">Description</label>
                                                        <textarea class="form-control" name="description" id="" rows="6">{{ $product->description }}</textarea>
                                                        @error('description')
                                                            <small class='text-danger'>{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-grid  ml-3 mr-3">
                                            <button class="btn btn-primary btn-block">Save Changes</button>
                                        </div>
                                    </div>
                                </form>

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
