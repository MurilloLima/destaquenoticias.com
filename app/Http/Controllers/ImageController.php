<?php

namespace App\Http\Controllers;

use App\Models\Classificado;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $img;
    public function __construct(Image $img)
    {
        $this->img = $img;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data = Image::where('cat_id', '=', $id)->latest()->get();
        return view('admin.pages.cliente.classificados.fotos.index', compact('id', 'data'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/classificados'), $imageName);
            $this->img->img = $imageName;
            $this->img->cat_id = $request->cat_id;
            $this->img->save();
            return redirect()->back()->with('msg', 'Cadastrado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
