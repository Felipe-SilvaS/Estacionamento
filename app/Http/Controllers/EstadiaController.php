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
        $vaga = Estadia::orderBy('created_at')->paginate(5);
        return view('estadia.index', compact('vaga'));
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
            ->route('vagas.index')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
