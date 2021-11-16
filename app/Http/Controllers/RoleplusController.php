<?php

namespace App\Http\Controllers;

use App\Models\Roleplus;
use Illuminate\Http\Request;

class RoleplusController extends Controller
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
    public function create(Request $request)
    {
        $rolepluses = Roleplus::create([
            'roleplus' => $request->rolepluses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roleplus  $roleplus
     * @return \Illuminate\Http\Response
     */
    public function show(Roleplus $roleplus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roleplus  $roleplus
     * @return \Illuminate\Http\Response
     */
    public function edit(Roleplus $roleplus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roleplus  $roleplus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roleplus $roleplus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roleplus  $roleplus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roleplus $roleplus)
    {
        //
    }
}
