<table>
    <thead>
    <tr>
        <th style="font-size: 12px; font-weight: bold; text-aling: center;">Clave</th>
        <th>Nombre</th>
        <th>Apellidop</th>
        <th>Apellidom</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Sexo</th>
        <th>UrlEmail</th>
    </tr>
    </thead>
    <tbody>
    @foreach($empleados as $empleados)
        <tr>
            <th>{{$empleados->id_empleado}}</th>
            <th>{{$empleados->nombre_empleado}}</th>
            <th>{{$empleados->apellido_pempleado}}</th>
            <th>{{$empleados->apellido_mempleado}}</th>
            <th>{{$empleados->celular_empleado}}</th>
            <th>{{$empleados->email_empleado}}</th>
            <th>{{$empleados->sexo_empleado}}</th>
            <th><a href="mailto: {{$empleados->email_empleado}}">{{$empleados->email_empleado}}</a></th>
        </tr>
    @endforeach 
    </tbody>
</table>











