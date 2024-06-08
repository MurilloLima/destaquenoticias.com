<?php

namespace App\Http\Controllers;

use App\Models\Classificado;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\CategoriaClassificados;

class ClassificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Classificado::latest()->get();
        return view('admin.pages.classificados.index', compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cat = CategoriaClassificados::latest()->get();
        $data = Classificado::where('cat_id','=', $id)->get();
        return view('home.pages.classificados.view', compact('cat', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classificado $classificado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classificado $classificado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classificado $classificado)
    {
        //
    }
}
