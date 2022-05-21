<?php
// include header.php
include('header.php');

echo " <div class='container' style='padding-top: 100px!important;'>
    <div class='row'>
        <div class='col justify-content-md-center'
             style='margin-bottom:50px;display: flex;justify-content: space-around;'>
            <img src='Imagens/faq-header.png' alt='faq-header' width='430' height='207'>
        </div>
    </div>
    <div class='row'>
        <div class='accordion' id='accordionExample'>
            <div class='accordion-item'>
                <h2 class='accordion-header' id='headingOne'>
                    <button class='accordion-button' type='button' data-bs-toggle='collapse'
                            data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                        Posso imprimir os questionários?
</button>
                </h2>
                <div id='collapseOne' class='accordion-collapse collapse show' aria-labelledby='headingOne'
                     data-bs-parent='#accordionExample'>
                    <div class='accordion-body'>
                        <strong>Sim</strong>, é possível imprimir qualquer um dos questionários individuais. 
                        Os questionários impressos fazem o entretenimento ideal em viagens longas, 
                        reuniões familiares e alturas em que um computador não está à mão. 
                        E o tempo todo, os alunos consolidam a sua aprendizagem escolar!
                    </div>
                </div>
            </div>
            <div class='accordion-item'>
                <h2 class='accordion-header' id='headingTwo'>
                    <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse'
                            data-bs-target='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
    Os Quizzes estão protegidos por direitos de autor?
</button>
                </h2>
                <div id='collapseTwo' class='accordion-collapse collapse' aria-labelledby='headingTwo'
                     data-bs-parent='#accordionExample'>
                    <div class='accordion-body'>
                        <strong>Sim</strong>, todos os nossos questionários estão sujeitos a restrições de direitos de autor, 
                        mas permitimos aos nossos subscritores imprimir os questionários; desde que sejam reproduzidos na 
                        forma precisa que o nosso ‘software’ gera (cada folha deve mostrar os detalhes dos questionários educativos no final do questionário). 
                        A utilização de qualquer um dos materiais sem mostrar os detalhes dos Testes de Educação é uma violação dos nossos direitos de autor. 
                        Serão tomadas medidas legais contra qualquer escola que utilize os questionários sem a nossa autorização expressa. 
                        Afinal de contas, temos de ganhar a vida!
                    </div>
                </div>
            </div>
            <div class='accordion-item'>
                <h2 class='accordion-header' id='headingThree'>
                    <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse'
                            data-bs-target='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>
    Como seleciono um Quiz para jogar?
</button>
                </h2>
                <div id='collapseThree' class='accordion-collapse collapse' aria-labelledby='headingThree'
                     data-bs-parent='#accordionExample'>
                    <div class='accordion-body'>
                        Quando clicar numa categoria de quiz, 
                        aparecerá outra página que mostra os títulos do quiz - clique no botão 'Jogar' ao 
                        lado do quiz específico que deseja jogar
                    </div>
                </div>
            </div>
            <div class='accordion-item'>
                <h2 class='accordion-header' id='headingThree'>
                    <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse'
                            data-bs-target='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>
    PERGUNTA 4
</button>
                </h2>
                <div id='collapseThree' class='accordion-collapse collapse' aria-labelledby='headingThree'
                     data-bs-parent='#accordionExample'>
                    <div class='accordion-body'>
                        Quando clicar numa categoria de quiz, 
                        aparecerá outra página que mostra os títulos do quiz - clique no botão 'Jogar' ao 
                        lado do quiz específico que deseja jogar
                    </div>
                </div>
            </div>
            <div class='accordion-item'>
                <h2 class='accordion-header' id='headingThree'>
                    <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse'
                            data-bs-target='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>
    PERGUNTA 5
</button>
                </h2>
                <div id='collapseThree' class='accordion-collapse collapse' aria-labelledby='headingThree'
                     data-bs-parent='#accordionExample'>
                    <div class='accordion-body'>
                        Quando clicar numa categoria de quiz, 
                        aparecerá outra página que mostra os títulos do quiz - clique no botão 'Jogar' ao 
                        lado do quiz específico que deseja jogar
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='row white-box'></div>
</div> ";

// include footer.php
include('footer.php');
?>
