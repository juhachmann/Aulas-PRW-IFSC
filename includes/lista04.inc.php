<?php


    function is_the_answer($int) {
        if ($int == 42) {
            echo "<img src='https://i.pinimg.com/736x/48/95/e0/4895e0dc7015ef0dc45dba28b4d8bd91--poster-prints-art-posters.jpg' alt='So long and thanks for all the fishes'>";
            exit("");
        }
        else {
            return false;
        } 
    }


    function pprint($array) {
        return print("<pre>".print_r($array,true)."</pre>");
    }


    function empty_form($array, $key) {

        if (isset($array[$key])) {
        
            if (empty($array[$key])) {
                exit("<p class='err'>Você esqueceu de preencher o campo '$key' no formulário de envio! <br>Favor voltar e preencher novamente</p>");
            }
            else {
                return false;
            }

        }
        else {
            exit("<p class='err'>Houve um erro no formulário. O desenvolvedor não adicionou o campo '$key' corretamente OU você esqueceu de preencher um campo obrigatório. <br>Favor voltar e tentar novamente</p>");
        }

    }


    function average(...$nums) { // Usa ... para número de argumentos indefinido. É passado como array
        return array_sum($nums) / count($nums); // Já que é passado como array, estou usando as funções de array para pegar a média
    }


    function aprova($notaEst, $notaMin) {
        if ($notaEst >= $notaMin) {
            return true;
        }
        return false;
    }


    function value_in_range($value, $min=0, $max=130) {
        if (( $value >= $min ) && ( $value <= $max )) {
            return true;
        }
        return false;
    }


    function can_vote ($age, $voteAge=16) {
        if (( $age >= $voteAge )) {
            return true;
        }
        return false;
    }



?>