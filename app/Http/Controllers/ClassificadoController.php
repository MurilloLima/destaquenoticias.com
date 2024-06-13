<?php

namespace App\Http\Controllers;

use App\Models\Categoriaclass;
use App\Models\Classificado;
use Illuminate\Http\Request;

class ClassificadoController extends Controller
{
    private $class;
    public function __construct(Classificado $class)
    {
        $this->class = $class;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Classificado::latest()->get();
        return view('admin.pages.cliente.classificados.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Categoriaclass::latest()->get();
        return view('admin.pages.cliente.classificados.create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'desc' => 'required',
            'valor' => 'required',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/noticias'), $imageName);
            $this->class->cat_id = $request->cat_id;
            $this->class->title = $request->title;
            $this->class->desc = $request->desc;
            $this->class->valor = $request->valor;
            $this->class->image = $imageName;
            $this->class->save();
            return redirect()->back()->with('msg', 'Cadastrado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cat = categorie::latest()->get();
        $data = Classificado::where('cat_id', '=', $id)->get();
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
    public function destroy($id)
    {
        Classificado::destroy($id);
        return redirect()->back()->with('msg', 'Deletado com sucesso!');
    }
}
