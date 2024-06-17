<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoMatch extends Model
{
    use HasFactory;

    private $winRateTimeAzul;
    private $winRateTimeVermelho;

    public function setWinRateTimeAzul($winRate)
    {
        $this->winRateTimeAzul = $winRate;
        // return $this;
    }

    public function getWinRateTimeAzul()
    {
        return $this->winRateTimeAzul;
    }

    public function setWinRateTimeVermelho($winRate)
    {
        $this->winRateTimeVermelho = $winRate;
        // return $this;
    }

    public function getWinRateTimeVermelho()
    {
        return $this->winRateTimeVermelho;
    }

    public function setConteudo($top, $jg, $mid, $adc, $sup)
    {
        $blueTeam = $top->winrate_champ1 + $jg->winrate_champ1 + $mid->winrate_champ1 + $adc->winrate_champ1 + $sup->winrate_champ1;
    
        $redTeam = $top->winrate_champ2 + $jg->winrate_champ2 + $mid->winrate_champ2 + $adc->winrate_champ2 + $sup->winrate_champ2;
    
        $this->setWinRateTimeVermelho($redTeam);
        $this->setWinRateTimeAzul($blueTeam);

        return $this;
    }
}
