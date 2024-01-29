@extends('layouts.main')

@section('container')

@if(session('existingPinjaman'))
    <script>
        alert('Buku sudah dipinjam oleh {{ session('peminjam') }}');
    </script>
@endif

@if(session('tidakAdaPinjaman'))
    <script>
        alert('Anda tidak meminjam buku dengan nomor {{ session('nomor') }}');
    </script>
@endif

@if(session('tidakAdaNomor'))
    <script>
        alert('Buku dengan nomor {{ session('nomor') }} tidak tersedia');
    </script>
@endif

@if(session('existingNISN'))
    <script>
        alert('NISN {{ session('nisn') }} sudah terdaftar');
    </script>
@endif

<div class="pagetitle mt-3">
   <div class="container">
      <div class="row align-items-center">
         <div class="col">
            <h1>Daftar Siswa</h1>
         </div>
         <div class="col-auto">
            <form method="POST" action="{{ route('daftarSiswaSearch') }}">
               @csrf
               <div class="input-group">
                  <label class="col-form-label" style="padding-right: 10px;">Search :</label>
                  <input name="search" type="text" class="form-control" @if(isset($search)) value="{{ $search }}" @endif>
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
                        <input type="text" class="form-control" id="nisn" name="nisn" required>
                     </div>
                     <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                     </div>
                     <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas:</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" required>
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
                        <a class="btn btn-info" style="border-radius: 100px;" data-bs-toggle="modal" data-bs-target="#peminjaman{{ $item->id }}"><i class="bi bi-book text-white"></i></a>
                        <a class="btn btn-warning" style="border-radius: 100px;" data-bs-toggle="modal" data-bs-target="#editSiswa{{ $item->id }}"><i class="bi bi-pencil-square text-white"></i></a>
                        <a class="btn btn-danger" style="border-radius: 100px;" onclick="return confirm('Apakah anda yakin?')" a href="{{ route('hapusSiswa', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-trash"></i></a>
                     </td>

                      <!-- Modal Peminjaman -->
                      <div class="modal fade" id="peminjaman{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Daftar Pinjaman "{{ $item->nama }}"</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                           <div class="modal-body">
                              <div class="row mb-4">
                                 <div class="col-6">
                                    <p><strong>Jumlah Pinjaman: {{ $peminjaman->where('nisn', '===', $item->nisn)->count() }}</strong></p>
                                 </div>
                                 <div class="col-2">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPinjaman{{ $item->id }}">
                                       Pinjam
                                     </button>
                                 </div>
                                 <div class="col-4">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pengembalian{{ $item->id }}">
                                       Pengembalian
                                     </button>
                                 </div>
                              </div>
                              
                     
                                 <div class="mb-3">
                                    <ul class="list-group">
                                       <div class="row">


                                          <div class="col" style="margin-right:-25px">
                                             <li class="list-group-item"><strong>Nomor Buku</strong></li>
                                             @foreach($peminjaman as $data)
                                          @if($data->nisn===$item->nisn)
                                             <li class="list-group-item">{{ $data->nomor_buku }}</li>
                                          @endif
                                          @endforeach
                                          </div>

                                          <div class="col" style="margin-left:-25px">
                                             <li class="list-group-item"><strong>Nama Buku</strong></li>
                                             @foreach($peminjaman as $data)
                                             @if($data->nisn === $item->nisn)
                                                @php($idBukuData = $nomorBuku->where('nomor_buku','===', $data->nomor_buku)->first())
                                                @php($namaBukuData = $buku->where('id', $idBukuData->id_buku)->first())
                                                <li class="list-group-item">{{ $namaBukuData ? $namaBukuData->nama : 'Not Found' }}</li>
                                             @endif
                                          @endforeach
                                          
                                          </div>

                                    </div>
                                     </ul>
                                 </div>
                     
                           </div>

                          </div>
                        </div>
                      </div>

 
                       <!-- Modal Tambah Pinjaman -->
 <div class="modal fade" id="tambahPinjaman{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pinjaman "{{ $item->nama }}"</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <form method="POST" action="{{ route('tambahPinjaman', ['id' => base64_encode($item->id)]) }}" enctype="multipart/form-data">
         @csrf
      <div class="modal-body">

         <div class="mb-3" style="display:none">
            <label for="nisn" class="form-label">NISN:</label>
            <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $item->nisn }}" readonly>
         </div>
            <div class="mb-3">
               <label for="nomor_buku" class="form-label">Nomor Buku:</label>
               <input type="text" class="form-control" id="nomor_buku" name="nomor_buku" required>
            </div>

      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   </form>
     </div>
   </div>
 </div>

                        <!-- Modal Pengembalian -->
                        <div class="modal fade" id="pengembalian{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <h1 class="modal-title fs-5" id="exampleModalLabel">Pengembalian "{{ $item->nama }}"</h1>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <form method="POST" action="{{ route('pengembalian', ['id' => base64_encode($item->id)]) }}" enctype="multipart/form-data">
                                 @csrf
                              <div class="modal-body">
                        
                                 <div class="mb-3" style="display:none">
                                    <label for="nisn" class="form-label">NISN:</label>
                                    <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $item->nisn }}" readonly>
                                 </div>
                                    <div class="mb-3">
                                       <label for="nomor_buku" class="form-label">Nomor Buku:</label>
                                       <input type="text" class="form-control" id="nomor_buku" name="nomor_buku" required>
                                    </div>
                        
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                           </form>
                             </div>
                           </div>
                         </div>


 <!-- Modal Edit Siswa -->
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