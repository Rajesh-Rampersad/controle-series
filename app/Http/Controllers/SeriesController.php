<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()

    {
        // $series = [
        //     ['nome' => 'Game of Thrones'],
        //     ['nome' => 'Breaking Bad'],
        //     ['nome' => 'Stranger Things'],
        //     ['nome' => 'The Witcher'],
        //     ['nome' => 'The Office'],
        //     ['nome' => 'Friends'],
        //     ['nome' => 'The Crown'],
        //     ['nome' => 'Black Mirror'],
        //     ['nome' => 'Narcos'],
        //     ['nome' => 'The Mandalorian'],
        // ];
        // $series = DB::select('SELECT * FROM series');
        $series = Serie::query()->orderBy('nome')->get(); // Alternativa usando o Query Builder
        // $series = Serie::all(); // Alternativa usando Eloquent ORM


        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // Validar que el campo 'nome' esté presente
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Verificar si ya existe una serie con el mismo nombre
        $serieExistente = Serie::where('nome', $request->input('nome'))->first();

        if ($serieExistente) {
            // Redirigir con mensaje de error si ya existe
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['nome' => 'Já existe uma série com esse nome.']);
        }

        // Si no existe, la crea
        Serie::create($request->only('nome'));

        return to_route('series.index');
    }
    public function destroy(Serie $serie)
    {
        $serie->delete();
        return to_route('series.index');
    }
}
