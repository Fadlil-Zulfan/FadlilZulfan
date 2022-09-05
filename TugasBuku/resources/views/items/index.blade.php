<!doctype html>
@dd($items);
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  <div class="list-group">
 
  <a href="/" class="list-group-item list-group-item-action active" aria-current="true" style="width: 30%">Tabel Buku</a>
  <a href="/item-types" class="list-group-item list-group-item-action" style="width: 30%">Tabel Type Buku</a>

</div>
  <div class="row">
      <div class=col-2></div>
      <div class=col-8>
       
          <h1 style="align-items: center">Tabel Buku</h1>
          <div class="card">
        <table class="table">
            <tr>
                <th>Kode Buku.</th>
                <th>Jenis Buku</th>
                <th>Judul Buku</th>
                <th>Jumlah Buku </th>
                <th>Harga</th>
                <th>Jumlah Total</th>
                <th>Action</th>
            </tr>

            @foreach ($items as $no => $item)
            <tr>
                <td>{{$no + 1}}</td>
                <td>{{$item->jenis}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->qty}}</td>
                <td>@currency($item->price)</td>
                <td>@currency($item->qty * $item->price)</td>
                <td class="d-flex">
                  <a href="{{ route('edit', $item->id) }}" class="btn btn-info" >Ubah</a>
                  <br>
                  <form action="{{ route('destroy' , $item->id) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger" style="margin-left: 10px">Hapus</button>
                  </form>
                  
                </td>
            </tr>
            @endforeach
        </table>
      

      {{  $items->links() }}
    </div>
    <br>
      <a href="{{ route('create') }}" class="btn btn-success">+ Tambah Buku</a>

      </div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>