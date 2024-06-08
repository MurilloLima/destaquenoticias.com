<?php

namespace App\Http\Controllers;

use App\Models\CategoriaClassificados;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaClassificadosController extends Controller
{
    private $cat_classific;
    public function __construct(CategoriaClassificados $cat_classific)
    {
        $this->cat_classific = $cat_classific;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = CategoriaClassificados::latest()->get();
        return view('admin.pages.classificados.categorias.index', compact('cat'));
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

        $this->cat_classific->title = $request->title;
        $this->cat_classific->slug = Str::slug($request->title, '-');
        $this->cat_classific->save();
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
        $this->cat_classific->destroy($id);
        return redirect()->back()->with('msg', 'Deletada com sucesso!');
    }
}
