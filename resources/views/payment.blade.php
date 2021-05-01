@extends('layout.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 col-10 offset-1 pl-0 pr-0">
            <div class="card">
                    
                <div class="card-header">
                        <div class="row">
                            
                            <div class="col-md-5 col-12 pt-2">
                                <h6 class="m-0"><strong>Payment Details</strong></h6>
                            </div>
                            
                            <div class="col-md-7 col-12 icons">
                                <i class="fa fa-cc-visa fa-2x" aria-hidden="true"></i>
                                <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i>
                                <i class="fa fa-cc-discover fa-2x" aria-hidden="true"></i>
                                <i class="fa fa-cc-amex fa-2x" aria-hidden="true"></i>
                            </div>
                        
                        </div>
                </div>

                <div class="card-body">
                        <form>
                            <div class="form-group">
                                
                                <label for="validationTooltipCardNumber">
                                    <strong>CARD NUMBER</strong>
                                </label>

                                <div class="input-group">
                                    <input type="text" class="form-control border-right-0" id="validationTooltipCardNumber" placeholder="Card Number">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text rounded-right" id="validationTooltipCardNumber"><i class="fa fa-credit-card"></i></span>
                                    </div>
                              </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-8 col-12">
                                    <div class="form-group">
                                        <label for="exampleInputExpirationDate">
                                            <strong>EXPIRATION DATE</strong>
                                        </label>

                                        <input type="text" class="form-control" id="exampleInputExpirationDate" placeholder="MM / YY">
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="exampleInputCvcCode">
                                            <strong>CVC CODE</strong>
                                        </label>
                                        
                                        <input type="text" class="form-control" id="exampleInputCvcCode" placeholder="CVC">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputCouponCode">
                                    <strong>COUPON CODE</strong>
                                </label>
                                
                                <input type="text" class="form-control" id="exampleInputCouponCode" placeholder="Coupon Code">
                            </div>

                            <button class="btn btn-info w-100 pb-2 pt-2">Start Subscription
                            </button>
                        
                        </form>
                </div>

            </div>
        </div>
    </div>
</div>      
    
@endsection