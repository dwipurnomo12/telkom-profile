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
            <div class="row">
                @foreach ($layanans as $layanan)
                    <div class="col-lg-4">                    
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Layanan : {{ $layanan->nm_layanan }}
                            </div>
                            <div class="card-body">
                                <h2 style="text-align: center">
                                    <span id="layanan-{{ $layanan->id }}"></span>
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

  <script>
    function fetchAntrian(layananId){
        $.ajax({
            url: '/tampilan-loket/get-antrian',
            type: 'GET',
            data: {layanan_id: layananId},
            success: function (data){
                if(data.antrian){
                    $('#layanan-' + layananId).text(data.antrian.no_antrian);
                } else {
                    $('#layanan-' + layananId).text('Tidak Ada Antrian')
                }
            }, 
        });
    }

    setInterval(function () {
        @foreach ($layanans as $layanan)
            fetchAntrian({{ $layanan->id }});
        @endforeach
    }, 5000);   
  </script>
@endsection