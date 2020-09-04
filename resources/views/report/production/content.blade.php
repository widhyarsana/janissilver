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
               @foreach ($productions as $production)
               <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td>{{ $production->code }}</td>
                    <td>{{ $production->order->code }} - <span
                              class="text-muted">{{ $production->order->customer->name }}</span></td>
                    <td>{{ date('d F Y', strtotime($production->date))  }}</td>
                    <td>

                         @php($qty = 0)
                         @foreach ($production->order->products as $product)
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