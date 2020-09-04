@extends('layouts.master')

@section('title', 'Daftar Pelanggan')

@section('style')
<style>
     .quantity {
          float: left;
          margin-right: 15px;
          background-color: #eee;
          position: relative;
          width: 80px;
          overflow: hidden
     }

     .quantity input {
          margin: 0;
          text-align: center;
          width: 15px;
          height: 15px;
          padding: 0;
          float: right;
          color: #000;
          font-size: 20px;
          border: 0;
          outline: 0;
          background-color: #F6F6F6
     }

     .quantity input.qty {
          position: relative;
          border: 0;
          width: 100%;
          height: 40px;
          padding: 10px 25px 10px 10px;
          text-align: center;
          font-weight: 400;
          font-size: 15px;
          border-radius: 0;
          background-clip: padding-box
     }

     .quantity .minus,
     .quantity .plus {
          line-height: 0;
          background-clip: padding-box;
          -webkit-border-radius: 0;
          -moz-border-radius: 0;
          border-radius: 0;
          -webkit-background-size: 6px 30px;
          -moz-background-size: 6px 30px;
          color: #bbb;
          font-size: 20px;
          position: absolute;
          height: 50%;
          border: 0;
          right: 0;
          padding: 0;
          width: 25px;
          z-index: 3
     }

     .quantity .minus:hover,
     .quantity .plus:hover {
          background-color: #dad8da
     }

     .quantity .minus {
          bottom: 0
     }

     .shopping-cart {
          margin-top: 20px;
     }
</style>
<script src="https://use.fontawesome.com/c560c025cf.js"></script>
<script src="/global_assets/js/plugins/media/fancybox.min.js"></script>
<script src="/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

<script src="/assets/js/app.js"></script>
<script src="/global_assets/js/demo_pages/ecommerce_product_list.js"></script>

<script src="/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
<script src="/global_assets/js/demo_pages/alert.js"></script>
<!-- /theme JS files -->

@endsection

@section('header')
<!-- Page header -->
<div class="page-header page-header-light">


     <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
               <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a class="breadcrumb-item">Keranjang Belanja</a>
               </div>
          </div>
     </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<!-- Content area -->
<div class="content">

     
          @if(Session::has('success'))
          <input type="hidden" id="message" value="{{ session()->get('success') }}">
          @endif
 

     <div class="card shopping-cart">
          <input type="hidden" id="csrf" value="{{csrf_token()}}">
          <div class="card-header bg-dark text-light">
               <i class="fa fa-shopping-cart" aria-hidden="true"></i>
               Keranjang Belanja
               <a href="{{ route('customer.product.index') }}" class="btn btn-outline-info btn-sm pull-right">Lanjutkan
                    Belanja</a>
               <div class="clearfix"></div>
          </div>
          @if(session()->has('cart') && count(session()->get('cart')) != null)
          <div id="cart-content">
               <div id="child">
                    <div class="card-body">
                         <!-- PRODUCT -->
                         @php($totalPrice = 0)
                         @php($b=0)
                         @foreach ($carts as $i => $cart)
                         @php($b++)
                         <input type="hidden" id="product_{{ $b }}" value="{{ $i }}">
                         <div class="row">
                              <div class="col-12 col-sm-12 col-md-2 text-center">
                                   <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew"
                                        width="120" height="80">
                              </div>
                              <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                   <h4 class="product-name"><strong>{{ $cart['product_name'] }}</strong></h4>
                                   <h6>
                                        <small>Bahan: {{ $cart['materials'] }}</small>
                                   </h6>
                                   <h6>
                                        <small>Variasi: {{ $cart['varian'] }}</small>
                                   </h6>
                              </div>

                              <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                                   <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                        <h6><strong>Rp. {{ number_format($cart['price'],2,',','.')}} <span
                                                       class="text-muted">x</span></strong></h6>
                                   </div>
                                   <div class="col-4 col-sm-4 col-md-4">
                                        <div class="quantity">
                                             <input type="number" step="1" id="value_{{ $b }}" min="1"
                                                  value="{{ $cart['product_qty'] }}" title="Qty" class="qty" size="4">
                                        </div>
                                   </div>
                                   <div class="col-2 col-sm-2 col-md-2 text-right">
                                        <a href="{{ route('customer.cart.delete-from-cart', [$i]) }}">
                                             <button type="button" class="btn btn-outline-danger btn-xs">
                                                  <i class="fa fa-trash" aria-hidden="true"></i>
                                             </button>
                                        </a>
                                   </div>
                              </div>
                         </div>
                         <input type="hidden" id="cartsCount" value="{{ count($carts) }}">
                         <hr>
                         @php($totalPrice = $totalPrice + $cart['price'])
                         @endforeach
                         <!-- END PRODUCT -->
                         <div class="pull-right">
                              <button id="update-cart" class="btn btn-outline-secondary pull-right update-cart">
                                   Perbarui Keranjang Belanja
                              </button>
                         </div>
                         <br><br>
                    </div>
                    <div class="card-footer">
                         <div class="pull-right" style="margin: 10px">
                              <a href="{{ route('customer.cart.checkout') }}"
                                   class="btn btn-success pull-right mx-4">Checkout</a>
                              <div class="pull-right" style="margin: 5px">
                                   Total price: <b>Rp. {{ number_format($totalPrice,2,',','.')}}</b>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          @else
          <div class="card-body">
               <h4>Tidak Ada</h4>
          </div>
          @endif
     </div>

     @php($i=1)
</div>
<!-- /content area -->
@endsection

@section('script')
<script>
     // var count = $('#cartsCount').val();
     //      var data = [];
     //      var product = [];
     //      var qty = [];
     //     function update(){
     //           for(i=1; i<=count; i++){
     //                var a = $('#product_'+i).val();
     //                var b = $('#value_'+i).val();
                    
     //                 product.push(
     //                     a
     //                );
     //                qty.push(
     //                     b
     //                );
     //           }

     //           $.ajax({
     //            url:"{{ route('customer.cart.update') }}",
     //            headers: {
     //                'X-CSRF-TOKEN': $('#csrf').val(),
     //                Accept: "application/json"
     //            },
     //            type: 'post',
     //            data: {
     //                 'product': product,
     //                 'qty': qty
     //            }
     //        }).done( function(response) {    
     //            product = [];
     //            qty = [];
     //            $('#cart-content').html(response['content']);
     //           //  window.location = 'http://karin.io/customer/product/cart';
     //        });
     //     }


</script>
@endsection