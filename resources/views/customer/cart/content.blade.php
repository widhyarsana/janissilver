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
                    <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">
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
               <a href="{{ route('customer.cart.checkout') }}" class="btn btn-success pull-right mx-4">Checkout</a>
               <div class="pull-right" style="margin: 5px">
                    Total price: <b>Rp. {{ number_format($totalPrice,2,',','.')}}</b>
               </div>
          </div>
     </div>
</div>