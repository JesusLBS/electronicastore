<?php

namespace App\Exports;

use App\Models\empleados;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;



class EmpleadosExport implements FromView,ShouldAutoSize
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
         return view('empleado.exportexcel',['empleados' => empleados::all()]);
    }
}
