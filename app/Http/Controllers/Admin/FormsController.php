<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\formulario;
use App\Models\preguntas;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $formularios = formulario::all();
        return view('Admin.Forms.index', compact('formularios'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
            'descripcion' => 'required',
            'slug' => 'required|unique:formularios'
        ]); 

        $formulario = new formulario();
        $formulario->descripcion = $request->descripcion;
        $formulario->slug = $request->slug;
        $formulario->save();
        return response()->json($formulario);
        //  return redirect()->route('Admin.Forms.edit', $formulario)->with('info',  'El formulario se ha creado con exito');
        // return  ($formulario);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function show(formulario $formulario)
    {
        
        return view('Admin.Forms.show', compact('formulario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function edit(formulario $formulario)
    {
        return view('Admin.Forms.edit', compact('formulario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, formulario $formulario)
    {
        $request->validate([
            'descripcion' => 'required',
            'slug' => 'required|unique:formularios'
        ]);
        $formulario->update($request->all());
       // return response()->json($formulario);
        return redirect()->route('Admin.Forms.edit', $formulario)->with('info',  'El formulario ha sido actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function destroy(formulario $formulario)
    {
        $formulario->delete();
        return response()->json([
            
            'message' => 'Data deleted successfully!'
            
          ]);
       // return redirect()->route('Admin.Forms.index');
    }
}
