<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekap Agenda Kelas {{ $cetak }} ({{ $tahunAjaran }})</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    

        <div class="mt-2 mb-4">
          <h5 class="text-center mt-4">SMAN 12 TANGERANG SELATAN</h5>
          <h5 class="text-center">Agenda Kelas</h5>
          <h5 class="text-center mb-4">Tahun Ajaran {{ $tahunAjaran }}</h5>

        </div>
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
        @foreach($tanggal as $itemss)
        
        @foreach($kelas as $items)

                 <div class="row align-items-center mb-1">
                    <div class="col">
                       <h5 class="card-title">{{ $items->kelas }} ({{ date('Y-m-d', strtotime($itemss->tanggal)) }})</h5>
                    </div>
                    <div class="col text-right">
                      
                    </div>
                 </div>
                  <div>
                  <table class="table table-bordered" style="border-color:black">
                     <thead>
                        <tr>
                         {{-- <th scope="col" class="text-center px-4">No</th> --}}
                         <th scope="col" class="text-center px-4">Jam Ke-</th>
                         <th scope="col" class="text-center px-4">Nama Guru</th>
                         <th scope="col" class="text-center px-4">Mata Pelajaran</th>
                         <th scope="col" class="text-center px-4">Pokok Bahasan</th>
                         <th scope="col" class="text-center px-4">Tugas/Pengayaan</th>
                         <th scope="col" class="text-center px-4">Kehadiran</th>
                        </tr>
                     </thead>
                     
                     <tbody>
                       @php($agenda = \App\Models\Agenda::whereDate('tanggal', $itemss->tanggal)->where('kelas', $items->kelas)->get())
                       {{-- @php($no=1) --}}
                       @if(count($agenda) > 0)
                       @foreach($agenda as $item)               
                        <tr>
                           {{-- <td scope="row" class="text-center">{{ $no++ }}</td> --}}
                           <td class="text-center">{{ $item->jam }}</td>
                           <td class="text-center">{{ $item->guru }}</td>
                           <td class="text-center">{{ $item->pelajaran }}</td>
                           <td class="text-center">{{ $item->bahasan }}</td>
                           <td class="text-center">{{ $item->tugas }}</td>
                           <td class="text-center">{{ $item->kehadiran }}</td>
                        </tr>
                        @endforeach
                        
                        @else
                        <tr>
                          <td colspan="6" class="text-center">Tidak ada agenda</td>
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
                {{-- lanjut page berikutnya --}}
                 
        @endforeach
        @endforeach
        

  <script type="text/javascript">
    window.print();
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>