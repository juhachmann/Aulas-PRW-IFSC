<?php

    namespace Fluxo;

    function view ($filename, $msg="", $jsonData) {
        $mensagem = $msg;
        $data = $jsonData;
        include $filename;
    }