<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroPonto;
use App\Models\Funcionario;
use App\Models\Relatorio;
use Illuminate\Support\Facades\DB;


class RelatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $relatorios = Relatorio::with('funcionario')->get();
        return view('relatorios.index', compact('relatorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $funcionarios = Funcionario::all();
        return view('relatorios.create', compact('funcionarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'periodo_inicio' => 'required|date',
            'periodo_fim' => 'required|date|after_or_equal:periodo_inicio',
        ]);
    

        $horasTrabalhadas = RegistroPonto::where('funcionario_id', $request->funcionario_id)
            ->whereBetween('data', [$request->periodo_inicio, $request->periodo_fim])
            ->sum(DB::raw('TIMESTAMPDIFF(HOUR, horario_entrada, horario_saida)'));
    
        Relatorio::create([
            'funcionario_id' => $request->funcionario_id,
            'periodo_inicio' => $request->periodo_inicio,
            'periodo_fim' => $request->periodo_fim,
            'total_horas_trabalhadas' => $horasTrabalhadas,
        ]);
    
        return redirect()->route('relatorios.index')->with('success', 'Relatório gerado com sucesso!');
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
}
