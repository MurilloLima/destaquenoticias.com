<?php

namespace App\Http\Controllers;

use App\Models\CategoriaClassificados;
use App\Models\Classificado;
use App\Models\Denuncia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaClassificadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $cat = CategoriaClassificados::latest()->get();
        dd($this->catclassificados->all());
        // return view('admin.pages.classificados.categorias.index', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $this->Classificadis()->title = $request->title;
        $this->Classificadis()->slug = Str::slug($request->title, '-');
        $this->Classificadis()->save();
        return redirect()->back()->with('msg', 'Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoriaClassificados $categoriaClassificados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoriaClassificados $categoriaClassificados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoriaClassificados $categoriaClassificados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->Classificadis()->destroy($id);
        return redirect()->back()->with('msg', 'Deletada com sucesso!');
    }
}
