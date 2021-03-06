<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DATATABLE;

class UserController extends Controller
{
    public function json(Request $request)
    {
        $data = User::with('roles:id,name')->select(['id','name','email','created_at']);
        return DATATABLE::of($data)
        ->editColumn('created_at', function ($data) {
            return $data->created_at ? with(new Carbon($data->created_at))->format('d/m/Y') : '';
        })
        ->addColumn('action',function($data){
            $url_show = url('users/'.$data->id);
            $url_edit = url('users/'. $data->id .'/edit');
            $url_delete = url('users/'.$data->id.'/delete');

            $b1 = '<div class="btn-group"><button type="button" class="btn bg-gradient-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></button><ul class="dropdown-menu">
            <li><a class="dropdown-item" href="">Lihat</a></li>
            <li><a class="dropdown-item" href="">Edit</a></li>
            <li><a style="color:red" class="dropdown-item" href="">Hapus</a></li>
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
