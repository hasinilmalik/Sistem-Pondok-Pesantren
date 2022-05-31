<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DATATABLE;

class UserController extends Controller
{
    public function json(Request $request)
    {
        $data = User::with('student')->has('student')->where('id','5',6)
        ->select(['id','email','created_at','name']);
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
    public function index()
    {
        return view('users.index');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('users');
    }
}
