<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Time;
use App\Models\Matchup;
use App\Models\Composicao;
use App\Models\Resultado;
use App\Models\ResultadoMatch;

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

        $time1 = new Composicao($dados['data'][0]);
        $time2 = new Composicao($dados['data'][1]);

        $matchUp = $this->analisaMatchUp($time1, $time2);

        $resultado = ['TimeAzul' => $matchUp->getWinRateTimeAzul(), 'timeVermelho' => $matchUp->getWinRateTimeVermelho()];

        return $resultado;
    }

    public function analisaMatchUp($time1, $time2)
    {
        $matchTop = Matchup::where('champ1', '=', $time1->getTop())
                            ->where('champ2', '=', $time2->getTop())
                            ->get();

        $matchJg = Matchup::where('champ1', '=', $time1->getJungler())
                            ->where('champ2', '=', $time2->getJungler())
                            ->get();

        $matchMid = Matchup::where('champ1', '=', $time1->getMid())
                            ->where('champ2', '=', $time2->getMid())
                            ->get();

        $matchAdc = Matchup::where('champ1', '=', $time1->getAdc())
                            ->where('champ2', '=', $time2->getAdc())
                            ->get();

        $matchSup = Matchup::where('champ1', '=', $time1->getSup())
                            ->where('champ2', '=', $time2->getSup())
                            ->get();

        $resultado = new ResultadoMatch();
        $resultado->SetConteudo($matchTop[0], $matchJg[0], $matchMid[0], $matchAdc[0], $matchSup[0]);

        return $resultado;
    }
}
