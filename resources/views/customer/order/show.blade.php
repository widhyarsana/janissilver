@extends('layouts.master')

@section('title', 'Detail Pesanan')

@section('style')
<!-- Theme JS files -->
<script src="/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>
<script src="/global_assets/js/plugins/extensions/jquery_ui/widgets.min.js"></script>

<script src="/assets/js/app.js"></script>
<script src="/global_assets/js/demo_pages/task_manager_detailed.js"></script>
<!-- /theme JS files -->

@endsection

@section('header')
<!-- Page header -->
<div class="page-header page-header-light">


     <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
               <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('superadmin.admin.index') }}" class="breadcrumb-item">Pesanan</a>
                    <span class="breadcrumb-item active">Detail Pesanan</span>
               </div>

               <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
          </div>

     </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<!--Content area -->
<div class="content">

     <!-- Task overview -->
     <div class="card">
          <div class="card-header header-elements-md-inline">
               <h5 class="card-title">Kode Pesanan #{{ $order->code }} </h5>
               {{-- <div class="header-elements">
                    <a href="#" class="btn bg-teal-400 btn-sm btn-labeled btn-labeled-right">Check in <b><i
                                   class="icon-alarm-check"></i></b></a>
               </div> --}}
          </div>
     
          <div class="card-body">
     
               <h6 class="font-weight-semibold">Daftar Produk</h6>
               <div class="card card-table table-responsive shadow-0">
                    <table class="table">
                         <thead>
                              <tr>
                                   <th>#</th>
                                   <th>Nama Produk</th>
                                   <th>Jumlah</th>
                                   <th>Harga</th>
                              </tr>
                         </thead>
                         <tbody>
                              @php($price = 0)
                              @foreach ($order->products as $product)
                              @php($price = $price + $product->pivot->price)
                                  <tr>
                                   <td>1</td>
                                   <td><span class="font-weight-semibold">{{ \Str::ucfirst($product->name) }}</span> (<span class="text-muted">{{ $product->varian }} - {{ $product->materials }}</span>)</td>
                                   <td>
                                        {{ number_format($product->pivot->qty) }}
                                   </td>
                                   <td> Rp. {{ number_format($product->pivot->price,2,',','.')}} </td>
                              </tr>
                              @endforeach
                         </tbody>
                         <tfoot>
                              <tr>
                                   <td></td>
                                   <td></td>
                                   <td>Total Harga</td>
                                   <td><b>Rp. {{ number_format($price,2,',','.')}}</b></td>
                              </tr>
                         </tfoot>
                    </table>
               </div>
          </div>
     </div>
     <!-- /task overview -->
     

</div>
<!--/content area -->
@endsection