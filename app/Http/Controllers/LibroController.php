<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LibroController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new middleware('auth', except: ['index', 'show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with('user:id,email')->get();
        return view('libros.index-libro', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = Genero::all();
        return view('libros.create-libro', compact('generos'));
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
            'generos' => ['required', 'array'],
            'generos.*' => ['exists:generos,id'],
            'sinopsis' => ['nullable', 'string', 'max:1000'],
        ]);        

        $request->merge([
            'user_id' => Auth::id(),
        ]);
            
        $libro = Libro::create($request->all());

        $libro->generos()->attach($request->generos);

        return redirect()->route('libro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        $libro->load('user', 'generos');
        return view('libros.show-libro', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        Gate::authorize('update', $libro);

        $libro->load('generos');
        $generos = Genero::all();
        return view('libros.edit-libro', compact('libro', 'generos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        Gate::authorize('update', $libro);

        $request->validate([
            'titulo' => ['required', 'string', 'min:3', 'max:255'],
            'autor' => ['required', 'string', 'min:3', 'max:255'],
            'editorial' => ['nullable', 'string', 'min:3', 'max:255'],
            'precio' => ['required', 'numeric', 'min:0'],
            'anio_publicacion' => ['required', 'integer', 'min:0', 'max:' . date('Y')],
            'isbn' => ['required', 'string', 'max:13', 'regex:/^\d{10}(\d{3})?$/', 'unique:libros,isbn,' . $libro->id],
            'paginas' => ['required', 'integer', 'min:1'],
            'generos' => ['required', 'array'],
            'generos.*' => ['exists:generos,id'],
            'sinopsis' => ['nullable', 'string', 'max:1000'],
        ]);

        $libro->update($request->all());

        $libro->generos()->sync($request->generos);

        return redirect()->route('libro.show', $libro);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        Gate::authorize('delete', $libro);

        $libro->delete();

        return redirect()->route('libro.mine');
    }

    public function trashed()
    {
        $libros = Libro::onlyTrashed()->with('user:id,email')->get();
        return view('libros.trashed-libro', compact('libros'));
    }

    public function restore($id)
    {
        $libro = Libro::onlyTrashed()->findOrFail($id);

        Gate::authorize('restore', $libro);

        $libro->restore();

        return redirect()->route('libro.trashed')->with('success', 'Libro restaurado correctamente.');
    }

    public function forceDelete($id)
    {        
        $libro = Libro::withTrashed()->findOrFail($id);

        Gate::authorize('forceDelete', $libro);

        $libro->forceDelete(); 

        return redirect()->route('libro.trashed')->with('success', 'Libro eliminado definitivamente');
    }

    public function mine()
    {
        $libros = Auth::user()->libros()->with('user')->get();

        return view('libros.index-libro', compact('libros'));
    }
}
