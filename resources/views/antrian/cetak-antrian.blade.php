<!DOCTYPE html>
<html>
<head>
	<title>Plaza Telkom Group</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
		}

		h1 {
			font-size: 20px;
			margin-bottom: 7px;
            text-align: center;
			margin-top: 20px;
		}

		h2 {
			font-size: 16px;
			margin-bottom: 5px;
		}

		p{
            text-align: center;
        }

		.container {
			border: 2px solid #ccc;
			padding: 20px;
			width: 400px;
			margin: 0 auto;
		}

		.logo{
			float: left;
			width: 50px;
			height: 50px;
			margin-top: 20px;
		}

		.header {
			text-align: center;
			margin-bottom: 25px;
			margin-right: 30px;
			padding-left: 50px;
		}

		.row {
			display: flex;
			margin-bottom: 10px;
		}
		.col-6 {
			flex: 0 0 50%;
			max-width: 50%;
		}
		.label {
			font-weight: bold;
			flex: 0 0 30%;
			max-width: 30%;
		}
		.nomor-antrian {
			font-size: 50px;
			font-weight: bold;
			margin-top: 20px;
			margin-bottom: 20px;
			text-align: center;
            border: 2px solid black;
            padding: 50px 0 50px 0;
		}


	</style>
</head>
<body>
	<div class="container">
		<div class="logo">
			<img src="data:image/png;base64,{{ $logo }}" alt="Logo Instansi" style="width:100px" height="100px">
		</div>
		<div class="header">
			<h1>Antrian Kunjungan Plaza Telkom</h1>
			<p style="margin-left: 50px">Jl. Dr. Sutomo No.67, Kepatihan, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68411</p>
		</div>
		
        <hr>
		<h3 style="text-align: center">Nomor Antrian</h3>
		<div class="nomor-antrian">
            {{ $cetakAntrian->no_antrian }}
        </div>
        <h3 style="text-align: center">Tanggal Kedatangan : {{ date('d-m-Y', strtotime($cetakAntrian->tgl_datang)) }}</h3>
		<hr>
			<p>Harap Datang Pada Tanggal yang Sudah Dipilih</p>
		</div>
	</div>
</body>
</html>