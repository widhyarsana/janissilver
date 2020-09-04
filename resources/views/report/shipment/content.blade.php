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