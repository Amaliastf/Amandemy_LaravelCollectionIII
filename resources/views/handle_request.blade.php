<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        @if (Session::has('errors'))
        <div class="row">
            <div class="col-md-4 offset-4 mt-2 py-2 rounded bg-danger text-white fw-bold">
                @foreach (Session::get('errors') as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-4 offset-4 rounded bg-info mt-3 py-3">
                <h2 class="text-center fw-bold" style="font-size: 20px">Tambah Data Produk</h2>
                <form class="mt-3" action="{{ route('postRequest') }}" method="POST">
                    @csrf
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Gambar Produk</label>
                        <input type="text" class="form-control" name="image" placeholder="Masukkan gambar produk">
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Nama Produk</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan nama produk">
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Berat</label>
                        <input type="number" class="form-control" name="weight" placeholder="Masukkan berat produk">
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Harga</label>
                        <input type="number" class="form-control" name="price" placeholder="Masukkan harga produk">
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Stok</label>
                        <input type="number" class="form-control" name="stock" placeholder="Masukkan stok produk">
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Kondisi</label>
                        <select class="form-select form-control" aria-label="Default select example" name="condition">
                            <option selected value="0">Pilih Kondisi Barang</option>
                            <option value="Bekas">Bekas</option>
                            <option value="Baru">Baru</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label fw-semibold">Deskripsi</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Tuliskan deskripsi produk yang akan dijual"></textarea>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-dark mx-auto" type="submit">Submit</button>
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
