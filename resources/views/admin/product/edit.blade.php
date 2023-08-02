@extends('admin.master')
@section('body')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center red">Edit Product Form</h4>
                <hr>
                <form class="form-horizontal p-t-20" action="{{ route('product.save') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="form-group row input-control">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name : <span
                                class="red">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {{-- <input type="text" class="form-control  @error('category_Name') is-invalid @enderror"
                                    value="{{ old('category_Name') }}" name="category_Name" id="exampleInputuname3"
                                    placeholder="Category Name"> --}}
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id"
                                    id="categoryId">
                                    <option value="" disabled selected>-- Selected --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="error"></div>
                        </div>
                    </div>

                    <div class="form-group row input-control">
                        <label for="exampleInputuname6" class="col-sm-3 control-label">Sub Category Name : <span
                                class="red">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">

                                <select class="form-control @error('sub_category_id') is-invalid @enderror"
                                    name="sub_category_id" id="subCategoryId">
                                    <option value="" disabled selected>-- Selected --</option>
                                    @foreach ($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}"
                                            {{ $sub_category->id == $product->sub_category_id ? 'selected' : '' }}>
                                            {{ $sub_category->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="error"></div>
                        </div>
                    </div>
                    <div class="form-group row input-control">
                        <label for="exampleInputuname6" class="col-sm-3 control-label">Brand Name : <span
                                class="red">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">

                                <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id"
                                    id="exampleInputuname6">
                                    <option value="" disabled selected>-- Selected --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                            {{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="error"></div>
                        </div>
                    </div>
                    <div class="form-group row input-control">
                        <label for="exampleInputuname6" class="col-sm-3 control-label">UnitName : <span
                                class="red">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">

                                <select class="form-control @error('unit_id') is-invalid @enderror" name="unit_id"
                                    id="exampleInputuname6">
                                    <option value="" disabled selected>-- Selected --</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ $unit->id == $product->unit_id ? 'selected' : '' }}>{{ $unit->unit_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="error"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail7" class="col-sm-3 control-label">Product Name:</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                    name="product_name" value="{{ $product->name }}" id="exampleInputEmail7"
                                    placeholder="Product Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail8" class="col-sm-3 control-label">Product Code:</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control @error('product_code') is-invalid @enderror"
                                    name="product_code" value="{{ $product->code }}" id="exampleInputEmail8"
                                    placeholder="Product Code">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail9" class="col-sm-3 control-label">Product Model:</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control @error('product_model') is-invalid @enderror"
                                    name="product_model" value="{{ $product->model }}" id="exampleInputEmail9"
                                    placeholder="Product Model">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail10" class="col-sm-3 control-label">Product Stock Amount:</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control @error('product_amount') is-invalid @enderror"
                                    name="product_amount" value="{{ $product->stock_amount }}" id="exampleInputEmail10"
                                    placeholder="Product Stock Amount">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail10" class="col-sm-3 control-label">Product Price:</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" class="form-control @error('product_price') is-invalid @enderror"
                                    name="product_price" value="{{ $product->regular_price }}" id="exampleInputEmail10"
                                    placeholder="Regulae Price">
                                <input type="number" class="form-control @error('selling_price') is-invalid @enderror"
                                    name="selling_price" value="{{ $product->selling_price }}" id="exampleInputEmail11"
                                    placeholder="Selling Price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail5" class="col-sm-3 control-label">Shot Description :</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text"
                                    class="form-control @error('short_description') is-invalid @enderror"
                                    name="short_description" value="{{ $product->short_description }}"
                                    id="exampleInputEmail5" placeholder="Shot Description">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail12" class="col-sm-3 control-label">Long Description :</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <textarea class="form-control summernote  @error('long_description') is-invalid @enderror" name="long_description"
                                    value="{{ $product->regular_price }}" id="exampleInputEmail12">{{ $product->long_description }}</textarea>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-file-now" class="col-sm-3 control-label">Feature Image :</label>
                        <div class="col-sm-4">
                            <input type="file" id="input-file-now" name="image"
                                class=" @error('image') is-invalid @enderror dropify" accept="image/*" />
                            <img src="{{ asset($product->image) }}" alt="" height="200" width="250">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-file-now" class="col-sm-3 control-label">Other Image :</label>
                        <div class="col-sm-4">
                            <input type="file" id="input-file-now" name="other_image[]" multiple
                                class=" @error('other_image') is-invalid @enderror dropify" accept="image/*" />
                            @foreach ($product->otherImage as $otherImage)
                                <img src="{{ asset($otherImage->image) }}" alt="" height="200"
                                    width="250">
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label">Publication Status : </label>
                        <div class="col-sm-9">
                            <input type="radio" {{ $product->status == 1 ? 'checked' : '' }} value="1" name="styled_radio" id="styled_radio1"
                                class="form-check-input @error('styled_radio') is-invalid @enderror">
                            <label class="form-check-label me-3" for="styled_radio1">Published</label>
                            <input type="radio" {{ $product->status == 0 ? 'checked' : '' }} value="0" name="styled_radio" id="styled_radio2"
                                class="form-check-input @error('styled_radio') is-invalid @enderror">
                            <label class="form-check-label" for="styled_radio2">Unpublished</label>
                        </div>

                    </div>
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update
                                Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
