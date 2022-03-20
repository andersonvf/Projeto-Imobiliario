<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Http\Requests\CidadeRequest;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $subtitulo = 'Lista de Cidades';
        $cidades = Cidade::all();
        $cidades = Cidade::paginate(9);
        return view ('admin.cidades.index', compact('subtitulo', 'cidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.cidades.store');
        return view('admin.cidades.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadeRequest $request)
    {
        Cidade::create($request->all());
        $request->session()->flash('sucesso', "Cidade $request->nome incluída com sucesso!");
        return redirect()->route('admin.cidades.index');
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
        $cidade = Cidade::find($id);
        $action = route('admin.cidades.update', $cidade->id);
        return view ('admin.cidades.form', compact('cidade', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CidadeRequest $request, $id)
    {
        $cidade = Cidade::find($id);
        $cidade->update($request->all());
        $request->session()->flash('sucesso', "Cidade $request->nome alterada com sucesso!");
        return redirect()->route('admin.cidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Cidade::destroy($id);
        $request->session()->flash('sucesso','REGISTRO DELETADO');
        return redirect()->route('admin.cidades.listar');
    }
}
