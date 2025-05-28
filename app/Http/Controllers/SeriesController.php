<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;

use App\Models\Serie;
use App\Repositories\EloquentSerieRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $serieRepository) {}
    public function index(Request $request)

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
        // $series = Serie::query()->orderBy('nome')->get(); // Alternativa usando o Query Builder
        $series = Serie::all(); // Alternativa usando Eloquent ORM
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');


        return view('series.index', compact('series'))
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        // Verificar si ya existe una serie con el mismo nombre
        $serieExistente = Serie::where('nome', $request->input('nome'))->first();
        if ($serieExistente) {
            // Redirigir con mensaje de error si ya existe
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['nome' => 'Já existe uma série com esse nome.']);
        }
        // Usar o repositório para adicionar a série
        $this->serieRepository->add($request);

        // Redirecionar com mensagem de sucesso
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$request->input('nome')}' cadastrada com sucesso.");
    }



    public function edit(Serie $serie)
    {

        return view('series.edit', compact('serie'));
    }
    public function update(SeriesFormRequest $request, Serie $serie)
    {

        // Verificar si ya existe una serie con el mismo nombre
        $serieExistente = Serie::where('nome', $request->input('nome'))
            ->where('id', '!=', $serie->id) // Excluir la serie actual de la verificación
            ->first();

        if ($serieExistente) {
            // Redirigir con mensaje de error si ya existe
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['nome' => 'Já existe uma série com esse nome.']);
        }

        // Si no existe, la actualiza
        $serie->update($request->only('nome'));

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' atualizada com sucesso.");
    }
    public function destroy(Serie $serie)
    {

        $serie->delete();

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' removida com sucesso.");
    }
}
