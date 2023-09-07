@extends('admin.layouts.app')

@section('content')
  <div class="row mt-4">
    <div class="col-lg-10 mx-auto">
      <div class="card w-100">
        <div class="card-header">
            <div class="mb-3 mb-sm-0">
                <h5 class="card-title fw-semibold">Tambah Layanan Baru</h5>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="/layanan">
                @csrf
                <div class="mb-3">
                    <label for="nm_layanan" class="form-label">Nama Layanan <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="nm_layanan" name="nm_layanan">
                    @error('nm_layanan')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="slug" name="slug">
                    @error('slug')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kd_layanan" class="form-label">Kode Layanan <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="kd_layanan" name="kd_layanan">
                    @error('kd_layanan')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="batas_antrian" class="form-label">Batas Antrian <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="batas_antrian" name="batas_antrian">
                    @error('batas_antrian')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi <span style="color: red">*</span></label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10"></textarea>
                    @error('deskripsi')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3 float-end">
                    <a href="/layanan" class="btn btn-light m-1">Kembali</a>
                    <button type="submit" class="btn btn-primary m-1">Simpan</button>
                </div>
            </form>
            
        </div>
      </div>
    </div>
  </div>
  
  <script>
    const nm_layanan    = document.querySelector('#nm_layanan');
    const slug          = document.querySelector('#slug');

    nm_layanan.addEventListener('change', function(){
        fetch('/layanan/slug?nm_layanan=' + nm_layanan.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
  </script>

@endsection