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
		<h2 class="mb-4">PDF Empleados</h2>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th scope="col">Clave</th>
					<th scope="col">Nombre</th>
					<th scope="col">Email</th>
					<th scope="col">Departamento</th>
					<th scope="col">Celular</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pdfempleado as $empleado)
				<tr>
					<td>{{$empleado->id_empleado}}</td>
					<td>{{$empleado -> apellido_pempleado . ' ' . $empleado->nombre_empleado}}</td>
					<td>{{$empleado->email_empleado}}</td>
					<td>{{$empleado->nombre_departamento}}</td>
					<td>{{$empleado->celular_empleado}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</body>
</html>