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
        $champions = [
            'Aatrox','Ahri','Akali','Akshan','Alistar','Amumu','Anivia','Annie','Aphelios','Ashe','AurelionSol','Azir','Bard','Belveth','Blitzcrank','Brand','Braum','Briar','Caitlyn','Camille','Cassiopeia','Chogath','Corki','Darius','Diana','Draven','DrMundo','Ekko','Elise','Evelynn','Ezreal','Fiddlesticks','Fiora','Fizz','Galio','Gangplank','Garen','Gnar','Gragas','Graves','Gwen','Hecarim','Heimerdinger','Hwei','Illaoi','Irelia','Ivern','Janna','JarvanIV','Jax','Jayce','Jhin','Jinx','Kaisa','Kalista','Karma','Karthus','Kassadin','Katarina','Kayle','Kayn','Kennen','Khazix','Kindred','Kled','KogMaw','KSante','Leblanc','LeeSin','Leona','Lillia','Lissandra','Lucian','Lulu','Lux','Malphite','Malzahar','Maokai','MasterYi','Milio','MissFortune','MonkeyKing','Mordekaiser','Morgana','Naafiri','Nami','Nasus','Nautilus','Neeko','Nidalee','Nilah','Nocturne','Nunu','Olaf','Orianna','Ornn','Pantheon','Poppy','Pyke','Qiyana','Quinn','Rakan','Rammus','RekSai','Rell','Renata','Renekton','Rengar','Riven','Rumble','Ryze','Samira','Sejuani','Senna','Seraphine','Sett','Shaco','Shen','Shyvana','Singed','Sion','Sivir','Skarner','Smolder','Sona','Soraka','Swain','Sylas','Syndra','TahmKench','Taliyah','Talon','Taric','Teemo','Thresh','Tristana','Trundle','Tryndamere','TwistedFate','Twitch','Udyr','Urgot','Varus','Vayne','Veigar','Velkoz','Vex','Vi','Viego','Viktor','Vladimir','Volibear','Warwick','Xayah','Xerath','XinZhao','Yasuo','Yone','Yorick','Yuumi','Zac','Zed','Zeri','Ziggs','Zilean','Zoe','Zyra'
            // Adicione mais campeões conforme necessário
        ];

        foreach ($champions as $champion) {
            DB::table('campeao')->insert([
                'id_champ' => $champion,
                'nome' => $champion,
                'classe' => $this->getRandomClass(),
                'rota1' => $this->getRandomRota(),
                'rota2' => $this->getRandomRota(),
                'poke' => rand(0, 10),
                'pickoff' => rand(0, 10),
                'engage' => rand(0, 10),
                'protect' => rand(0, 10),
                'split' => rand(0, 10),
            ]);
        }
    }

    private function getRandomClass()
    {
        $classes = ['Assassino', 'Mago', 'Lutador', 'Tanque', 'Atirador', 'Encantaor'];
        return $classes[array_rand($classes)];
    }

    private function getRandomRota()
    {
        $rotas = ['Top', 'Mid', 'Adc', 'Jungle', 'Sup'];
        return $rotas[array_rand($rotas)];
    }
}
