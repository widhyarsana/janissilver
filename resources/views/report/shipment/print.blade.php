<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

     <title>Hello, world!</title>
</head>

<body>
               <div class="text-center">
                    <h2>LAPORAN PENGIRIMAN</h2>
               </div>
          
               <div class="table-responsive" style="font-size: 9pt;">
                    <table class="table">
                         <thead>
                              <tr class="bg-info">
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
                                   <td>{{ $shipment->order->code }} - <span
                                             class="text-muted">{{ $shipment->order->customer->name }}</span></td>
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
         
    
</body>

</html>