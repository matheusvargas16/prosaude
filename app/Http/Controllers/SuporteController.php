<?php

namespace App\Http\Controllers;

use App\Models\Suporte;
use Illuminate\Http\Request;

class SuporteController extends Controller
{
    public function index()
    {
        $suportes = Suporte::all();
        return view('suportes.index', compact('suportes'));
    }

    public function create()
    {
        return view('suportes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string',
            'descricao' => 'required|string',
        ]);

        Suporte::create($request->all());
        return redirect()->route('suportes.index');
    }

    public function show($id)
    {
        $suporte = Suporte::findOrFail($id);
        return view('suportes.show', compact('suporte'));
    }

    public function edit($id)
    {
        $suporte = Suporte::findOrFail($id);
        return view('suportes.edit', compact('suporte'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
            'descricao' => 'required|string',
        ]);

        $suporte = Suporte::findOrFail($id);
        $suporte->update($request->all());
        return redirect()->route('suportes.index');
    }

    public function destroy($id)
    {
        $suporte = Suporte::findOrFail($id);
        $suporte->delete();
        return redirect()->route('suportes.index');
    }
}
