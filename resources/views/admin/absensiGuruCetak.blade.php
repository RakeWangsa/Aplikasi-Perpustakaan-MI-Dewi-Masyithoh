<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absensi Guru ({{ $tahunAjaran }})</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    
    {{-- <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <div class="card shadow w-100 responsive" style="margin: top 10px;">
      <div class="card-body" style="margin: top 10px;"> --}}
        
        <style type="text/css">
            @media print {
                @page {
                    size: landscape;
                }
            }

            table.tableizer-table {
                font-size: 12px;
                border: 1px solid #CCC; 
                font-family: Arial, Helvetica, sans-serif;
            } 
            .tableizer-table td {
                padding: 4px;
                margin: 3px;
                border: 1px solid #CCC;
            }
            .tableizer-table th {
                background-color: #104E8B; 
                color: #FFF;
                font-weight: bold;
                color: black;
            }
            .page-break {
              page-break-after: always;
            }
        </style>

@foreach($month as $i)
<div class="mt-2 mb-4">
  <h5 class="text-center mt-4">SMAN 12 TANGERANG SELATAN</h5>
    <h5 class="text-center">Absensi Guru</h5>
    <h5 class="text-center mb-4">Tahun Ajaran {{ $tahunAjaran }}</h5>

</div>
                 <div class="row align-items-center mb-2">
                    <div class="col">
                       <h5 class="card-title">Bulan : {{ $i }}</h5>
                    </div>
                    <div class="col text-right">
                       {{-- <button id="excel{{ $nomer++ }}" class="btn btn-primary" style="float: right;"><span class="bi bi-download"></span> Download {{ date('Y-m-d', strtotime($items->waktu)) }}</button> --}}
                    </div>
                 </div>
                 {{-- <div class="row">
                 <h5 class="card-title">Tanggal : {{ date('Y-m-d', strtotime($items->waktu)) }}</h5>
                 <button id="excels" class="btn btn-primary"><span class="bi bi-download"></span> Download Excel</button>
                 </div> --}}
                  <div>
                  <table class="table table-bordered" style="border-color:black">
                     <thead>
                        <tr>
                         <th scope="col" class="text-center px-4">No</th>
                         <th scope="col" class="text-center px-4">Nama</th>
                         <th scope="col" class="text-center px-4">Jumlah Kehadiran</th>
                        </tr>
                     </thead>
                     
                     <tbody>
                       
                      @php($no=1)
                      @if(count($guru) > 0)
                      @foreach($guru as $item)               
                      {{-- @php($user = \App\Models\User::where('id', $item->id_siswa)->get()) --}}
                      @php($absensiGuru = \App\Models\Agenda::where('guru', $item->name)->where('kehadiran', 'hadir')->where('tahun_ajaran', $tahunAjaran)->whereMonth('tanggal', $i)->get())
                      @php($countAbsensiGuru = $absensiGuru->count())
                       <tr>
                          <td scope="row" class="text-center">{{ $no++ }}</td>
                          {{-- <td class="text-center">{{ $user[0]->nomor }}</td> --}}
                          <td class="text-center">{{ $item->name }}</td>
                          <td class="text-center">{{ $countAbsensiGuru }}</td>
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
                 <div class="row page-break">
                  <div class="col">
                  <div style="float: right;">
                    <p class="mt-2 pb-4">Kepala Sekolah</p>
                    <p style="margin-top: 75px">Rakev Tionardi</p>
                    <p style="margin-top: -10px">NIP. 24060120130118</p>
                 </div>
                 </div>
                </div>
@endforeach
        
        


      
      


      {{-- </div>
    </div>
  </div> --}}
  <script type="text/javascript">
    window.print();
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>