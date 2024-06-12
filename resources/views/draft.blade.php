<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/draft.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS e Popper.js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <main>
        <section class="default">
            <div class="champ-select">
                @foreach($champ as $champName)
                <img class="champ-icon" id="{{ $champName }}" src="https://ddragon.leagueoflegends.com/cdn/14.11.1/img/champion/{{$champName}}.png" alt="">
                @endforeach

            </div>
            <button id="confirmar">Confirmar</button>
            <button id="getValues">getvalues</button>
        </section>
        <section class="draft">
            <div class="draft-header">

            </div>
            <div class="draft-picks">
                <div class="blue-side">
                    <div class="champ-selecao view-champ blue" id="view7"></div>
                    <div class="champ-selecao view-champ blue" id="view10"></div>
                    <div class="champ-selecao view-champ blue" id="view11"></div>
                    <div class="champ-selecao view-champ blue" id="view18"></div>
                    <div class="champ-selecao view-champ blue" id="view19"></div>
                </div>
                <div class="temporizador">

                </div>
                <div class="red-side">
                    <div class="champ-selecao view-champ red"  id="view8"></div>
                    <div class="champ-selecao view-champ red"  id="view9"></div>
                    <div class="champ-selecao view-champ red"  id="view12"></div>
                    <div class="champ-selecao view-champ red"  id="view17"></div>
                    <div class="champ-selecao view-champ red"  id="view20"></div>
                </div>
            </div>
            <div class="draft-bans">
                <div class="blue-side-ban">
                    <div class="champ-ban view-champ" id="baned16"></div>
                    <div class="champ-ban view-champ" id="baned14"></div>
                    <div class="champ-ban view-champ" id="baned5"></div>
                    <div class="champ-ban view-champ" id="baned3"></div>
                    <div class="champ-ban view-champ" id="baned1"></div>
                </div>
                <div class="temporizador-ban">

                </div>
                <div class="red-side-ban">
                    <div class="champ-ban view-champ"  id="baned15"></div>
                    <div class="champ-ban view-champ"  id="baned13"></div>
                    <div class="champ-ban view-champ"  id="baned6"></div>
                    <div class="champ-ban view-champ"  id="baned4"></div>
                    <div class="champ-ban view-champ"  id="baned2"></div>
                </div>
            </div>
        </section>  
    </main> 
  <!-- Modal -->
  <div class="modal fade" id="endGameModal" tabindex="-1" role="dialog" aria-labelledby="endGameModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="endGameModalLabel">Fim de Jogo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                teste
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Jogar Novamente</button>
            </div>
        </div>
    </div>
</div>

