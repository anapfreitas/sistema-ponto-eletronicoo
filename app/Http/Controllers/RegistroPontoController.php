<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroPonto;
use App\Models\Funcionario;

class RegistroPontoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = RegistroPonto::with('funcionario')->get();
        return view('registros.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        $funcionarios = Funcionario::all();
        return view('registros.create', compact('funcionarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'funcionario_id' => 'required|exists:funcionarios,id',
                'data' => 'required|date',
            ]);
        
            RegistroPonto::create([
                'funcionario_id' => $request->funcionario_id,
                'data' => $request->data,
                'horario_entrada' => now(), 
            ]);
            return redirect()->route('registros-ponto.index')->with('success', 'Registro de entrada criado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function registrarSaida($id)
    {
        $registro = RegistroPonto::findOrFail($id);
        $registro->update([
            'horario_saida' => now(),
        ]);

        return redirect()->route('registros-ponto.index')->with('success', 'Saída registrada com sucesso!');
    }
}
