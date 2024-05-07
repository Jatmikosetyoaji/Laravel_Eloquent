<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    <div class="mx-lg-5 mt-lg-4 mb-lg-3">
    <div class="mrounded bg-info pt-3 pb-3" >
        <div class="d-flex  justify-content-around">
            <div>
                <h3 class="fw-bold mt-2"> List Product</h3>
            </div>
            <div>
                <a  href=""  class="btn btn-lg btn-success mx-auto"> Lihat Profil</a>
                <a  href="{{route('get_form')}}"  class="btn btn-lg btn-dark mx-auto"> Tambah Produk</a>
                <a  href=" {{route('product_form')}}"  class="btn btn-lg btn-dark mx-auto"> Kembali ke Produk</a>
            </div>
        
        </div>
                <table class="table table-striped pt-3 pb-3"  style="margin: 20px;">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Berat</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kondisi</th>
                        <th>Action</th>
                        
                    </tr>
                    </thead>
                    @foreach ($products as $item)
                    <tbody>
                        <tr>
                        <th  scope="row">{{ $loop->iteration }}</th>
                        <td scope="col">{{ $item->Nama }}</td>
                        <td scope="col">{{ $item->Stok }}</td>
                        <td scope="col">{{ $item->Berat }}</td>
                        <td scope="col"> Rp. {{  number_format($item->Harga, 0, ',', '.') }}</td>
                        <td scope="col">
                            @if ($item->Kondisi == 'Baru')
                                 <span class="my-auto rounded py-1 bg-warning px-2 fw-semibold">{{ $item->Kondisi }}</span>
                            @elseif ($item->Kondisi == 'Bekas')
                                <span class="my-auto rounded py-1 bg-info px-2 fw-semibold">{{ $item->Kondisi }}</span>
                                @endif
                        </td>
                        <td scope="col">
                            <a href="{{ route('posts.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('posts.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </th>
                        </tr>
                    </tbody>
                    @endforeach
    </div>
    </div>
    </main>
</body>
</html>