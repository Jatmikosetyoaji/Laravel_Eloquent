<?php

namespace App\Http\Controllers;

use App\Models\UProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
     public function getForm()
    {
        return view('u_form');
    }

    public function utable()
    {
        $data = DB::table('u_products')->get() ;


        return view('u_product', ['u_products' => $data]);

        return redirect('/admin/2/table-request');
    }


    public function postForm2(Request $req)
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

        DB::table('u_products')->insert([
            'Nama'=> $req->name,
            'Harga' => $req->harga,
            'Stok' => $req->stok,
            'Berat' => $req->berat,
            'Gambar' => $req->image,
            'Kondisi' => $req->kondisi,
            'Deskripsi' => $req->deskripsi,
            
        ]);

        return redirect('/admin/2/table-request');
    }

    public function edit($id) {
        $req = UProduct::find($id);

        return view('u_edit', compact('req'));
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

        DB::table('u_products')
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
    
    return redirect('/admin/2/table-request')->with('success', 'Post updated successfully');
}

    public function delete(Request $req, $id) {
    $product = UProduct::find($id);
    $product->delete();

    // dd($product);

    return redirect()->back()->with('success', 'Product deleted successfully');
}
}
