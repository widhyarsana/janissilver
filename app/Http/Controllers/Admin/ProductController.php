<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();

        return (view('admin.product.index', compact('products')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (view('admin.product.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $image = $request->file('image');
        $name = time(). '-' . $image->getClientOriginalName();
        Storage::putFileAs(
            'public/images/products',
            $request->file('image'),
            $name
        );

        $fileName = '/storage/images/products/'.$name;
        // Storage::delete($path);

        $data = [
            'name' => request()->name,
            'materials' => request()->materials,
            'varian' => request()->varian,
            'price' => request()->price,
            'image' => $fileName,
        ];

        $product = Product::create($data);

        $message = 'Berhasil menambahkan Produk baru';
        Session::flash('product', $message);

        return redirect(route('admin.product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $fileName = $product->image;
        $image = $request->file('image');

        if ($image != null) {
            Storage::delete('public/'.$fileName);

            $name = time() . '-' . $image->getClientOriginalName();

            Storage::putFileAs(
                'public/images/products',
                $request->file('image'),
                $name
            );

            $fileName = '/storage/images/products/' . $name;
        };

        $data = [
            'name' => request()->name,
            'materials' => request()->materials,
            'varian' => request()->varian,
            'price' => request()->price,
            'image' => $fileName,
        ];

        $product->update($data);

        $message = 'Berhasil Mengubah Produk';

        Session::flash('product', $message);

        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();

        $message = 'Berhasil Menghapus Produk';

        Session::flash('product', $message);

        return redirect(route('admin.product.index'));
    }

    public function delete()
    {

        $id = request()->id;

        $product = Product::find($id);
        $product->delete();

        $products = Product::get();
        $rs['content'] = View::make('admin.product.partial.content')
            ->with('products', $products)
            ->render();

        return response($rs);
    }
}
