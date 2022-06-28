<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVaga;
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
        $vagas= Vaga::orderBy('created_at')->paginate(5);
        return view ('vagas.index', compact('vagas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vagas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateVaga $request)
    {
        $data = $request->validated();
        Vaga::create($data);
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
        $vagas = Vaga::find($id);
        if(!$vagas){
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
        $vagas = Vaga::find($id);
        if (!$vagas) {
            return redirect()
                ->route('vagas.index')
                ->with('message', 'Vaga não foi encontrada');
        }
        if ($vagas->status_pagamento) {
            $vagas->delete();
            return redirect()
                ->route('vagas.index')
                ->with('message', 'Vaga Liberada, Obrigado!');
        } else {
            return redirect()
                ->route('vagas.edit')
                ->with('message', 'Pagamento não Efetuado, Por favor efetue para que possamos liberar seu veiculo!');
        }
    }
}
