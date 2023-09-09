@extends('admin.layouts.app')

@section('content')
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Dashboard
          </div>
          <div class="card-body">
            <div class="row">
              @foreach ($layanans as $layanan)
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-header bg-primary text-white">
                        {{ $layanan->nm_layanan }}
                      </div>
                      <div class="card-body">
                        <h4>Antrian masuk : {{ $layanan->antrians }}</h4>
                      </div>
                    </div>
                  </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection