<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Escultura;
use App\Models\Gravura;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $escultura = Escultura::all()->random();
        $gravura = Gravura::all()->random();
        return view('dashboard.inventario.index', [
            'escultura' => $escultura,
            'gravura' => $gravura
        ]);
    }
}
