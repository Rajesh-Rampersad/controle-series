<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()

    {
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
        $seriesNome = $request->input('nome');
        $serie = new Serie();
        $serie->nome = $seriesNome;
        $serie->save();

        return redirect('/series');
    }
}
