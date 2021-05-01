@extends('layout.app')

@section('content') 
<form action="{{route('product')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="container register-form">
                <div class="note">
                    <p>Add Product</p>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name *" value=""/>
                            </div>
                            <div class="form-group">
                                <textarea name="product_description" class="form-control" id="description" cols="3" rows="3" placeholder="Enter Product Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <input type="file" class="form-control" name="product_image" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="product_status" class="form-control" placeholder="Enter Product Status" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Enter Product Price" name="product_price" value=""/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="category">
                                    @foreach($categoris as $category)
                                    <option value="{{ $category->id }}"> 
                                        {{ $category->c_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="product_discount" class="form-control" placeholder="Enter Product Discount" value=""/>
                            </div>
                        </div>
                    </div>
                <button type="submit" name="submit" class="btnn">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection