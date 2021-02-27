<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CidadeController extends Controller
{
    private $estadoModel;

    public function __construct(Estado $estado)
    {
        $this->estadoModel = $estado;
    }

    public function getCidade($idEstado)
    {
        $estado = Estado::find($idEstado);
        $cidades = DB::table('cidades')
            ->where('estado_id', $idEstado)
            ->orderBy('cidade', 'asc')
            ->get();
        return response()->json($cidades);
    }
}
