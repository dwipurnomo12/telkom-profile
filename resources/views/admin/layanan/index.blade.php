@extends('admin.layouts.app')

@section('content')
  <div class="row">
    <div class="col d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header">
            <div class="mb-3 mb-sm-0">
                <h5 class="card-title fw-semibold">Daftar Layanan</h5>
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
                            <th>Kode Layanan</th>
                            <th>Nama Layanan</th>
                            <th>Batas Antrian</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($layanans as $layanan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $layanan->kd_layanan }}</td>
                                <td>{{ $layanan->nm_layanan }}</td>
                                <td>{{ $layanan->batas_antrian }}</td>
                                <td>{{ $layanan->deskripsi }}</td>
                                <td>
                                    <a href="/layanan/{{ $layanan->id }}/edit" class="btn btn-sm btn-warning my-1"><box-icon type='solid' name='edit'></box-icon></a>
                                    <form id="{{ $layanan->id }}" action="/layanan/{{ $layanan->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <div class="btn btn-sm btn-danger my-1 swal-confirm" data-form="{{ $layanan->id }}"><box-icon name='trash-alt' color='#ffffff' ></box-icon></div>
                                    </form>
                                </td>
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