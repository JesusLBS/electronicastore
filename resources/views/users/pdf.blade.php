<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Pdf</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style type="text/css"></style>
</head>
<body>
	<div class="container">
		<h2 class="mb-4">PDF Alumnos</h2>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th scope="col">Clave</th>
					<th scope="col">Nombre</th>
					<th scope="col">Email</th>
					<th scope="col">Celular</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pdfuser as $usuario)
				<tr>
					<td>{{$usuario->id}}</td>
					<td>{{$usuario->name}}</td>
					<td>{{$usuario->email}}</td>
					<td>{{$usuario->celular}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</body>
</html>