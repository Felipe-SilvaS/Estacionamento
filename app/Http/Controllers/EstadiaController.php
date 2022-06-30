<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Estadia, Preco, TipoVeiculo, Veiculo};
use Carbon\Carbon;

class EstadiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadia = Estadia::all();
        return view('estadia.index', compact('estadia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoVeiculos = TipoVeiculo::all();
        return view('estadia.create', compact('tipoVeiculos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $dataVeiculo = $data['veiculo'];
        $preco = Preco::find('1');
        $veiculo = Veiculo::create($dataVeiculo);
        Estadia::create([
            'data_acesso' => Carbon::now(),
            'status_pagamento' => $data['status_pagamento'],
            'veiculo_id' => $veiculo->id,
            'preco_id' => $preco->id
        ]);
        return redirect()
            ->route('estadia.index')
            ->with('message', 'Veículo adicionado ao sistema');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadia = Estadia::find($id);
        if(!$estadia){
            return redirect()
                        ->route('estadia.index')
                        ->with('message', 'Detalhes de estadia encontrado');
        }
        return view('estadia.show', compact('estadia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadia = Estadia::find($id);
        if(!$estadia){
            return redirect()
                        ->route('estadia.index')
                        ->with('message', 'Estadia não Encontrada, Tente Novamente');
        }
        return view('estadia.edit', compact('estadia'));
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
        $estadia = Estadia::find($id);
        if(!$estadia){
            return redirect()
                        ->route('estadia.index')
                        ->with('message', 'Estadia não Encontrada, Tente Novamente');
        }
        $estadia->update($request->all());
        return redirect()
                        ->route('estadia.index')
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
        $estadia = Estadia::find($id);
        if (!$estadia) {
            return redirect()
                ->route('estadia.index')
                ->with('message', 'Estadia de estadia encontrado');
        }
        if ($estadia->status_pagamento) {
            $estadia->delete();
            return redirect()
                ->route('estadia.index')
                ->with('message', 'Liberado, Obrigado!');
        } else {
            return redirect()
                ->route('estadia.edit', $id)
                ->with('message', 'Pagamento não Efetuado, Por favor efetue para que possamos liberar seu veiculo!');
        }
    }
}
