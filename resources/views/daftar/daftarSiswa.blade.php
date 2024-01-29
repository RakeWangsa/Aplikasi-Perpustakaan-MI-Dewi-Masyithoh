@extends('layouts.main')

@section('container')
<div class="pagetitle mt-3">
   <div class="container">
      <div class="row align-items-center">
         <div class="col">
            <h1>Daftar Siswa</h1>
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
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSiswa"><i class="bi bi-person-plus-fill"></i> Tambah Siswa</button>
         </div>
      </div>
      
      <div class="modal fade" id="tambahSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Siswa</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form method="POST" action="{{ route('tambahSiswa') }}" enctype="multipart/form-data">
                  @csrf
               <div class="modal-body">
      
                     <div class="mb-3">
                        <label for="nisn" class="form-label">NISN:</label>
                        <input type="text" class="form-control" id="nisn" name="nisn">
                     </div>
                     <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                     </div>
                     <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas:</label>
                        <input type="text" class="form-control" id="kelas" name="kelas">
                     </div>
      
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </form>
            </div>
         </div>
      </div>

      {{-- @if(isset($siswa))
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
                    <th scope="col">No</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Action</th>
                   </tr>
                </thead>
                
                <tbody>
                  @php($no=1)
                  @if(count($siswa) > 0)
                  @foreach($siswa as $item)
                   <tr>
                      <td scope="row">{{ $no++ }}</td>
                      <td>{{ $item->nisn }}</td>
                      <td>{{ $item->nama }}</td>
                      <td>{{ $item->kelas }}</td>
                      <td>
                        <a class="btn btn-info" style="border-radius: 100px;" a href="{{ route('editUser', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-book text-white"></i></a>
                        <a class="btn btn-warning" style="border-radius: 100px;" data-bs-toggle="modal" data-bs-target="#editSiswa{{ $item->id }}"><i class="bi bi-pencil-square text-white"></i></a>
                        <a class="btn btn-danger" style="border-radius: 100px;" onclick="return confirm('Apakah anda yakin?')" a href="{{ route('hapusSiswa', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-trash"></i></a>
                     </td>


 
 <!-- Modal -->
 <div class="modal fade" id="editSiswa{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Siswa</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <form method="POST" action="{{ route('editSiswa', ['id' => base64_encode($item->id)]) }}" enctype="multipart/form-data">
         @csrf
      <div class="modal-body">

            <div class="mb-3">
               <label for="nisn" class="form-label">NISN:</label>
               <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $item->nisn }}" readonly>
            </div>
            <div class="mb-3">
               <label for="nama" class="form-label">Nama:</label>
               <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}" required>
            </div>
            <div class="mb-3">
               <label for="kelas" class="form-label">Kelas:</label>
               <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $item->kelas }}" required>
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
                     <td colspan="6" class="text-center">Tidak ada data</td>
                   </tr>
                   @endif
                </tbody>
             </table>
            </div>
         </div>
      </div>


</div>
@endsection