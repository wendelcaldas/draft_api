<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Time;
use App\Models\Matchup;

class DraftController extends Controller
{
    //

    public function index()
    {
        $json = File::get(storage_path('data/champions.json'));
        $data = json_decode($json, true);
        // var_dump($data);exit;

        $champNames = [];

        foreach ($data['data'] as $data) {

            $nome = $data['id'];

            array_push($champNames, $nome);
        }
        // print_r($champNames);exit;
        return view('draft', ['champ' => $champNames]);
    }

    public function buscaCampeoes()
    {
        $json = File::get(storage_path('data/champions.json'));
        $data = json_decode($json, true);

        $champNames = [];

        foreach ($data['data'] as $data) {

            $nome = $data['id'];

            array_push($champNames, $nome);
        }
        return $champNames;
        // return view('draft', ['champ' => $champNames]);
    }

    public function calculaResultado(Request $request)
    {
        $dados = $request->all();

        // Salve os dados na sessão
        session(['dados' => $dados]);
        return response()->json(['redirect_url' => route('exibe.resultado')]);
    }

    public function resultadoPartida()
    {
        // Recupera os dados da sessão
        $dados = session('dados');
        $time1 = $dados['data'][0];
        $time2 = $dados['data'][1];

        $matchUp = [];

        for ($i=0; $i < 5 ; $i++) { 
            // var_dump($time1[$i] . 'x' . $time2[$i]);
            $resultado = $this->simulaMatchUp($time1[$i], $time2[$i]);
            
            array_push($matchUp, $resultado);
        };

        // foreach ($matchUp as $match) {
        //     dd($match[0]->champ1);
        // }exit;

        // var_dump($time1[0]);exit;
        // Passa os dados para a view
        return view('resultado', compact('matchUp'));
   }

   public function simulaMatchUp($campeao1, $campeao2)
   {
        $matchups = Matchup::where('champ1', $campeao1)
                           ->where('champ2', $campeao2)
                           ->get();

        // dd($matchups[0]->champ1);

        return $matchups;
   }
}
