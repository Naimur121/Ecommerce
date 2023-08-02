@extends('admin.master')
@section('body')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center red">Edit Category Form</h4>
                <hr>
                <form class="form-horizontal p-t-20" action="{{ route('category.add.final') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $products->id }}">
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name :</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" name="category_Name"
                                    value="{{ $products->name }}" id="exampleInputuname3" placeholder="Category Name"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail4" class="col-sm-3 control-label">Category Description :</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" name="description"
                                    value="{{ $products->description }}" id="exampleInputEmail4"
                                    placeholder="Category Description">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-file-now" class="col-sm-3 control-label">Category Image :</label>
                        <div class="col-sm-4">
                            <input type="file" id="input-file-now" name="image" class="dropify" />
                        </div>
                        <div class="col-sm-4">
                            <img src="{{ asset($products->image) }}" height="200px" width="300px" alt="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label">Publication Status : </label>
                        <div class="col-sm-9">
                            <input type="radio" value="1" {{ $products->status == 1 ? 'checked' : '' }}
                                name="styled_radio" required id="styled_radio1" class="form-check-input">
                            <label class="form-check-label me-3" for="styled_radio1">Published</label>
                            <input type="radio" value="0" {{ $products->status == 0 ? 'checked' : '' }}
                                name="styled_radio" id="styled_radio2" class="form-check-input">
                            <label class="form-check-label" for="styled_radio2">Unpublished</label>
                        </div>
                    </div>


                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update
                                Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
