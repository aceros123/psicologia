<?php

namespace App\Http\Controllers;

use App\Models\asig_usuarios_formularios;
use Illuminate\Http\Request;

class InfPsicologicoController extends Controller
{
    public function __invoke()
    {
        $asignaciones = asig_usuarios_formularios::all();
        return view('admin.InfPsicologico', compact('asignaciones'));
    }
}
