<!-- resources/views/edit_product.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 rounded bg-info mt-3 py-3">
                <h2 class="text-center fw-bold" style="font-size: 20px">Edit Produk</h2>
                <form class="mt-3" action="{{ route('update_product', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="image" class="form-label fw-semibold">Gambar Produk</label>
                        <input type="text" class="form-control" id="image" name="image" value="{{ $product->image }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Produk</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label fw-semibold">Berat</label>
                        <input type="number" class="form-control" id="weight" name="weight" value="{{ $product->weight }}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label fw-semibold">Harga</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label fw-semibold">Stok</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
                    </div>
                    <div class="mb-3">
                        <label for="condition" class="form-label fw-semibold">Kondisi</label>
                        <select class="form-select" id="condition" name="condition">
                            <option value="Bekas" {{ $product->kondisi === 'Bekas' ? 'selected' : '' }}>Bekas</option>
                            <option value="Baru" {{ $product->kondisi === 'Baru' ? 'selected' : '' }}>Baru</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">Deskripsi</label>
                        <textarea class="form-control" id="deskription" name="description" rows="3">{{ $product->description }}</textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
