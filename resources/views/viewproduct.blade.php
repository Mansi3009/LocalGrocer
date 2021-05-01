@extends('layout.app')

@section('content')

<table class="table table-striped table-bordered" style="margin-top: 70px;">
            <thead>
                <tr>
                    <td colspan="9" class="text-center h5"><a href="{{route('product')}}">Add Product</a></td>
                </tr>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Image</th>
                    <th>Product Status</th>
                    <th>Product Price</th>
                    <th>Product Discount</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            
            @foreach($product as $products)
            <tr class="text-center">

                <td>{{ $products->id }}</td>
                <td>{{ $products->product_name }}</td>
                <td>{{ $products->product_description }}</td>
                <td><img src="{{ asset('upload/product/' . $products->product_image) }}" style="height: 100px; width: 100px;" /></td>
                <td>{{ $products->product_status }}</td>
                <td>{{ $products->product_price }}</td>
                <td>{{ $products->product_discount }}</td>

                <td><a href="{{ route('deleteproduct',['id'=>$products->id]) }}"><i class="material-icons" style="margin-left: 30px; font-size: 25px; padding: 3px;">&#xE872;</i></a></td>

                <td><a href="{{ route('editp',[$products->id]) }}"><i class="material-icons" style="font-size: 25px;padding: 3px;">&#xE254;</i></a></td>
            </tr>
            @endforeach
            
                     
        </table>
        <div class="d-flex justify-content-center">
                {!! $product->links() !!}
            </div>
@endsection