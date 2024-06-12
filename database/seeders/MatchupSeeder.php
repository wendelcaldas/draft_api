<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matchup;

class MatchupSeeder extends Seeder
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

        foreach ($champions as $champ1) {
            foreach ($champions as $champ2) {
                if ($champ1 !== $champ2) {
                    // Gera um win rate aleatório para champ1 entre 0 e 100
                    $winrateChamp1 = rand(0, 100);

                    // Calcula o win rate de champ2 como complementar a 100
                    $winrateChamp2 = 100 - $winrateChamp1;

                    Matchup::create([
                        'champ1' => $champ1,
                        'winrate_champ1' => $winrateChamp1,
                        'champ2' => $champ2,
                        'winrate_champ2' => $winrateChamp2,
                    ]);
                }
            }
        }
    }
}
