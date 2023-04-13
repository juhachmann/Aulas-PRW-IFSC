<?php

    // Vou usar type hints

    function is_the_answer(int $int): bool {
        /** 42 is the answer to all questions */
        if ($int == 42) {
            echo "<img src='https://i.pinimg.com/736x/48/95/e0/4895e0dc7015ef0dc45dba28b4d8bd91--poster-prints-art-posters.jpg' alt='So long and thanks for all the fishes'>";
            exit("");
        }
        else {
            return false;
        } 
    }


    function pprint(array $array) {
        return print("<pre>".print_r($array,true)."</pre>");
    }


    function exit_if_empty(array $array, string $key): bool {

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
        $average =  array_sum($nums) / count($nums);
        is_the_answer($average);
        return $average; // Já que é passado como array, estou usando as funções de array para pegar a média
    }


    function aprova($notaEst, $notaMin): bool {
        if ($notaEst >= $notaMin) {
            return true;
        }
        return false;
    }


    function value_in_range($value, $min=0, $max=130) {
        is_the_answer($value);
        if (( $value >= $min ) && ( $value <= $max )) {
            return true;
        }
        return false;
    }


    function can_vote (int $age, int $voteAge=16): bool {
        is_the_answer($age);
        if (( $age >= $voteAge )) {
            return true;
        }
        return false;
    }


    function to_celsius($temp) {
        is_the_answer($temp);
        return ($temp - 32) * 5 / 9;
    }


    function to_fahrenheit($temp) {
        is_the_answer($temp);
        return ($temp * 9 / 5) + 32;
    }

   
    function calcula_desconto_fidelidade ($valor) {
        return $valor * 0.05;
    }

    function calcula_comissao ($valor) {
        return $valor * 0.1;
    }

    function calcula_valor_final ($valor, $desconto) {
        return $valor - $desconto;
    }

    function imprime_relatorio ($valor, $fidelidade) {
        $comissao = calcula_comissao($valor);
        $desconto = 0;
        if ($fidelidade) {
            $desconto = calcula_desconto_fidelidade($valor);
        }
        $valorFinal = calcula_valor_final($valor, $desconto);
        
        echo "<p>Valor inicial da venda: R$ " . number_format($valor, 2, ',', '') . "<br>
              Percentual da comissão do vendedor (10%): R$ " . number_format($comissao, 2, ",", "") . "<br>
              Desconto do Cartão Fidelidade (5%): R$ " . number_format($desconto, 2, ",", "") . "<br>
              Valor Final da Compra: R$ " . number_format($valorFinal, 2, ",", "") . "</p>";
        
        return true;
    }

    function ponderada($array) {
        $somaKeys = 0;
        foreach($array as $key => $peso) {
            $somaKeys += ($key * $peso);
        }
        return $somaKeys / array_sum($array);
    }


?>