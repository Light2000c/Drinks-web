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
                                    <div class="d-flex justify-content-end m-2">
                                        <button id="addProduct" class="btn btn-primary"> Add Product</button>
                                    </div>
                                    <div id="productForm" class="m-2 p-2 border">
                                        <div class="d-flex justify-content-end mb-2">
                                            <button id="closeForm" class="btn btn-primary"> Close Form</button>
                                        </div>
                                        @if (session('error'))
                                            <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2"
                                                role="alert">
                                                <strong>Error!</strong> {{ session('error') }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endIf

                                        @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show mt-2 mb-2"
                                                role="alert">
                                                <strong>Success!</strong> {{ session('success') }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endIf

                                        <form action="{{ route('admin-product') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="name">Name</label>
                                                        <input class="form-control" type="text" name="name"
                                                            placeholder="Product Name">
                                                        @error('name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="col form-group">
                                                        <label for="price">Price</label>
                                                        <input class="form-control" type="number" name="price"
                                                            placeholder="Product Price">
                                                        @error('price')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="name">Discount (Optional)</label>
                                                        <input class="form-control" type="number" name="discount"
                                                            placeholder="Product Discount">
                                                        @error('discount')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>


                                                    <div class="col form-group">
                                                        <label for="price">Category</label>
                                                        <select class="form-control" name="category" id="">
                                                            <option value="" selected>Select Product Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->title }}">
                                                                    {{ $category->title }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="brand">Quantity (Optional)</label>
                                                        <input class="form-control" type="number" name="quantity"
                                                            placeholder="Product Quantity">
                                                        @error('quantity')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>


                                                    <div class="col form-group">
                                                        <label for="brand">Brand (Optional)</label>
                                                        <input class="form-control" type="text" name="brand"
                                                            placeholder="Product Brand">
                                                        @error('brand')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="price">Colour (Optional)</label>
                                                        <input class="form-control" type="text" name="colour"
                                                            placeholder="Product Colour">
                                                        @error('colour')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="col form-group">
                                                        <label for="size">Size (Optional)</label>
                                                        <input class="form-control" type="text" name="size"
                                                            placeholder="Product Size">
                                                        @error('size')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="image">Image</label>
                                                        <input class="form-control" type="file" name="image"
                                                            placeholder="Product Image">
                                                        @error('image')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="col form-group">
                                                        <label for="price">Description</label>
                                                        <textarea class="form-control" name="description" id="" rows="6"></textarea>
                                                        @error('description')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="d-grid">
                                                    <button class="btn btn-primary btn-block">Save Product</button>
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
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Discount</th>
                                            <th class="border-top-0">Category</th>
                                            <th class="border-top-0">Quantity</th>
                                            <th class="border-top-0">Brand</th>
                                            <th class="border-top-0">Colour</th>
                                            <th class="border-top-0">Size</th>
                                            <th class="border-top-0">Image</th>
                                            <th class="border-top-0">Discription</th>
                                            <th class="border-top-0">Crated_at</th>
                                            <th class="border-top-0">Updated_at</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ Str::words($product->name, 8) }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->discount }}</td>
                                                <td>{{ $product->category }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->brand }}</td>
                                                <td>{{ $product->colour }}</td>
                                                <td>{{ $product->size }}</td>
                                                <td><img class="img-fluid" src="/products/{{ $product->image }}"
                                                        alt="" srcset="" style="height: 100px;"></td>
                                                <td>{{ Str::words($product->description, 8) }}</td>
                                                <td>{{ $product->created_at }}</td>
                                                <td>{{ $product->updated_at }}</td>

                                                <td>
                                                    <a href="{{ route('admin-product-details', $product) }}"
                                                        class="btn btn-primary btn-sm text-white"><i
                                                            class="fa fa-pencil"></i></a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin-product-delete', $product) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-primary btn-sm"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="m-2">
                                    {{ $products->links('pagination::bootstrap-5') }}
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


    <script>
        $('document').ready(function() {
            $('#addProduct').hide();

            $('#closeForm').click(function() {
                $('#productForm').hide();
                $('#addProduct').show();
            });


            $('#addProduct').click(function() {
                $('#productForm').show();
                $('#addProduct').hide();
            });

        });
    </script>
@endsection
