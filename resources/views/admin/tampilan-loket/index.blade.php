@extends('admin.layouts.app')

@section('content')
  <div class="row">
    <div class="col d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header">
            <div class="mb-3 mb-sm-0">
                <h5 class="card-title fw-semibold">Tampilan Loket Antrian</h5>
            </div>
        </div>

        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="row">
                @foreach ($layanans as $layanan)
                    <div class="col-lg-4">                    
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Layanan : {{ $layanan->nm_layanan }}
                            </div>
                            <div class="card-body">
                                <h2 style="text-align: center">
                                    @if ($layanan->antrians)
                                        {{ $layanan->antrians->no_antrian }}
                                    @else
                                        Tidak Ada Antrian
                                    @endif
                                </h2>
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