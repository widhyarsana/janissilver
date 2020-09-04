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
                    <h2>LAPORAN PESANAN</h2>
               </div>
          
               <div class="table-responsive" style="font-size: 9pt;">
                    <table class="table">
                         <thead>
                              <tr class="bg-info">
                                   <th>No</th>
                                   <th>No Pesanan</th>
                                   <th>Tanggal</th>
                                   <th>Pelanggan</th>
                                   <th>Jumlah Produk</th>
                                   <th>Total Harga</th>
               
                              </tr>
                         </thead>
                         <tbody>
                              @php($totalq = 0)
                              @php($totalp = 0)
                              @foreach ($orders as $order)
                              <tr>
                                   <td>{!! $loop->iteration !!}</td>
                                   <td>{{ $order->code }}</td>
                                   <td>{{ date('d F Y', strtotime($order->date))  }}</td>
                                   <td>{{ $order->customer->name }}</td>
                                   <td>
               
                                        @php($qty = 0)
                                        @foreach ($order->products as $product)
                                        @php($qty = $qty + $product->pivot->qty)
                                        @endforeach
                                        {{ number_format($qty) }}
                                   </td>
                                   <td>
               
                                        @php($price = 0)
                                        @foreach ($order->products as $product)
                                        @php($price = $price + $product->pivot->price)
                                        @endforeach
                                        Rp. {{ number_format($price,2,',','.')}}
                                   </td>
                              </tr>
                              @php($totalq = $totalq + $qty)
                              @php($totalp = $totalp + $price)
                              @endforeach
                         <tfoot>
                              <tr>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td class="bg-blue">Total</td>
                                   <td class="bg-blue">{{ number_format($totalq) }}</td>
                                   <td class="bg-blue">Rp. {{ number_format($totalp,2,',','.')}}</td>
                              </tr>
                         </tfoot>
                         </tbody>
                    </table>
               </div>
         
    
</body>

</html>