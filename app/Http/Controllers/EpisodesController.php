<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index()
    {
        // Aquí puedes implementar la lógica para listar episodios
        return view('episodes.index');
    }

    public function create(Season $season)
    {

        return view('episodes.create', compact('season'));
    }

    public function store(Request $request, Season $season)
    {
        $request->validate([
            'number' => 'required|integer|min:1',
        ]);

        $season->episodes()->create(['number' => $request->number]);

        return redirect()->route('seasons.index', $season->serie_id)
            ->with('mensagem.sucesso', 'Episódio adicionado com sucesso.');
    }

    public function edit(Episode $episode)
    {
        // Aquí puedes implementar la lógica para mostrar el formulario de edición de un episodio
        return view('episodes.edit', compact('episode'));
    }

    public function update(Request $request, Episode $episode)
    {
        $request->validate([
            'number' => 'required|integer|min:1',
        ]);

        $episode->update(['number' => $request->number]);

        return back()->with('mensagem.sucesso', 'Episódio atualizado com sucesso.');
    }

    public function destroy(Episode $episode)
    {
        $serieId = $episode->season->serie_id;
        $episode->delete();
        return redirect()->route('seasons.index', $serieId)
            ->with('mensagem.sucesso', 'Episódio excluído com sucesso!');
    }
}
