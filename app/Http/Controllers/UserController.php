<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;

class UserController extends Controller
{
    public function coba1(UsersDataTable $dataTable)
    {
        return $dataTable->render('coba');
    }
}
