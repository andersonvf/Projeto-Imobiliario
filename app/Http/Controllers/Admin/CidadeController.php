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

    public function cidades(){
        {
            $subtitulo = 'Lista de Cidades';

            //$cidades = ['Vitória', 'São Paulo', 'Manaus', 'Curitiba'];

            $cidades = Cidade::all();

            $cidades = Cidade::paginate(9);

            return view ('admin.cidades.index', compact('subtitulo', 'cidades'));
        }
    }


    public function formAdicionar()
    {
        return view('admin.cidades.form');
    }

    public function adicionar(CidadeRequest $request)
    {

//Criar um objeto do modelo (classe) cidade

        Cidade::create($request->all());

        $request->session()->flash('sucesso', "Cidade $request->nome incluída com sucesso!");

        return redirect()->route('admin.cidades.listar');

    }

     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function formEditar($id)
    {
        $cidade = Cidade::find($id);
        $action = route('admin.cidades.editar', $cidade->id);

        return view ('admin.cidades.form', compact('cidade', 'action'));
    }


     public function editar($id)
    {
        echo "Editar";
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
    public function destroy($id, Request $request)
    {
        Cidade::destroy($id);
        $request->session()->flash('sucesso','REGISTRO DELETADO');
        return redirect()->route('admin.cidades.listar');
    }
}
