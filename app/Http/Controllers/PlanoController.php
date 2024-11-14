<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function index()
    {
        $planos = Plano::all();
        return view('planos.index', compact('planos'));
    }

    public function show($id)
    {
        $plano = Plano::findOrFail($id);
        return view('planos.show', compact('plano'));
    }
}
