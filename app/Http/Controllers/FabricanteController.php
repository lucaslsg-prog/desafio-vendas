<?php

namespace App\Http\Controllers;


use App\DataTables\FabricanteDataTable;
use App\Http\Requests\FabricanteRequest;
use App\Models\Fabricante;
use App\Services\FabricanteService;
use Illuminate\Http\Request;

class FabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FabricanteDataTable $fabricanteDataTable)
    {
        return $fabricanteDataTable->render('fabricante.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fabricante.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FabricanteRequest $request)
    {
        //
        $fabricante = FabricanteService::store($request->all());

        if ($fabricante) {
            flash('Fabricante cadastrado com sucesso')->success();

            return back();
        }

        flash('Erro ao salvar o fabricante')->error();

        return back()->withInput();
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
    public function edit(Fabricante $fabricante)
    {
        return view('fabricante.form', compact('fabricante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fabricante $fabricante)
    {
        $fabricante = FabricanteService::update($request->all(), $fabricante);

        if ($fabricante) {
            flash('Fabricante atualizado com sucesso')->success();

            return back();
        }

        flash('Erro ao atualizar o fabricante')->error();

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabricante $fabricante)
    {
        try {
            $fabricante->delete();
        } catch (Throwable $th) {
            return response('Erro ao apagar', 400);
        }
    }
}
