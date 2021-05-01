@extends('layout.app')

@section('content')

<script type="text/javascript">

    $(document).ready(function(){

        <?php $maxp = count($products); 
              
        for($i=0;$i<$maxp; $i++) {?>

        $('#cartBtn<?php echo $i;?>').click(function(){
            var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();
            //alert(pro_id);
        $.ajax({
            type : 'get',
            url : '<?php echo url('/addItem')?>/'+pro_id<?php echo $i;?>,
            success:function(){
                alert('done');
            }
        });
        });

    <?php }?>
    
    });
</script>

<div class="container">
	<div class="row">
        <?php  
        if($products->isEmpty())
        {?>
            Sorry, Products Not Found...

        <?php } 
        else 
        {  
            $countP=0;
        }
        ?>
        @foreach($products as $product)
        <input type="hidden" id="pro_id<?php echo $countP; ?>" value="{{ $product->id }}">
        <div class="col-sm-3">
        	
            <article class="col-item">
        		
        		<div class="photo">
        			<img src="{{ asset('upload/product/' . $product->product_image) }}" style="height: 250px;width: auto;" class="img-responsive" alt="Product Image" />
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
        				<!--<p class="btn-add">
        					<i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm btn btn-secondary">Add to cart</a>
        				</p>-->
                        <button class="btn-add btn-secondary bg-transparent"><a href="#"  name="cart" id="cartBtn<?php echo $countP; ?>" style="margin-top: 2px; color: black;">
                            <i class="fa fa-shopping-cart"></i>Add to cart
                        </button></a>


        				<p class="btn-details">
        					<a href="#" class="hidden-sm" data-toggle="tooltip" data-placement="top" title="Add to wish list"><i class="fa fa-heart"></i></a>
        					<a href="#" class="hidden-sm" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-exchange"></i></a>
        				</p>
        			</div>
        			<div class="clearfix"></div>
        		</div>	
        	</article>
        </div>
        <?php $countP++ ?>
	 @endforeach
    </div>
</div>

@endsection