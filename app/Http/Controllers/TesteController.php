<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index()
    {
        return 'Laravel está rodando com sucesso dentro do Docker 🚀';
    }
}