</body>
<script>
$(document).ready(function() {
            var selectedImageId = null;
            var currentViewIndex = 1;
            var selectedImages = new Set();
            var specialIndices = [2,4,6,,8,9,12,13,15,17,20];
            var swapSelection = null;
            var firstGroup = ['view7', 'view10', 'view11', 'view18', 'view19'];
            var secondGroup = ['view8', 'view9', 'view12', 'view17', 'view20'];
            var allViewsSet = false;

            // adiciona o "pisca" a primeira tela
            $('#baned1').addClass('piscando')
            
            // começa o cronometro de 30seg
            const temporizador = $('.temporizador');
            let timeLeft = 30;
            // Função para atualizar o cronômetro
            function updateTimer() {
                if (timeLeft >= 0) {
                    temporizador.text(timeLeft);
                    timeLeft--;
                } else {
                    clearInterval(timerInterval);
                }
            }

            // Função para reiniciar o cronômetro
            function reiniciarCronometro() {
                // timeLeft = 30;
                // clearInterval(timerInterval);
                // timerInterval = setInterval(updateTimer, 1000);
                // updateTimer();

                clearInterval(timerInterval); // Limpa o intervalo anterior
                timeLeft = 30;
                timerInterval = setInterval(updateTimer, 1000); // Inicia um novo intervalo
                updateTimer(); // Inicializa o cronômetro imediatamente
            }
        
            // Atualizar o cronômetro a cada segundo (1000 ms)
            let timerInterval = setInterval(updateTimer, 1000);
        
            
        
            //*************************************************************

            // Event listener para o click na imagem
            $('.champ-icon').click(function() {
                if (!$(this).hasClass('disabled')) {
                    selectedImageId = $(this).attr('id');
                    // console.log('Selected image:', selectedImageId);

                    urlImage = 'https://ddragon.leagueoflegends.com/cdn/img/champion/splash/'+selectedImageId+'_0.jpg'

                    // Altera o background completo pra uma imagem do champ
                    bans = [1,2,3,4,5,6,13,14,15,16]

                    var containsItem = bans.includes(currentViewIndex);

                    if(containsItem){
                        var viewId = 'baned' + currentViewIndex;
                        var viewDiv = $('#' + viewId);
                        var selectedImageSrc = $('#' + selectedImageId).attr('src');
                        var idImageChamp = $('#' + selectedImageId).attr('id');//banido
                        var urlSplash = selectedImageSrc;
                    
                        viewDiv.css('background-image', 'url(' + urlSplash + ')');

                    }else{
                        var viewId = 'view' + currentViewIndex;
                        var viewDiv = $('#' + viewId);
                        // Usar o selectedImageSrc pra quando for ban
                        var selectedImageSrc = $('#' + selectedImageId).attr('src');
                        // usar o idImageChamp pra seleção
                        var idImageChamp = $('#' + selectedImageId).attr('id');
                        var urlSplash = 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/'+idImageChamp+'_0.jpg';
                    
                        viewDiv.css('background-image', 'url(' + urlSplash + ')');
                    }
                }
                // console.log('teste')
            });

            // Function para desabilitar champ selecionado
            function disableImage(imageId) {
                $('#' + imageId).addClass('disabled');
                selectedImages.add(imageId);
            }

            // Function pra escolher alguma imagem aleatoria ainda não selecionada
            function pickRandomImage() {
                var availableImages = $('.champ-icon:not(.disabled)');
                if (availableImages.length > 0) {
                    var randomIndex = Math.floor(Math.random() * availableImages.length);
                    return $(availableImages[randomIndex]).attr('id');
                }
                return null;
            }

            // Function to automatically confirm a random image
            function autoConfirmRandomImage() {
                var randomImageId = pickRandomImage();
                if (randomImageId) {
                    selectedImageId = randomImageId;
                    setTimeout(function() {
                        confirmImageSelection();
                    }, 3000);

                }
            }

            // Function to confirm image selection
            function confirmImageSelection() {

                if(currentViewIndex <= 20)
                {
                    if (selectedImageId && currentViewIndex <= 20) {
                    
                    bans = [1,2,3,4,5,6,13,14,15,16]
                    
                    var containsItem = bans.includes(currentViewIndex);
                    
                    if(containsItem){
                        // console.log('ban')
                        var viewId = 'baned' + currentViewIndex;
                        var viewDiv = $('#' + viewId);
                        var selectedImageSrc = $('#' + selectedImageId).attr('src');
                        var idImageChamp = $('#' + selectedImageId).attr('id');//banido
                        var urlSplash = selectedImageSrc;
                    
                        viewDiv.css('background-image', 'url(' + urlSplash + ')');
                        viewDiv.attr('data-value', selectedImageId); // Assign the data-value
                        disableImage(selectedImageId);
                        $('div.piscando').removeClass('piscando');
                        currentViewIndex++;
                        selectedImageId = null;
                        console.log('verificando (ban), se maior q 20 ativa:'+currentViewIndex)
                        if(currentViewIndex > 20){
                            // aqui
                            console.log('chamei funcao de finalizar jogo')
                            allViewsSet = true;
                            finalizaJogo()
                        }
                    
                        // deixar a proxima escolha piscando
                        $('#baned'+currentViewIndex).addClass('piscando')
                        $('#view'+currentViewIndex).addClass('piscando')
                        // reiniciar cronometro
                        reiniciarCronometro()
                        // console.log(currentViewIndex)
                        // console.log($('#baned'+currentViewIndex))
                    }else{
                        var viewId = 'view' + currentViewIndex;
                        var viewDiv = $('#' + viewId);
                        // Usar o selectedImageSrc pra quando for ban
                        var selectedImageSrc = $('#' + selectedImageId).attr('src');
                        // usar o idImageChamp pra seleção
                        var idImageChamp = $('#' + selectedImageId).attr('id');
                        var urlSplash = 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/'+idImageChamp+'_0.jpg';
                    
                        viewDiv.css('background-image', 'url(' + urlSplash + ')');
                        viewDiv.attr('data-value', selectedImageId); // Assign the data-value
                        disableImage(selectedImageId);
                        $('div.piscando').removeClass('piscando');
                        currentViewIndex++;
                        selectedImageId = null; // Reset selectedImageId
                        console.log('verificando(pick), se maior q 20 ativa:'+currentViewIndex)
                        if(currentViewIndex > 20){
                            // aqui
                            console.log('chamei funcao de finalizar jogo')
                            allViewsSet = true;
                            finalizaJogo()
                        }
                    
                        // deixar a proxima escolha piscando
                        $('#baned'+currentViewIndex).addClass('piscando')
                        $('#view'+currentViewIndex).addClass('piscando')
                    
                    }

                    // Check if the next currentViewIndex is in specialIndices and auto-confirm if true
                    // if ($.inArray(currentViewIndex, specialIndices) !== -1) {
                    //     autoConfirmRandomImage();
                    // }
                    
                    // Check if all views have been set
                    if (currentViewIndex > 20) {
                        allViewsSet = true;
                    }
                    }
                }else{
                    // alert('chamei funcao pra finalziar o game')
                    finalizaJogo()
                }
            }

            // Event listener for confirm button
            $('#confirmar').click(function() {
                // console.log(currentViewIndex)
                // confirmImageSelection();
                // console.log(currentViewIndex)
                modalEndGame();

            });

            // Function to swap backgrounds and data-values between two divs
            function swapBackgroundsAndValues(div1, div2) {
                var bg1 = div1.css('background-image');
                var bg2 = div2.css('background-image');
                div1.css('background-image', bg2);
                div2.css('background-image', bg1);

                var val1 = div1.attr('data-value');
                var val2 = div2.attr('data-value');
                div1.attr('data-value', val2);
                div2.attr('data-value', val1);
            }

            // Event listener for div click to select for swapping
            $('.view-champ').click(function() {
                if (!allViewsSet) return; // Only allow swapping if all views are set

                var divId = $(this).attr('id');
                if (firstGroup.includes(divId) || secondGroup.includes(divId)) {
                    if (swapSelection) {
                        swapBackgroundsAndValues($('#' + swapSelection), $(this));
                        swapSelection = null;
                        $('.view-champ').removeClass('selected');
                    } else {
                        swapSelection = divId;
                        $(this).addClass('selected');
                    }
                }
            });

            // Function to get data-values of a group
            function getGroupValues(group) {
                var values = [];
                for (var i = 0; i < group.length; i++) {
                    var value = $('#' + group[i]).attr('data-value');
                    if (value) {
                        values.push(value);
                    }
                }
                return values;
            }

            // Event listener for getValues button
            function finalizaJogo() {
                if (allViewsSet) {
                    // adicionar algum efeito pra fazer de troca
                    // setTimeout(() => {
                        var firstGroupValues = getGroupValues(firstGroup);
                        var secondGroupValues = getGroupValues(secondGroup);

                        // console.log('First Group Values:', firstGroupValues);
                        // console.log('Second Group Values:', secondGroupValues);
                        // alert('TIME AZUL:' + firstGroupValues+'TIME VERMELHO:'+ secondGroupValues)
                        iniciarPartida(firstGroupValues,secondGroupValues)
                    // }, 10000);

                } else {
                    console.log('All views are not set yet.');
                }
            }

            // funcao pra chamar a rota de calcular partida
            function iniciarPartida(firstGroupValues,secondGroupValues){

                data = [firstGroupValues, secondGroupValues]
                console.log('chama o ajax')
                $.ajax({
                    url: "{{ route('calcula.resultado') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        data: data
                    },
                    success: function(response) {
                        console.log(response);
                        // Manipule a resposta aqui
                        // window.location.href = response.redirect_url;
                        modalEndGame();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Manipule o erro aqui
                    }
                });
            }

        });

// ******************************* teste nova versao ***********************************//

    function modalEndGame() {
        console.log('chamou a function')
        $('#endGameModal').modal('show');
    }

</script>
</html>