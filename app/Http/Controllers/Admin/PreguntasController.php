<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Preguntas;
use Illuminate\Http\Request;

class PreguntasController extends Controller
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
        return redirect('Admin.Forms.edit',  compact('formularios'));
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
     * @param  \App\Models\Preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function show(Preguntas $preguntas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function edit(Preguntas $preguntas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preguntas $preguntas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preguntas $preguntas)
    {
        //
    }
}
