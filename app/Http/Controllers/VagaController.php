<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVaga;
use App\Models\TipoVeiculo;
use Illuminate\Http\Request;
use App\Models\Vaga;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaga = Vaga::orderBy('created_at')->paginate(5);
        return view('vagas.index', compact('vaga'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoVeiculos = TipoVeiculo::all();
        return view('vagas.create', compact('tipoVeiculos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataVagas = $request->except('_token');

        foreach ($dataVagas as $vaga) {
            Vaga::create($vaga);
        }

        return redirect()->route('estadia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $vaga= Vaga::find($id);
        if($vaga){
            return redirect()
                        ->route('vagas.index')
                        ->with('message', 'Vaga não foi encontrada');
        }
        return view('vagas.show', compact('vaga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaga = Vaga::find($id);
        if(!$vaga){
            return redirect()
                        ->route('vagas.index')
                        ->with('message', 'Vaga não Encontrada, Tente Novamente');
        }
        return view('vagas.edit', compact('vaga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vaga = Vaga::find($id);
        if(!$vaga){
            return redirect()
                        ->route('vagas.index')
                        ->with('message', 'Vaga não Encontrada, Tente Novamente');
        }
        $vaga->update($request->all());
        return redirect()
                        ->route('vagas.index')
                        ->with('message', 'Pagamento Efetuado, Volte Sempre!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaga = Vaga::find($id);
        if (!$vaga) {
            return redirect()
                ->route('vagas.index')
                ->with('message', 'Vaga não foi encontrada');
        }
        if ($vaga->status_pagamento) {
            $vaga->delete();
            return redirect()
                ->route('vagas.index')
                ->with('message', 'Vaga Liberada, Obrigado!');
        } else {
            return redirect()
                ->route('vagas.edit', $id)
                ->with('message', 'Pagamento não Efetuado, Por favor efetue para que possamos liberar seu veiculo!');
        }
    }
}
