<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DATATABLE;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::with('student')->select(['id', 'nama', 'created_at','email'])->where('status', $status);
        return DATATABLE::of($data)
        ->addColumn('action',function($data){
            $url_show = url('users/'.$data->id);
            $url_edit = url('users/'. $data->id .'/edit');
            $url_delete = url('users/'.$data->id.'/delete');

            $b1 = '<div class="btn-group"><button type="button" class="btn bg-gradient-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></button><ul class="dropdown-menu">
            <li><a class="dropdown-item" href="'.$url_show.'">Lihat</a></li>
            <li><a class="dropdown-item" href="'.$url_edit.'">Edit</a></li>
            <li><a style="color:red" class="dropdown-item" href="'.$url_delete.'">Hapus</a></li>
            <li><hr class="dropdown-divider"></li>';

            return $b1;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
