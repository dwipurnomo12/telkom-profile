@extends('admin.layouts.app')

<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: center;
      padding: 30px;
    }
    
  
    </style>

@section('content')
  <div class="row">
    <div class="col d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header">
            <div class="mb-3 mb-sm-0">
                <h5 class="card-title fw-semibold">Antrian Masuk Layanan :  {{ $layanan->nm_layanan }}</h5>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr class="bg-primary text-white" style="text-align: center">
                        <th>No Antrian</th>
                        <th>Tgl. Kedatangan</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pemanggilan</th>
                    </tr>
                    @php
                        use Illuminate\Support\Carbon;
                        $list = $layanan->antrians()
                                ->whereDate('tgl_datang', Carbon::now()->setTimezone('Asia/Jakarta'))
                                ->orderBy('created_at', 'asc')
                                ->first();
                     @endphp
                    @if($list)
                        <tr>
                            <td>{{ $list->no_antrian }}</td>
                            <td>{{ date('d-m-Y', strtotime($list->tgl_datang)) }}</td>
                            <td>{{ $list->nm_lengkap }}</td>
                            <td>{{ $list->alamat }}</td>
                            <td>
                                <form id="{{ $list->id }}" method="POST" action="/antrian-masuk/{{ $list->id }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-success m-1">Ada</button>
                                </form>

                                <form id="{{ $list->id }}" method="POST" action="/antrian-masuk/{{ $list->id}}/lewati" class="d-inline">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-danger m-1">Lewati</button>
                                </form>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="4">Tidak ada antrian saat ini.</td>
                        </tr>
                    @endif                     
                </table>
            </div>
            
                        
        </div>
      </div>
    </div>
  </div>

@endsection