<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composicao extends Model
{
    use HasFactory;
    
    private $top;
    private $jungler;
    private $mid;
    private $adc;
    private $sup;

    public function __construct($campeoes) {
        $this->setValues($campeoes);
    }

    public function setTop($top)
    {
        $this->top = $top;
        return $this;
    }

    public function getTop()
    {
        return $this->top;
    }

    public function setJungler($jungler)
    {
        $this->jungler = $jungler;
        return $this;
    }

    public function getJungler()
    {
        return $this->jungler;
    }

    public function setMid($mid)
    {
        $this->mid = $mid;
        return $this;
    }

    public function getMid()
    {
        return $this->mid;
    }

    public function setAdc($adc)
    {
        $this->adc = $adc;
        return $this;
    }

    public function getAdc()
    {
        return $this->adc;
    }

    public function setSup($sup)
    {
        $this->sup = $sup;
        return $this;
    }

    public function getSup()
    {
        return $this->sup;
    }

    public function setValues($campeoes)
    {
        $this->setTop($campeoes[0]);
        $this->setJungler($campeoes[1]);
        $this->setMid($campeoes[2]);
        $this->setAdc($campeoes[3]);
        $this->setSup($campeoes[4]);
    }

}
