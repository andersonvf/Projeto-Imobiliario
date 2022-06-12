<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Imovel;
use App\Models\Foto;
use Illuminate\Http\Request;
use App\Http\Requests\FotoRequest;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idImovel)
    {
        $imovel = Imovel::find($idImovel);

        $fotos = Foto::where('imovel_id', $idImovel)->get();

        return view('admin.imoveis.fotos.index', compact('imovel', 'fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idImovel)
    {
        $imovel = Imovel::find($idImovel);

        return view('admin.imoveis.fotos.form', compact('imovel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FotoRequest $request, $idImovel)
    {

        if ($request->hasFile('foto')) {

            if ($request->foto->isValid()) {
                $fotoURL = $request->foto->store("imoveis/$idImovel", 'public');

                $foto = new Foto();
                $foto->url = $fotoURL;
                $foto->imovel_id = $idImovel;
                $foto->save();
            }
        }
        $request->session()->flash('sucesso', 'Foto incluída com sucesso!');
        return redirect()->route('admin.imoveis.fotos.index', $idImovel);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idImovel, $idFoto)
    {
        $foto = Foto::find($idFoto);

        //Apagar foto da pasta
        Storage::disk('public')->delete($foto->url);

        //Apagando registro
        $foto->delete();

        $request->session()->flash('sucesso', 'Foto excluída com sucesso!');
        return redirect('admin.imoveis.fotos.index', $idImovel);
    }
}
