<?php

// include header.php
include('header.php');

// Page content
echo "<div class='container' style='padding-top: 100px!important;width: 70%;'>
    <div class='caixa-contactos row justify-content-center align-items-center'>
        <div class='map col-lg-6'>
            <!--— imagem de mail-->
            <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3043.9050676124452!2d-7.511171684772753!3d40.277858979381506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd3d239a23229d91%3A0xdc5055bacc929cec!2sUniversidade%20Beira%20Interior!5e0!3m2!1spt-PT!2spt!4v1650046501971!5m2!1spt-PT!2spt'
                    style='border:0;' allowfullscreen='' loading='lazy'
                    referrerpolicy='no-referrer-when-downgrade'></iframe>
        </div>
        <div class='form-container col-lg-6 col-10'>
            <form id='form'>
                <fieldset>
                    <legend>Contacte-nos</legend>
                    <input type='text' placeholder='Nome' class='caixa-texto-curta' form='form' required>
                    <br><br>
                    <input type='text' placeholder='Email' class='caixa-texto-curta' form='form' required>
                    <br><br>
                    <select form='form' class='caixa-texto-curta' required>
                        <option selected>Motivo:</option>
                        <option>Informações Adicionais</option>
                        <option>Proposta</option>
                        <option>Ajuda do Suporte</option>
                    </select>
                    <br><br>
                    <textarea placeholder='Mensagem' class='caixa-texto-longa' form='form'></textarea>
                    <br><br>
                    <input type='submit' class='botao-form' value='Submeter →' form='form'>
                </fieldset>
            </form>
        </div>
    </div>

    <div class='row white-box'></div>
</div>";

// include footer.php
include('footer.php');
?>
