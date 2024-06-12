<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampeaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campeao')->insert([
            [
                'id_champ' => 'Aatrox',
                'nome' => 'Aatrox',
                'rota1' => 'Top',
                'rota2' => 'Mid',
                'forte1' => 'Ramus',
                'forte2' => 'Ryze',
                'forte3' => 'Smolder',
                'fraco1' => 'Singed',
                'fraco2' => 'Udyr',
                'fraco3' => 'Kennen'
            ],
            [
                'id_champ' => 'Ahri',
                'nome' => 'Ahri',
                'rota1' => 'Mid',
                'rota2' => null,
                'forte1' => 'Talon',
                'forte2' => 'Zed',
                'forte3' => 'Yasuo',
                'fraco1' => 'Malzahar',
                'fraco2' => 'LeBlanc',
                'fraco3' => 'Fizz'
            ],
            [
                'id_champ' => 'Akali',
                'nome' => 'Akali',
                'rota1' => 'Top',
                'rota2' => 'Mid',
                'forte1' => 'Kennen',
                'forte2' => 'Fiora',
                'forte3' => 'Riven',
                'fraco1' => 'Malphite',
                'fraco2' => 'Nasus',
                'fraco3' => 'Darius'
            ],
            [
                'id_champ' => 'Annie',
                'nome' => 'Annie',
                'rota1' => 'Mid',
                'rota2' => null,
                'forte1' => 'Talon',
                'forte2' => 'Yasuo',
                'forte3' => 'Fizz',
                'fraco1' => 'Zed',
                'fraco2' => 'LeBlanc',
                'fraco3' => 'Akali'
            ],
            [
                'id_champ' => 'Ashe',
                'nome' => 'Ashe',
                'rota1' => 'ADC',
                'rota2' => null,
                'forte1' => 'Jhin',
                'forte2' => 'Miss Fortune',
                'forte3' => 'Ezreal',
                'fraco1' => 'Draven',
                'fraco2' => 'Kai\'Sa',
                'fraco3' => 'Tristana'
            ],
            [
                'id_champ' => 'AurelionSol',
                'nome' => 'Aurelion Sol',
                'rota1' => 'Mid',
                'rota2' => null,
                'forte1' => 'Kassadin',
                'forte2' => 'Fizz',
                'forte3' => 'Zed',
                'fraco1' => 'Zoe',
                'fraco2' => 'Veigar',
                'fraco3' => 'Syndra'
            ],
            [
                'id_champ' => 'Blitzcrank',
                'nome' => 'Blitzcrank',
                'rota1' => 'Suporte',
                'rota2' => null,
                'forte1' => 'Leona',
                'forte2' => 'Thresh',
                'forte3' => 'Nautilus',
                'fraco1' => 'Sona',
                'fraco2' => 'Nami',
                'fraco3' => 'Lulu'
            ],
            [
                'id_champ' => 'Brand',
                'nome' => 'Brand',
                'rota1' => 'Mid',
                'rota2' => 'Suporte',
                'forte1' => 'Leona',
                'forte2' => 'Thresh',
                'forte3' => 'Nautilus',
                'fraco1' => 'Sona',
                'fraco2' => 'Nami',
                'fraco3' => 'Lulu'
            ],
            [
                'id_champ' => 'Braum',
                'nome' => 'Braum',
                'rota1' => 'Suporte',
                'rota2' => null,
                'forte1' => 'Leona',
                'forte2' => 'Thresh',
                'forte3' => 'Nautilus',
                'fraco1' => 'Sona',
                'fraco2' => 'Nami',
                'fraco3' => 'Lulu'
            ],
            [
                'id_champ' => 'Caitlyn',
                'nome' => 'Caitlyn',
                'rota1' => 'ADC',
                'rota2' => null,
                'forte1' => 'Jhin',
                'forte2' => 'Miss Fortune',
                'forte3' => 'Ezreal',
                'fraco1' => 'Draven',
                'fraco2' => 'Kai\'Sa',
                'fraco3' => 'Tristana'
            ]
        ]);
    }
}
