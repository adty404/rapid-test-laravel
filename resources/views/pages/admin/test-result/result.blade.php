<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5 style="margin-bottom: 20px">Hasil Rapid Test</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Nik</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Nomor HP</th>
				<th>Tempat dan Tanggal Lahir</th>
				<th>Alamat</th>
				<th>Hasil Test</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$patient_register->patient->nik}}</td>
				<td>{{$patient_register->patient->name}}</td>
				<td>{{$patient_register->patient->gender == 'L' ? 'Laki-laki' : 'Perempuan'}}</td>
				<td>{{$patient_register->patient->phone}}</td>
				<td>{{$patient_register->patient->birth_place . ', ' . $patient_register->patient->birth_date}}</td>
				<td>{{$patient_register->patient->address}}</td>
				<td>{{$patient_register->testResults->result}}</td>
			</tr>
		</tbody>
	</table>

</body>
</html>
