<!-- resources/views/admin.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="mx-lg-5 mt-lg-4 mb-lg-3">
        <div class="rounded bg-info pt-3 pb-3">
            <div class="row"  style="margin-left:5%; margin-right:5%;">
                <div class="col-md-6">
                    <h2 class="text1">List Produk</h2>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="col-md-auto ms-auto">
                        <a href="{{ route('form_product') }}" class="btn btn-dark m-auto md-1 me-1">Tambah Produk</a>
                    </div>
                    <div class="col-md-auto">
                        <a href="{{ route('get_product') }}" class="btn btn-secondary m-auto">Kembali ke Produk</a>
                    </div>
                </div>
                </div>

        <div class="container">
                    
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->weight }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        @if ($product->condition === 'Bekas')
                        <button type="button" class="btn btn-dark">{{ $product->condition }}</button>
                        @elseif ($product->condition === 'Baru')
                        <button type="button" class="btn btn-success">{{ $product->condition }}</button>
                        @else
                        <button type="button" class="btn btn-secondary">{{ $product->condition }}</button>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('edit_product', $product->id) }}" class="btn btn-warning btn-sm">Update</a>
                        <form action="{{ route('delete_product', $product->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
            </div>
        </div>
    </div>
</body>

<!-- <body>
    <div class="container">
        <h2 class="text-center my-4">Data Produk</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->weight }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->condition }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('edit_product', $product->id) }}" class="btn btn-primary btn-sm">Update</a>
                        <form action="{{ route('delete_product', $product->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
