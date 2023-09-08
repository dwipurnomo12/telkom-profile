@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-5" role="alert"> 
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($antrians->isNotEmpty())
                @foreach ($antrians as $antrian)
                <div class="card my-5">
                    <div class="card-header">
                        Detail Antrian
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="text-muted">Nama</p>
                                <h5>{{ $antrian->nm_lengkap }}</h5>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted">Nomor Antrian</p>
                                <h5>{{ $antrian->no_antrian }}</h5>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted">Layanan</p>
                                <h5>{{ $antrian->layanan->nm_layanan }}</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="text-muted">Alamat</p>
                                <h5>{{ $antrian->alamat }}</h5>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted">Tanggal Datang</p>
                                <h5> {{ date('d-m-Y', strtotime($antrian->tgl_datang)) }}</h5>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted">Aksi</p>
                                <div class="btn-group" role="group">
                    
                                <!-- Hapus antrian Antrian Yang Diambil User-->
                                <form id="{{ $antrian->id }}" action="/antrian/antrian-saya/{{ $antrian->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-icon-split mb-2 swal-confirm" data-form="{{ $antrian->id }}">
                                        <span class="icon text-white-100">
                                            <i class="bi bi-trash"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </button>
                                </form>
                    
                                <!-- Cetak antrian Antrian Yang Diambil User-->
                                <a class="btn btn-success btn-icon-split mb-2" href="/antrian/cetak-antrian/{{ $antrian->id }}" target="_blank" role="button">
                                    <span class="icon text-white-100">
                                        <i class="bi bi-printer"></i>
                                    </span>
                                    <span class="text">Cetak</span>
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>    
                @endforeach  
            @else
                <div class="alert alert-warning my-5" role="alert">
                    <h4 class="alert-heading">Ups !</h4>
                    <p>Anda belum punya antrian apapun !</p>
                    <hr>
                    <p class="mb-0">Kunjungi menu antrian untuk mendapatkan nomor antrian !</p>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".swal-confirm");

        buttons.forEach((button) => {
            button.addEventListener("click", function (e) {
                e.preventDefault();
                const formId = this.getAttribute("data-form");

                Swal.fire({
                    title: "Hapus antrian ini ?",
                    text: "Tindakan ini tidak dapat dibatalkan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(formId).submit();
                    }
                });
            });
        });
    });
</script>

@endsection