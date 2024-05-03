<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    public function callSession(Request $request)
    {
        return redirect()->back()->with('status', 'Berhasil memanggil sesi');
    }

    public function getAdmin()
    {
        $products = Product::all();
        return view('admin', ['products' => $products]);
    }

    public function editProduct(Request $request, Product $product)
    {
        return view('edit_product', ['product' => $product]);
    }

    public function updateProduct(Request $request, Product $product)
    {
        // Periksa validitas input
        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'condition' => 'required',
            'description' => 'required',
        ]);

        // Update data produk
        $product->update($request->all());

        // Redirect kembali ke halaman admin
        return redirect()->route('admin')->with('message', 'Berhasil update data');
    }

    public function deleteProduct(Request $request, Product $product)
    {
        $product->delete();
        return redirect()->back()->with('status', 'Berhasil menghapus data');
    }

    public function getProduct()
    {
        $products = Product::all();
        return view('list_product')->with('products', $products);
    }

    public function handleRequest(Request $request)
    {
        return view('handle_request');
    }

    public function postRequest(Request $request)
{
    // Memeriksa apakah semua kolom terisi
    if ($request->filled(['image', 'name', 'weight', 'price', 'stock', 'condition', 'description'])) {
        // Menyimpan data produk baru
        Product::create([
            'image' => $request->image,
            'name' => $request->name,
            'weight' => $request->weight,
            'price' => $request->price,
            'condition' => $request->condition,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        // Mengembalikan ke halaman admin dengan pesan sukses
        return redirect()->route('admin')->with('message', 'Berhasil menambahkan produk.');
    } else {
        // Inisialisasi array untuk menyimpan pesan error
        $errors = [];

        // Memeriksa setiap kolom dan menambahkan pesan error khusus jika tidak terisi
        if (!$request->filled('image')) {
            $errors[] = 'Error. Field Gambar wajib diisi.';
        }
        if (!$request->filled('name')) {
            $errors[] = 'Error. Field Nama wajib diisi.';
        }
        if (!$request->filled('weight')) {
            $errors[] = 'Error. Field Berat wajib diisi.';
        }
        if (!$request->filled('price')) {
            $errors[] = 'Error. Field Harga wajib diisi.';
        }
        if (!$request->filled('stock')) {
            $errors[] = 'Error. Field Stok wajib diisi.';
        }
        if (!$request->filled('condition')) {
            $errors[] = 'Error. Field Kondisi wajib diisi.';
        }
        if (!$request->filled('description')) {
            $errors[] = 'Error. Field Deskripsi wajib diisi.';
        }

        // Kembalikan ke halaman sebelumnya dengan pesan error yang sesuai
        return redirect()->back()->with('errors', $errors);
    }
}



    public function admin()
    {
        $products = Product::all();
        return view('admin', compact('products'));
    }
}
