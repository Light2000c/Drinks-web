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
                <h4 class="card-title">Category Table</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
             
            </div>            
            <div class="card-content mb-2">
                <form action="{{ route('admin-category') }}" method="post">
                    @csrf
                <div>
                    <div class="d-flex justify-content-end m-2">
                        <button id="addCategory" class="btn btn-primary"> Add Categeory</button>
                    </div>

                    <div id="addCategoryForm" class="m-2 p-2 border">
                        <div class="d-flex justify-content-end mb-2">
                            <button id="closeForm" class="btn btn-primary"> Close Form</button>
                        </div>
                        <div class="form-group">
                                <div class="form-group mb-3">
                                    <label for="name">Title</label>
                                    <input class="form-control" type="text" name="title"  placeholder="Category Title">
                                    @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">Add Category</button>
                        </div>

                        </div>
                        </div>
                    </div>
                </form>
                </div>

                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>                               
                                <th class="border-top-0">Title</th>
                                <th class="border-top-0">Created_at</th>
                                <th class="border-top-0">Updated_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                {{-- <td>
                                        <a type="submit" class="btn btn-primary btn-sm text-white"><i class="fa fa-pencil"></i></a>
                                </td> --}}
                                <td>
                                    <form action="{{ route('admin-category-delete', $category) }}" method="post">
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
        $('#addCategory').hide();

        $('#closeForm').click(function() {
       $('#addCategoryForm').hide();
       $('#addCategory').show();
    });


    $('#addCategory').click(function() {
       $('#addCategoryForm').show();
       $('#addCategory').hide();
    });

    });



</script>


@endsection