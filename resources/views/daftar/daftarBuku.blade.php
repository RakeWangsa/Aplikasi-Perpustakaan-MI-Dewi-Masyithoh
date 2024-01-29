@extends('layouts.main')

@section('container')
<div class="pagetitle mt-3">
   <div class="container">
      <div class="row align-items-center">
         <div class="col">
            <h1>Daftar Buku</h1>
         </div>
         <div class="col-auto">
            @if(isset($siswa))
            <form method="GET" action="{{ route('managementUserGuruSearch') }}">
            @else
            <form method="GET" action="{{ route('managementUserSiswaSearch') }}">
            @endif
               <div class="input-group">
                  <label class="col-form-label" style="padding-right: 10px;">Search :</label>
                  <input name="nama" type="text" class="form-control" @if(isset($search)) value="{{ $search }}" @endif>
                  <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
               </div>
            </form>
         </div>
         <div class="col-auto">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBuku"><i class="bi bi-plus-circle"></i> Tambah Buku</button>

<!-- Modal -->
<div class="modal fade" id="tambahBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form method="POST" action="{{ route('tambahBuku') }}" enctype="multipart/form-data">
            @csrf
         <div class="modal-body">

               <div class="mb-3">
                  <label for="nama_buku" class="form-label">Nama Buku:</label>
                  <input type="text" class="form-control" id="nama_buku" name="nama_buku" required>
               </div>

         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
         </div>
      </form>
      </div>
   </div>
</div>


         </div>
      </div>


 


      {{-- @if(isset($buku))
         <div class="d-flex justify-content-start">
            <a class="btn btn-primary mt-4" href="/registerGuru"><i class="bi bi-person-fill-add me-2"></i><span>Register Guru</span></a>
         </div>
     @endif --}}
   </div>
</div>

<style>
   .table-container {
     max-height: 500px;
     overflow-y: scroll;
   }
   
   table {
     width: 100%;
     border-collapse: collapse;
   }
   
   th, td {
     padding: 8px;
     text-align: left;
     border-bottom: 1px solid #ddd;
   }
   
   th {
     background-color: #c3c3c3;
     position: sticky;
     top: 0;
   }
   
   </style>


<div class="row">
      <div class="card col-md-12 mt-2 pb-4">
         <div class="card-body">
             <h5 class="card-title"></h5>
             <div class="table-container border">
             <table>
                <thead>
                   <tr>
                    <th scope="col" style="padding-right:50px">No</th>
                    <th scope="col" style="padding-right:200px">Nama</th>
                    <th scope="col">Action</th>
                   </tr>
                </thead>
                
                <tbody>
                  @php($no=1)
                  @if(count($buku) > 0)
                  @foreach($buku as $item)
                   <tr>
                      <td scope="row">{{ $no++ }}</td>
                      <td>{{ $item->nama }}</td>
                      <td>
                        <a class="btn btn-info" style="border-radius: 100px;" data-bs-toggle="modal" data-bs-target="#dataBuku{{ $item->id }}"><i class="bi bi-list-task text-white"></i></a>
                        <a class="btn btn-warning" style="border-radius: 100px;" data-bs-toggle="modal" data-bs-target="#editBuku{{ $item->id }}"><i class="bi bi-pencil-square text-white"></i></a>
                        <a class="btn btn-danger" style="border-radius: 100px;" onclick="return confirm('Apakah anda yakin?')" a href="{{ route('hapusBuku', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-trash"></i></a>
                     </td>

                      <!-- Modal Data -->
                      <div class="modal fade" id="dataBuku{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Daftar Buku "{{ $item->nama }}"</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                           <div class="modal-body">
                              <div class="row mb-4">
                                 <div class="col">
                                    <p><strong>Jumlah Buku: {{ $nomorBuku->where('id_buku', $item->id)->count() }}</strong></p>
                                 </div>
                                 <div class="col">
                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#tambahJumlah">
                                       <i class="bi bi-plus-circle text-white"></i> Tambah
                                     </button>
                                 </div>
                              </div>
                              
                     
                                 <div class="mb-3">
                                    <ul class="list-group">
                                       @foreach($nomorBuku as $data)
                                          @if($data->id_buku==$item->id)
                                             <li class="list-group-item">{{ $data->nomor_buku }}</li>
                                          @endif
                                       @endforeach
                                     </ul>
                                 </div>
                     
                           </div>

                          </div>
                        </div>
                      </div>



 
 <!-- Modal Tambah Jumlah Buku -->
 <div class="modal fade" id="tambahJumlah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jumlah Buku</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <form method="POST" action="{{ route('tambahJumlahBuku') }}" enctype="multipart/form-data">
         @csrf
      <div class="modal-body">

            <div class="mb-3">
               <label for="nama_buku" class="form-label">Nama Buku:</label>
               <input type="text" class="form-control" value="{{ $item->nama }}" readonly>
            </div>
            <div class="mb-3">
               <label for="nomor_buku" class="form-label">Nama Buku:</label>
               <input type="text" class="form-control" id="nomor_buku" required>
            </div>

      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   </form>
     </div>
   </div>
 </div>


                     
                      <!-- Modal Edit -->
 <div class="modal fade" id="editBuku{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Buku</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <form method="POST" action="{{ route('editBuku', ['id' => base64_encode($item->id)]) }}" enctype="multipart/form-data">
         @csrf
      <div class="modal-body">

            <div class="mb-3">
               <label for="nama" class="form-label">Nama Buku:</label>
               <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}" required>
            </div>

      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   </form>
     </div>
   </div>
 </div>

                   </tr>
                   @endforeach
                   @else
                   <tr>
                     <td colspan="6" class="text-center">Tidak ada user</td>
                   </tr>
                   @endif
                </tbody>
             </table>
            </div>
         </div>
      </div>


</div>
@endsection