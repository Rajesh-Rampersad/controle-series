<?php

namespace App\Http\Controllers;

use App\Models\Serie;

class SeasonsController extends Controller
{
    public function index(Serie $serie)
    {

        $seasons = $serie->seasons()->with('episodes')->get();

        return view('seasons.index', compact('seasons', 'serie'));
    }
}
