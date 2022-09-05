@extends('layouts.admin')
@section('content')
@push('style')
<!-- Custom styles for this page -->
<link href="{{asset("assets/vendor/datatables/dataTables.bootstrap4.min.css")}} "rel="stylesheet">
@endpush
    <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800">Items</h1>


 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between align-items-center">
         <h6 class="m-0 font-weight-bold text-primary">Tabel Buku</h6>
        <a href="{{route("create")}}"class="btn btn-success fa-pull-right">Tambah Buku</a>

     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                        <th>Kode Buku.</th>
                        <th>Jenis Buku</th>
                        <th>Judul Buku</th>
                        <th>Jumlah Buku </th>
                        <th>Harga</th>
                        <th>Jumlah Total</th>
                        <th>Action</th>
                        <tbody>
                         @foreach ($items as $no => $item)
                         <tr>
                             <td>{{$no + 1}}</td>
                             <td>{{$item->jenis}}</td>
                             <td>{{$item->name}}</td>
                             <td>{{$item->qty}}</td>
                             <td>@currency($item->price)</td>
                             <td>@currency($item->qty * $item->price)</td>
                             <td class="d-flex"> 
                               <a href="{{ route('edit', $item->id) }}" class="btn btn-success mr-2">Ubah</a>
                               
                               <form action="{{ route('destroy' , $item->id) }}" method="post">
                                 @csrf
                                 @method("DELETE")
                                 <button type="submit" class="btn btn-danger">Hapus</button>
                               </form>
                               
                             </td>
                         </tr>
                         @endforeach
                        </tbody>
                     
                   
                     </tr>
                    </table>
                 
        
         </div>
     </div>
 </div>
@endsection
@push('script')
        <!-- Page level plugins -->
<script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
@endpush