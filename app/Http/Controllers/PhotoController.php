<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Tag;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::with('tags')->get();
        return view('photos.index', compact('photos')); //devuelve todo a fotos para que se muestre en la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all(); // Obtiene todos los tags disponibles
        return view('photos.create', compact('tags')); // Devuelve la vista de creación con los tags
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = Photo::create($request->only('title', 'url')); // Crea una nueva foto con los datos del request
        $photo->tags()->attach($request->input('tags')); // Array de IDs de tags seleccionados
        return redirect()->route('photos.index')->with('success', 'Photo created successfully!'); // Redirige a la lista de fotos con un mensaje de éxito
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
    public function destroy(string $id)
    {
        //
    }
}
