@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card my-5">
                    <div class="card-header">
                        <h3>Ambil Antrian untuk Layanan {{ $layanan->nm_layanan }}</h3>
                    </div>
                    @auth
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
    
                            <form method="POST" action="/antrian/daftar/{{ $layanan->slug }}">
                                @csrf

                                <input type="hidden" value="{{ $layanan->id }}" name="layanan_id">
                                <div class="mb-3">
                                    <label for="tgl_datang" class="form-label">Tanggal Kedatangan<span style="color: red">*</span></label>
                                    <input type="text" class="form-control datepicker" id="tgl_datang" name="tgl_datang" >
                                    @error('tgl_datang')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nm_lengkap" class="form-label">Nama Lengkap<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="nm_lengkap" name="nm_lengkap">
                                    @error('nm_lengkap')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">alamat <span style="color: red">*</span></label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="5"></textarea>
                                    @error('alamat')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 float-end">
                                    <a href="/" class="btn btn-light m-1">Kembali</a>
                                    <button type="submit" class="btn btn-primary m-1">Simpan</button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="alert alert-warning my-3" role="alert">
                                <h4 class="alert-heading">Ups !</h4>
                                <p>Sepertinya anda belum Login</p>
                                <hr>
                                <p class="mb-0">Login atau Register akun terlebih dahulu untuk mengambil antrian !</p>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    
    <script type="text/javascript">
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            daysOfWeekDisabled: [0,6]
        });
    </script>

@endsection