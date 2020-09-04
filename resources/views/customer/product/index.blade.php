@extends('layouts.master')

@section('title', 'Daftar Pelanggan')

@section('style')
<!-- Theme JS files -->
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
                    <a href="{{ route('customer.product.index') }}" class="breadcrumb-item">Produk</a>
                    <span class="breadcrumb-item active">Daftar Produk</span>
               </div>
          </div>
     </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<!-- Content area -->
<div class="content">
     <!-- Inner container -->
     <div class="d-flex align-items-start flex-column flex-md-row">

          <!-- Left content -->
          <div class="w-100 overflow-auto order-2 order-md-1">
               @if(Session::has('success'))
               <input type="hidden" id="message" value="{{ session()->get('success') }}">
               @endif
               <!-- Grid -->
               <div class="row">
                    @foreach ($products as $product)
                        <div class="col-xl-3 col-sm-6">
                         <div class="card">
                              <div class="card-body">
                                   <div class="card-img-actions">
                                        <a href="{!! asset($product->image) !!}" data-popup="lightbox">
                                             <img src="{!! asset($product->image) !!}" class="card-img" width="100px" height="150px"
                                                  alt="">
                                             <span class="card-img-actions-overlay card-img">
                                                  <i class="icon-plus3 icon-2x"></i>
                                             </span>
                                        </a>
                                   </div>
                              </div>
                    
                              <div class="card-body bg-light text-center">
                                   <div class="mb-1">
                                        <h6 class="font-weight-semibold mb-0">
                                             <p class="text-default">{{ $product->name }}</p>
                                        </h6>
                                   </div>
                                   <p class="text-muted">Variasi: {{ $product->varian }}</p>
                                   <p class="text-muted">Bahan: {{ $product->materials }}</p>
                    
                                   <h3 class="mb-2 font-weight-semibold">Rp. {{ number_format($product->price,2,',','.')}}</h3>
                                   <input type="number" class="form-control mb-2 alert" min="0" id="qty_{{ $product->id }}" placeholder="Jumlah">
                                   <input type="hidden" id="product_{{ $product->id }}" value="{{ $product->id }}">
                    
                                   <button onclick="add({{ $product->id }})" type="button" class="btn bg-teal-400" >
                                        <i class="icon-cart-add mr-2"></i> Add
                                        to cart
                                   </button>
                              </div>
                         </div>
                    </div>
                    @endforeach
               </div>
          </div>
          <!-- /left content -->

     </div>
     <!-- /inner container -->

</div>
<!-- /content area -->
@endsection

@section('script')
    <script>

         function add(id){
              var product = $('#product_'+ id).val();
               var qty = $('#qty_'+id).val();

               if(qty < 1){
                    $('.alert').removeClass('alert-warning');
                    $('#qty_'+id).addClass('alert-warning').focus();
               }else{
                    window.location = '{{ url("/") }}' + '/customer/product/add-to-cart/' + product + '/' + qty;
               }
          
              
         }
    </script>
@endsection