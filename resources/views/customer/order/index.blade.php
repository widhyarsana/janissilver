@extends('layouts.master')

@section('title', 'Daftar Pesanan')

@section('style')
<!-- Theme JS files -->
<script src="/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>

<script src="/assets/js/app.js"></script>
<script src="/global_assets/js/demo_pages/datatables_basic.js"></script>

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
                    <a href="{{ route('superadmin.admin.index') }}" class="breadcrumb-item">Pesanan</a>
                    <span class="breadcrumb-item active">Daftar Pesanan</span>
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

     <div class="content">
          @if(Session::has('success'))
          <input type="hidden" id="message" value="{{ session()->get('success') }}">
          @endif
          <!-- Basic datatable -->
          <div class="card">
               <div class="card-header">
                    <div class="header-elements text-center">
                         <h5 class="card-title">Daftar Pesanan</h5>
                    </div>
               </div>
               <table class="table datatable-basic">
                    <thead>
                         <tr>
                              <th>No</th>
                              <th>No Pesanan</th>
                              <th>Detail Produk</th>
                              <th>harga</th>
                              <th>status</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach($orders as $order)
                         <tr>
                              <td scope="row">{!! $loop->iteration !!}</td>
                              <td><a href="{{ route('customer.order.show', [$order]) }}">
                                   {{ $order->code }}</a></td>
                              
                              <td>
                                   @php($price = 0)
                                   @foreach ($order->products as $product)
                                   @php($price = $price + $product->pivot->price)
                                       {{ $product->name }} - <span class="text-muted">{{ $product->pivot->qty }} pcs</span> <br>
                                   @endforeach
                              </td>
                              <td>Rp. {{ number_format($price,2,',','.')}}</td>
                              <td>@if($order->status == 0) Dipesan @elseif($order->status == 1) Di Konfirmasi @else Dikirim @endif</td>
                              {{-- <td>Rp. {{ number_format($product->price,2,',','.')}}</td> --}}
                         </tr>
                         @endforeach
                    </tbody>
               </table>
          </div>
          <!-- /basic datatable -->



     </div>

</div>
<!--/content area -->
@endsection