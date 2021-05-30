<table>
    <thead>
    <tr>
        <th style="font-size: 12px; font-weight: bold; text-aling: center;">Clave</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Celular</th>
        <th>Rol</th>
        <th>UrlEmail</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $users)
        <tr>
            <th>{{$users->id}}</th>
            <th>{{$users->name}}</th>
            <th>{{$users->email}}</th>
            <th>{{$users->celular}}</th>
            <th>{{$users->id_rol}}</th>
            <th><a href="mailto: {{$users->email}}">{{$users->email}}</a></th>
        </tr>
    @endforeach 
    </tbody>
</table>




