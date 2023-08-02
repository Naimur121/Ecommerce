@extends('admin.master')
@section('body')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Add sub-Category Form</h4>
                <hr>
                <form class="form-horizontal p-t-20" action="{{ route('subCategory.add.final') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row input-control">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name : <span class="red">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {{-- <input type="text" class="form-control  @error('category_Name') is-invalid @enderror"
                                    value="{{ old('category_Name') }}" name="category_Name" id="exampleInputuname3"
                                    placeholder="Category Name"> --}}
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                    <option value="" disabled selected>-- Selected --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" >{{ $category->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="error"></div>
                        </div>
                    </div>
                    <div class="form-group row input-control">
                        <label for="exampleInputuname4" class="col-sm-3 control-label"> Sub Category Name :</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control  @error('subCategory_Name') is-invalid @enderror"
                                    value="{{ old('subCategory_Name') }}" name="subCategory_Name" id="exampleInputuname4"
                                    placeholder=" Sub Category Name">
                            </div>
                            <div class="error"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Sub Category Description :</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    name="description" value="{{ old('description') }}" id="exampleInputEmail3"
                                    placeholder="Sub Category Description">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-file-now" class="col-sm-3 control-label">Category Image :</label>
                        <div class="col-sm-4">
                            <input type="file" id="input-file-now" name="image"
                                class=" @error('image') is-invalid @enderror dropify" />
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label">Publication Status : </label>
                        <div class="col-sm-9">
                            <input type="radio" value="1" name="styled_radio" id="styled_radio1"
                                class="form-check-input @error('styled_radio') is-invalid @enderror">
                            <label class="form-check-label me-3" for="styled_radio1" checked>Published</label>
                            <input type="radio" value="0" name="styled_radio" id="styled_radio2"
                                class="form-check-input @error('styled_radio') is-invalid @enderror">
                            <label class="form-check-label" for="styled_radio2">Unpublished</label>
                        </div>

                    </div>
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">Creat New
                                Sub Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
