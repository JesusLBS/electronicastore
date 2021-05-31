<?php

namespace App\Imports;

use App\Models\empleados;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class EmpleadosImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       return new empleados([
            'nombre_empleado' => $row['Nombre'],
            'apellido_pempleado' => $row['Apellidop'],
            'apellido_mempleado' => $row['Apellidom'],
            'celular_empleado' => $row['Celular'],
            'email_empleado' => $row['Email'],
            'calle_empleado' => $row['Calle'],
            'codigo_postalempleado' => $row['CodigoPostal'],
            'sexo_empleado' => $row['Sexo'],
            'id_tipo_empleado' => $row['TipoEmpleado'],
            'id_departamento' => $row['ClaveDepartamento'],
            'id_municipio' => $row['ClaveMunicipio'],
            'id_estado' => $row['ClaveEstado'],
            'contratopdf' => ('Sin contrato'),
            /*
            'nombre_empleado' => ('Juanito'),
            'apellido_pempleado' => ('Apellidop'),
            'apellido_mempleado' => ('Apellidom'),
            'celular_empleado' => ('Celular'),
            'email_empleado' => ('Email'),
            'calle_empleado' => ('Calle'),
            'sexo_empleado' => ('Sexo'),
            'codigo_postalempleado' => ('55760'),
            'id_tipo_empleado' => ('1'),
            'id_municipio' => ('1'),
            'id_estado' => ('2'),
            'contratopdf' => ('Sin contrato'),*/
            ]);
    }
}