@extends('layout.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-sm-4">
        	<article class="col-item">

        		@foreach($product as $product)
        		
        		<div class="photo">
        			<img src="{{ asset('upload/product/' . $product->product_image) }}" class="img-responsive" alt="Product Image" />
        		</div>
        		<div class="info">
        			<div class="row">
        				<div class="price-details col-md-6">
        					
        					<p class="details">
        						Lorem ipsum dolor sit amet, consectetur..
        					</p>
        					
        					<h1>Sample Product</h1>
        					
        					<span class="price-new">$110.00</span><br>
        					<span class="price-new">12</span>
        				</div>
        			</div>
        			<div class="separator clear-left">
        				<p class="btn-add">
        					<i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm">Add to cart</a>
        				</p>
        				<p class="btn-details">
        					<a href="#" class="hidden-sm" data-toggle="tooltip" data-placement="top" title="Add to wish list"><i class="fa fa-heart"></i></a>
        					<a href="#" class="hidden-sm" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-exchange"></i></a>
        				</p>
        			</div>
        			<div class="clearfix"></div>
        		</div>
        	
        	</article>
        </div>

	</div>

</div>

@endsection