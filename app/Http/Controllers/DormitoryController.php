<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredormitoryRequest;
use App\Http\Requests\UpdatedormitoryRequest;
use App\Models\dormitory;

class DormitoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredormitoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredormitoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function show(dormitory $dormitory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function edit(dormitory $dormitory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedormitoryRequest  $request
     * @param  \App\Models\dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedormitoryRequest $request, dormitory $dormitory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dormitory  $dormitory
     * @return \Illuminate\Http\Response
     */
    public function destroy(dormitory $dormitory)
    {
        //
    }
}
