<?php
namespace App\Http\Controllers;

class SeriesController extends Controller
{
    public function index()
    {
        $series = [
            'Breaking Bad',
            'Game of Thrones',
            'Stranger Things',
            'The Crown',
            'The Mandalorian',
        ];

        return view('lista-series')
            ->with('series', $series);
    }
}
