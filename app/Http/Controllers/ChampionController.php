<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeao;

class ChampionController extends Controller
{
    /**
     * Rota para listar os campeoes
     * 
     * @return $Champions
     */
    public function index($nomeCampeao)
    {
        $campeao = Campeao::where('id_champ', $nomeCampeao)->get();
        // $champions = Campeao::all();
        // var_dump($campeao);exit;
        return view('champion', ['campeao' => $campeao[0]]);
        // return response()->json($campeao);
    }
}
