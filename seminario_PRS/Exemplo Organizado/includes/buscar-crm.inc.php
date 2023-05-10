<?php

    // que zona que eu fiz =O
    // não ficou legal isso aqui, muito parâmetro passando pra lá e pra cá
    // fazer o criar query
    // o checar médico
    // tabular resultados

    function criarQuery($request, $tabelaMedicos, $tabelaPacientes) {
        $where = "";
        $texto = "";
    
        if (!empty($request['busca-medico'])) {
            $nomeMedico = $request['busca-medico'];
            $where .= "WHERE $tabelaMedicos.nome = '$nomeMedico'";
            $texto .= "<br>Pelo médico: $nomeMedico";
        }
        
        if (!empty($request['busca-data'])) {
            $data = $request['busca-data'];
            $where .= " AND $tabelaPacientes.data_consulta >= '$data' ";
            $dataFormatada = new Datetime($data);
            $dataFormatada = $dataFormatada->format('d/m/y');
            $texto .= "<br>Após a data: $dataFormatada";
        }
    
        $sql = "SELECT id, $tabelaPacientes.nome as Paciente, $tabelaMedicos.nome as Medico, data_consulta 
                    FROM $tabelaPacientes 
                    JOIN $tabelaMedicos 
                    ON $tabelaPacientes.crm_medico = $tabelaMedicos.crm 
                    $where 
                    ORDER BY id";
        
        return $sql;
    }


    function medicoExiste($nomeDoMedico, $conexaoMySql, $nomeDaTabela) {
        $sql = "SELECT * FROM $nomeDaTabela WHERE nome = '$nomeDoMedico'";
        $resposta = $conexaoMySql->query($sql) or die($conexaoMySql->error);
        $registros = $conexaoMySql->affected_rows;
        if ($registros > 0) {
            return true;
        }
        return false;
    }


    function tabularResultados($data) {
        echo "<table>
        <tr>
            <th>Id</th>
            <th>Nome do Paciente</th>
            <th>Nome do Médico</th>
            <th>Data da Consulta</th>
        </tr>";

        while($registro = $data->fetch_array(MYSQLI_ASSOC)) { 
            echo "<tr>";
            foreach ($registro as $dado) {
                $dadoValidado = htmlentities($dado, ENT_QUOTES);
                echo "<td>$dadoValidado</td>";
            }
            echo "</tr>";
        }

        echo "</table>";  
    }




    // ISSO AQUI NÃO TÀ FUNCIONANDO!!!! POR QUÊ?????
    if (isset($request['busca-medico'])) {
        
        if (!medicoExiste($request['busca-medico'], $conexaoMySql, $tabelaMedicos)) {
            exit("<p>Médico não cadastrado em nosso sistema</p>");
        }

    }

    $sql = criarQuery($_POST, $tabelaMedicos, $tabelaPacientes);

    $resultado = $conexao->query($sql) or exit($conexao->error);

    $registros = $conexao->affected_rows;
    
    //echo "<p>Consultas Realizadas na Clínica $texto <br>Total = $registros consultas</p>";

    echo "<p>Consultas Realizadas na Clínica <br>Total = $registros consultas</p>";

    if($registros > 0) {
        tabularResultados($resultado);    
    }









