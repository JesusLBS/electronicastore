<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;



class UsersExport implements FromView,ShouldAutoSize
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('users.exportexcel',['users' => User::all()]);
        /*return view('users.exportexcel',['users' => User::withTrashed()->join('roles','roles.id_rol','=','users.id_rol')
                                                    ->select('users.id','users.name','users.email','users.celular','roles.rol','roles.id_rol')->get()]);*/
    }
}
