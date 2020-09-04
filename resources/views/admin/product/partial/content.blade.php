<div id="child">
     <input type="hidden" id="csrf" value="{{csrf_token()}}">
     <input type="hidden" id="obj" value="product">
     <input type="hidden" id="sum" value="{{ $products->count() }}">
     <table class="table datatable-basic">
          <thead>
               <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Bahan</th>
                    <th>Variasi</th>
                    <th>Harga</th>
                    <th class="text-center">Actions</th>
               </tr>
          </thead>
          <tbody>
               @foreach($products as $key => $product)
               <tr id="content_{{ $product->id }}">
                    <td scope="row">{!! $loop->iteration !!}</td>
                    <td>{{ \Str::ucfirst($product->name) }}</>
                    </td>
                    <td>{{ \Str::ucfirst($product->materials) }}</td>
                    <td>{{ \Str::ucfirst($product->varian) }}</td>
                    <td>Rp. {{ number_format($product->price,2,',','.')}}</td>

                    <td style="width: 20%">
                         <a href="{{ route('admin.product.edit', [$product]) }}" class="btn btn-success">Edit</a>
                         <button class="btn btn-danger delete-item" data-id="{{ $product->id }}" id="hapus_{{ $key }}"
                              class="hapusya">Delete</button>
                         <input type="hidden" id="item_{{ $key }}" value="{{ $product->id }}"></td>
               </tr>
               @endforeach
          </tbody>
     </table>
</div>