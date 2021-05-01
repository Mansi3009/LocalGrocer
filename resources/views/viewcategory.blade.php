@extends('layout.app')

@section('content')

<table class="table table-striped table-bordered" style="margin-top: 70px;">
            <thead>
                <tr>
                    <td colspan="9" class="text-center h5"><a href="{{route('category')}}">Add Category</a></td>
                </tr>

                <tr class="text-center">
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Category Image</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            
            @foreach($categorys as $category)
            <tr class="text-center">

                <td>{{ $category->id }}</td>
                <td>{{ $category->c_name }}</td>
                <td><img src="{{ asset('upload/category/' . $category->c_image) }}" style="height: 100px; width: 100px;" /></td>


                <td><a href="{{ route('deletecategory',['id'=>$category->id]) }}"><i class="material-icons" style="margin-left: 30px; font-size: 25px; padding: 3px;">&#xE872;</i></a></td>

                <td><a href="{{ route('editc',['id'=>$category->id]) }}"><i class="material-icons" style="font-size: 25px;padding: 3px;">&#xE254;</i></a></td>
            </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
                {!! $categorys->links() !!}
            </div>
@endsection