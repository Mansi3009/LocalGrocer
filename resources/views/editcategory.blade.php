@extends('layout.app')

@section('content') 
<form action="{{route('editcategory')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="container register-form">
                <div class="note">
                    <p>Add Category</p>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="categoryid" value="{{ $category->id }}">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="c_name" placeholder="Enter Category Name *" value="{{ $category->c_name }}"/>
                            </div>
                            <div class="form-group">
                                    <input type="file" class="form-control" name="c_image" value="{{ $category->c_image }}"/>
                            </div>
                        </div>
                   </div>

                <button type="submit" name="submit" class="btnn">Submit</button>
            </div>
        </div>
</form>
@endsection