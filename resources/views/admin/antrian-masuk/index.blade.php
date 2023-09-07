@extends('admin.layouts.app')

@section('content')
  <div class="row">
    <div class="col d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header">
            <div class="mb-3 mb-sm-0">
                <h5 class="card-title fw-semibold">Antrian Masuk {{ $layanan->nm_layanan }}</h5>
                <a href="/layanan/create" class="btn btn-primary">Tambah Layanan</a>
            </div>
        </div>

        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table id="table_id" class="table display table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Antrian</th>
                            <th>Tgl. Kedatangan</th>
                            <th>Nama</th>
                            <th>alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($layanan->antrian as $list)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $list->no_antrian }}</td>
                                <td>{{ $list->tgl_datang }}</td>
                                <td>{{ $list->nm_lengkap }}</td>
                                <td>{{ $list->alamat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        });
    </script>
@endsection