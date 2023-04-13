<?php

    function ponderada ($arrayNotas) {
        return ( ($arrayNotas[0] * 5) + ($arrayNotas[1] * 3) + ($arrayNotas[2] * 2) ) / 10;
    }

    function aritmetica($arrayNotas) {
        return array_sum($arrayNotas) / count($arrayNotas);
    }