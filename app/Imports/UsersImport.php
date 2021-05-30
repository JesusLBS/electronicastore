<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       return new User([
        
                'name' => $row['Nombre'],
                'email' => $row['Email'],
                'celular' => $row['Celular'],
                'aceptotc_c' => $row['Condiciones'],
                'activo' => $row['Activo'],
                'id_rol' => $row['Rol'],
                //'password' => \Hash::make($row['Password']),
                'password' => $row['Password'],
                /*
                'name' => ('Adasdas'),
                'email' => ('dooooooo@gmail.com'),
                'celular' => ('5536386869'),
                'aceptotc_c' => ('0'),
                'activo' => ('0'),
                'id_rol' => ('2'),
                'password' =>('123'),*/
            ]);
    }
}