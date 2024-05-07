<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
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

        $product->update($request->all());

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
    
    if ($request->filled(['image', 'name', 'weight', 'price', 'stock', 'condition', 'description'])) {
        
        Product::create([
            'image' => $request->image,
            'name' => $request->name,
            'weight' => $request->weight,
            'price' => $request->price,
            'condition' => $request->condition,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        
        return redirect()->route('admin')->with('message', 'Berhasil menambahkan produk.');
    } else {
        
        $errors = [];

        
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

        
        return redirect()->back()->with('errors', $errors);
    }
}


// public function admin()
// {
//     $user = User::find(1);

//     if ($user) {
//         $products = $user->products;

//         if ($products && $products->isNotEmpty()) {
//             return view('admin', compact('products'));
//         } else {
//             return view('admin')->with('error', 'Belum ada produk yang ditambahkan oleh pengguna ini.');
//         }
//     } else {
//         return view('admin')->with('error', 'Pengguna tidak ditemukan.');
//     }
// }

public function admin()
{
    $user = User::findOrFail(1); // Mengambil user dengan user_id 1

    $products = $user->products()->get(); // Mendapatkan produk dari user_id 1

    return view('admin', compact('products'));
}

public function merchant()
{
    $user = User::findOrFail(2); // Mengambil user dengan user_id 2
    $products = $user->products()->get(); // Mendapatkan produk dari user_id 2

    return view('merchant', compact('products')); // Memuat view dan melewatkan data produk
}







    // public function admin()
    // {
    //     $products = Product::all();
    //     return view('admin', compact('products'));
    // }



    // public function store()
    // {
    //     $user = User::find(1);
    //     $product = new Product();
    //     $product->title = 'Judul Postingan 1';
    //     $product->content = 'Isi dari postingan 1';
    //     $product->user_id = $user->id;
    // }
}
