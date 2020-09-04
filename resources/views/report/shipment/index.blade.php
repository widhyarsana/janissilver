@extends('layouts.master')

@section('title', 'Laporan Pengiriman')

@section('style')

<!-- Theme JS files -->
<script src="/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>

<script src="/assets/js/app.js"></script>
<script src="/global_assets/js/demo_pages/datatables_basic.js"></script>
<!-- /theme JS files -->

@endsection

@section('header')
<!-- Page header -->
<div class="page-header page-header-light">


     <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
               <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item">Laporan</span>
                    <span class="breadcrumb-item active">Laporan Pengiriman</span>
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

     <div class="card">
          <div class="card-header text-center">
               <h1 class="card-title">LAPORAN PENGIRIMAN</h1>
               <hr style="width: 150px; border: solid red 1px;" class="round">
          </div>

          <div class="card-body">
               <form action="{{ route('report.shipment.store') }}" method="post">
                    {{-- <form> --}}
                    @csrf
                    <input type="hidden" id="csrf" value="{{csrf_token()}}">
                    <div class="row">
                         <div class="col-md-2">
                              <div class="form-group">
                                   <label for="">Tanggal Awal</label>
                                   <input id="start" name="start" type="date" class="form-control">
                              </div>
                         </div>
                         <div class="col-md-2">
                              <div class="form-group">
                                   <label for="">Tanggal Akhir</label>
                                   <input id="end" name="end" type="date" class="form-control">
                              </div>
                         </div>
                         <div class="col-md-8 text-right px-5 pt-3">
                              <div class="form-group">
                                   <input type="button" onclick="search()" class="btn btn-primary" value="Cari"
                                        name="cari">
                                   <input type="submit" class="btn btn-primary" value="Cetak" name="cetak">
                              </div>
                         </div>
                    </div>
               </form>
          </div>

          <div id="order-content">
               <div class="table-responsive">
                    <table class="table">
                         <thead>
                              <tr class="bg-blue">
                                   <th>No</th>
                                   <th>No Pesanan</th>
                                   <th>No. Pesanan</th>
                                   <th>Tanggal</th>
                                   <th>Jumlah Produk</th>
               
                              </tr>
                         </thead>
                         <tbody>
                              @php($totalq = 0)
                              @foreach ($shipments as $shipment)
                              <tr>
                                   <td>{!! $loop->iteration !!}</td>
                                   <td>{{ $shipment->code }}</td>
                                   <td>{{ $shipment->order->code }} - <span class="text-muted">{{ $shipment->order->customer->name }}</span></td>
                                   <td>{{ date('d F Y', strtotime($shipment->date))  }}</td>
                                   <td>
               
                                        @php($qty = 0)
                                        @foreach ($shipment->order->products as $product)
                                        @php($qty = $qty + $product->pivot->qty)
                                        @endforeach
                                        {{ number_format($qty) }}
                                   </td>
                              </tr>
                              @php($totalq = $totalq + $qty)
                              @endforeach
                         <tfoot>
                              <tr>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td class="bg-blue">Total</td>
                                   <td class="bg-blue">{{ number_format($totalq) }}</td>
                              </tr>
                         </tfoot>
                         </tbody>
                    </table>
               </div>
          </div>
     </div>



</div>


<!--/content area -->
@endsection

@section('script')
<script>
     function search() {
          
          var start = $('#start').val();
          var end = $('#end').val();

          var data = {
               'start':  start,
               'end': end,
          };

          $.ajax({
               url:"{{ route('report.shipment.store') }}",
               headers: {
                    'X-CSRF-TOKEN': $('#csrf').val(),
                    Accept: "application/json"
               },
               type: 'post',
               data: data
          }).done( function(response) {
               $('#order-content').html(response['content']);
               $('#message').html(response['message']);
          });
     }
</script>

@endsection