<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\CategoriaClassificados;
use App\Models\Classificado;
use App\Models\Denuncia;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
        return view('admin.pages.cliente.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = CategoriaClassificados::latest()->get();
        return view('admin.pages.cliente.create', compact('cat'));
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
            $request->image->move(public_path('upload/classificados'), $imageName);
            $this->class->img = $imageName;
            $this->class->cat_id = $request->cat_id;
            $this->class->title = $request->title;
            $this->class->desc = $request->desc;
            $this->class->valor = $request->valor;
            $this->class->save();
            return redirect()->back()->with('msg', 'Cadastrado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->class->destroy($id);
        return redirect()->back()->with('msg', 'Deletada com sucesso!');
    }
}
