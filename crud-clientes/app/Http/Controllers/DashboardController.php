<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Paise;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = count(Paise::all());
        $estados = count(Estado::all());
        $cidades = count(Cidade::all());
        $clientes = count(Cliente::all());
        return view('dashboard', ['paises' => $paises, 'estados' => $estados, 'cidades' => $cidades, 'clientes' => $clientes]);
    }
}
