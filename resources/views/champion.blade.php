<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    
    <section class="barra-lateral">

    </section>
    <section class="main" style="background-image: url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{ $campeao->id_champ }}_0.jpg');')">
        <div class="background-div"></div>
        <div class="overlay-div">
            <div class="titulo-champ">
                <h1 class="nome-champ">{{ $campeao->nome }}</h1>
                {{-- <p class="frase-champ">A FLECHA DA VINGANÇA.</p> --}}
            </div>
            <div class="conteudo-champ">
                <div class="playstyle">

                </div>
                <div class="dados-champ">
                    <ul>
                        <p>ROTAS: {{ $campeao->rota1 }} / {{ $campeao->rota2 }}</p>
                        {{-- <p>{{ $campeao->rota2 }}</p> --}}
                        <p>CLASSE: {{ $campeao->classe }}</p>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>
</html>