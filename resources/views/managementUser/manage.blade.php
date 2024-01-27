@extends('layouts.main')

@section('container')
<div class="pagetitle mt-3">
   <div class="container">
      <div class="row align-items-center">
         <div class="col">
            <h1>Management User</h1>
         </div>
         <div class="col-auto">
            @if(isset($guru))
            <form class="mt-4" method="GET" action="{{ route('managementUserGuruSearch') }}">
            @else
            <form class="mt-4" method="GET" action="{{ route('managementUserSiswaSearch') }}">
            @endif
               <div class="input-group">
                 <label class="col-form-label" style="padding-right: 10px;">Search :</label>
                 <input name="nama" type="text" class="form-control" @if(isset($search)) value="{{ $search }}" @endif>
                 <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
               </div>
            </form>
         </div>
      </div>
      @if(isset($guru))
         <div class="d-flex justify-content-start">
            <a class="btn btn-primary mt-4" href="/registerGuru"><i class="bi bi-person-fill-add me-2"></i><span>Register Guru</span></a>
         </div>
     @endif
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
   @if(isset($guru))
      <div class="card col-md-12 mt-2 pb-4">
         <div class="card-body">
             <h5 class="card-title">Daftar Guru</h5>
             <div class="table-container border">
             <table>
                <thead>
                   <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                   </tr>
                </thead>
                
                <tbody>
                  @php($no=1)
                  @if(count($guru) > 0)
                  @foreach($guru as $item)
                   <tr>
                      <td scope="row">{{ $no++ }}</td>
                      <td>{{ $item->nomor }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->email }}</td>
                      <td>
                        <a class="btn btn-warning" style="border-radius: 100px;" a href="{{ route('editUser', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-pencil-square text-white"></i></a>
                        <a class="btn btn-danger" style="border-radius: 100px;" onclick="return confirm('Apakah anda yakin?')" a href="{{ route('hapusUser', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-trash"></i></a>
                     </td>
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

      @else
      <div class="card col-md-12 mt-2 pb-4">
        <div class="card-body">
            <h5 class="card-title">Daftar Siswa</h5>
            <div class="table-container border">
            <table>
               <thead>
                  <tr>
                     <th scope="col">No</th>
                     <th scope="col">NISN</th>
                     <th scope="col">Nama</th>
                     <th scope="col">Email</th>
                     <th scope="col">Action</th>
                     
                  </tr>
               </thead>
               
               <tbody>
                 @php($no=1)
                 @if(count($siswa) > 0)
                 @foreach($siswa as $item)
                  <tr>
                     <td scope="row">{{ $no++ }}</td>
                     <td>{{ $item->nomor }}</td>
                     <td>{{ $item->name }}</td>
                     <td>{{ $item->email }}</td>
                     <td>
                        <a class="btn btn-warning" style="border-radius: 100px;" a href="{{ route('editUser', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-pencil-square text-white"></i></a>
                        <a class="btn btn-danger" style="border-radius: 100px;" onclick="return confirm('Apakah anda yakin?')" a href="{{ route('hapusUser', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-trash"></i></a>
                     </td>
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
     @endif
</div>
@endsection