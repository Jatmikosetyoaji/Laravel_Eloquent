<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class TugasController extends Controller
{
    public function getForm()
    {
        return view('form_request');
    }

    public function product()
    {
         $data = DB::table('products')->get() ;

        $data2 = DB::table('u_products')->get();

        return view('products_catalog', ['products' => $data, 'u_products'=>$data2]);

        return redirect('/product-request');
    }


    public function table()
    {
        $data = DB::table('products')->get() ;


        return view('table_request', ['products' => $data]);
    }

    public function postForm(Request $req)
    {
        if (!$req->filled('image')) {
            return redirect()->back()->with('error', 'Error. Field gambar Wajib diisi.');
        } else if (!$req->filled('name')) {
            return redirect()->back()->with('error', 'Error. Field Nama Produk Wajib diisi.');
        } else if ($req->berat==0) {
            return redirect()->back()->with('error', 'Error. Field Berat Wajib diisi.');
        } else if (!$req->filled('harga')) {
            return redirect()->back()->with('error', 'Error. Field Harga Wajib diisi.');
        } else if (!$req->filled('stok')) {
            return redirect()->back()->with('error', 'Error. Field Stok Wajib diisi.');
        } else if ($req->kondisi == 0) {
            return redirect()->back()->with('error', 'Error. Field Kondisi Wajib diisi.');
        } else if (!$req->filled('deskripsi')) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi Wajib diisi.');
        }

        DB::table('products')->insert([
            'Nama'=> $req->name,
            'Harga' => $req->harga,
            'Stok' => $req->stok,
            'Berat' => $req->berat,
            'Gambar' => $req->image,
            'Kondisi' => $req->kondisi,
            'Deskripsi' => $req->deskripsi,
            
        ]);

        return redirect('/admin/table-request');
    }

    public function edit($id) {
        $req = Product::find($id);

        return view('edit_request', compact('req'));
    }

    public function update(Request $req, $id) {
    if (!$req->filled('image')) {
            return redirect()->back()->with('error', 'Error. Field gambar Wajib diisi.');
        } else if (!$req->filled('name')) {
            return redirect()->back()->with('error', 'Error. Field Nama Produk Wajib diisi.');
        } else if ($req->berat==0) {
            return redirect()->back()->with('error', 'Error. Field Berat Wajib diisi.');
        } else if (!$req->filled('harga')) {
            return redirect()->back()->with('error', 'Error. Field Harga Wajib diisi.');
        } else if (!$req->filled('stok')) {
            return redirect()->back()->with('error', 'Error. Field Stok Wajib diisi.');
        } else if ($req->kondisi == 0) {
            return redirect()->back()->with('error', 'Error. Field Kondisi Wajib diisi.');
        } else if (!$req->filled('deskripsi')) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi Wajib diisi.');
        }

        DB::table('products')
        ->where('id', $req->id)
        ->update([
        'Nama'=> $req->name,
        'Harga' => $req->harga,
        'Stok' => $req->stok,
        'Berat' => $req->berat,
        'Gambar' => $req->image,
        'Kondisi' => $req->kondisi,
        'Deskripsi' => $req->deskripsi,
]);
    
    return redirect('/admin/table-request')->with('success', 'Post updated successfully');
}

    public function delete(Request $req, $id) {
    $product = Product::find($id);
    $product->delete();

    // dd($product);

    return redirect()->back()->with('success', 'Product deleted successfully');
}
}