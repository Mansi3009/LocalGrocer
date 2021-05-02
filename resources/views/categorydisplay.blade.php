@extends('layout.app')

@section('content')

<div id="wrapper">
    <div class="card" style="background-color: white;">
				
    <div class="card-body" style="background-color: white;"> 

    <div class="containers">
    <div class="row">
        @if(isset($products))

        @foreach($products as $product)
        
        <div class="col-sm-4">
            
            <article class="col-item">
                
                <div class="photo">
                    <img src="{{ asset('upload/product/' . $product->product_image) }}" style="height: 250px;width: 255px;" class="img-responsive" alt="Product Image" />
                    </div>
                <div class="info">
                    <div class="row">
                        <div class="price-details col-md-11">
                            
                            <p class="details">
                                {{ $product->product_description }}
                            </p>
                            
                            <h5>{{ $product->product_name }}</h5>
                            
                            <h1>Rs {{ $product->product_price }}</h1><br>
                            <h1>Discount: {{ $product->product_discount }}</h1>
                        </div>
                    </div>
                    
                    <div class="separator clear-left">
 
                        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">

                        <input type="hidden" name="product_name" id="product_name" value="{{ $product->product_name }}">

                        <input type="hidden" name="product_price" id="product_price" value="{{ $product->product_price }}">

                        <input type="hidden" name="product_discount" id="product_discount" value="{{ $product->product_discount }}">

                        <a href="#" class="add-to-cart btn-add btn bg-transparent"><i class="fa fa-shopping-cart"></i>Add to cart</a>

                        <p class="btn-details">
                            <a href="#" class="hidden-sm" data-toggle="tooltip" data-placement="top" title="Add to wish list"><i class="fa fa-heart"></i></a>
                            <a href="#" class="hidden-sm" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-exchange"></i></a>
                        </p>
                    </div>
                    <div class="clearfix">
                        
                    </div>
                </div>  
                
            </article>
        </div>
        @endforeach
        @endif
        </div>
    </div>
</div>                  
 
<!-- for category display -->           
<div id="sidebar-wrapper">
    <aside id="sidebar">
        <ul id="sidemenu" class="sidebar-nav">
            <li>
                <span style="color: white; font-size: 20px;">Categories</span>
            </li>
                        
            <li style="font-size: 17px;">
                
                @foreach($category as $category)
                    <a href="{{route('productdisplay',['id'=>$category->id]) }}">
                        <span class="sidebar-title">
                            {{ $category->c_name }}
                        </span>
                    </a>
                @endforeach
            
            </li>
        </ul>
    </aside>            
</div>

    </div>
</div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }); 
            $('.add-to-cart').click(function(e) {  
                e.preventDefault(); //important
                var product_id = $(this).closest('div').find('#product_id').val();
                var product_price = $(this).closest('div').find('#product_price').val();   
                var product_discount = $(this).closest('div').find('#product_discount').val(); 
                $.ajax({
                    type:'POST',
                    url:"{{ route('add-to-cart.post') }}",
                    data:{
                        product_id: product_id, 
                        product_price: product_price, 
                        product_discount: product_discount,
                        product_qty: 1,
                    },
                    success:function(data){
                        //route to next page
                        alert(data.message);
                    }
                });
                // $.ajax('add-to-cart', {
                //     type: 'GET',  // http method
                //     data: { 
                //         data: {
                //             product_id: product_id, 
                //             product_price: product_price, 
                //             product_discount: product_discount  
                //         } 
                //     },  // data to submit
                //     success: function (data, status, xhr) {
                //         console.log('hello')
                //         // $('p').append('status: ' + status + ', data: ' + data);
                //     },
                //     error: function (jqXhr, textStatus, errorMessage) {
                //         console.log('error')
                //             // $('p').append('Error' + errorMessage);
                //     }
                // });
                // $.ajax({
                //     url: 'add-to-cart',
                //     data: ,
                //     dataType: 'json',
                //     type: 'GET',
                //     success: function(response) {       
                //         console.log(response)
                //     } 
                // },
            });
    }); 
</script>
@endsection
