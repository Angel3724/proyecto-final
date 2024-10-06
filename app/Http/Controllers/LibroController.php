<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libros.create-libro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'min:3', 'max:255'],
            'autor' => ['required', 'string', 'min:3', 'max:255'],
            'editorial' => ['nullable', 'string', 'min:3', 'max:255'],
            'precio' => ['required', 'numeric', 'min:0'],
            'anio_publicacion' => ['required', 'integer', 'min:0', 'max:' . date('Y')],
            'isbn' => ['required', 'string', 'max:13', 'regex:/^\d{10}(\d{3})?$/'],
            'paginas' => ['required', 'integer', 'min:1'],
            'genero' => ['required', 'string', 'in:Ficción,No Ficción,Ciencia,Fantasía,Historia,Otro'],
            'sinopsis' => ['nullable', 'string', 'max:1000'],
        ]);
        
        $libro = Libro::create($request->all());

        return redirect()->route('libro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        //
    }
}
