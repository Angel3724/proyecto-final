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
        $libros = Libro::all();
        return view('libros.index-libro', compact('libros'));
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
            'isbn' => ['required', 'string', 'max:13', 'regex:/^\d{10}(\d{3})?$/', 'unique:libros'],
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
        return view('libros.show-libro', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view('libros.edit-libro', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'min:3', 'max:255'],
            'autor' => ['required', 'string', 'min:3', 'max:255'],
            'editorial' => ['nullable', 'string', 'min:3', 'max:255'],
            'precio' => ['required', 'numeric', 'min:0'],
            'anio_publicacion' => ['required', 'integer', 'min:0', 'max:' . date('Y')],
            'isbn' => ['required', 'string', 'max:13', 'regex:/^\d{10}(\d{3})?$/', 'unique:libros,isbn,' . $libro->id],
            'paginas' => ['required', 'integer', 'min:1'],
            'genero' => ['required', 'string', 'in:Ficción,No Ficción,Ciencia,Fantasía,Historia,Otro'],
            'sinopsis' => ['nullable', 'string', 'max:1000'],
        ]);

        $libro->update($request->all());

        return redirect()->route('libro.show', $libro);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libro.index');
    }
}
