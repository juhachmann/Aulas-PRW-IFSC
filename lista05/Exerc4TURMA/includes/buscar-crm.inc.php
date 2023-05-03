<?php

    // que zona que eu fiz =O

    $where = "";
    $texto = "";

    if (!empty($_POST['busca-medico'])) {
        $nomeMedico = $_POST['busca-medico'];
        $where .= "WHERE $tabelaMedicos.nome = '$nomeMedico'";
        $texto .= "<br>Pelo médico: $nomeMedico";
    }
    
    // se tem data, vai selecionar só os pacientes após aquela data
    if (!empty($_POST['busca-data'])) {
        $data = $_POST['busca-data'];
        $where .= " AND $tabelaPacientes.data_consulta > '$data' ";
        $dataFormatada = new Datetime($data);
        $dataFormatada = $dataFormatada->format('d/m/y');
        $texto .= "<br>Após a data: $dataFormatada";
    }

    $sql = "SELECT id, $tabelaPacientes.nome, data_consulta 
            FROM $tabelaPacientes 
                JOIN $tabelaMedicos 
                ON $tabelaPacientes.crm_medico = $tabelaMedicos.crm 
                $where 
                ORDER BY id";

    $resultado = $conexao->query($sql) or exit($conexao->error);

    // var_dump($resultado);
    // var_dump($resultado->current_field);

    // Checar se a tabela existe e se está vazia
    $registros = $conexao->affected_rows;


    echo "<p>Consultas Realizadas na Clínica $texto <br>Total = $registros consultas</p>";

    if($registros > 0) {

        echo "<table>
                <tr>
                    <th>Id</th>
                    <th>Nome do Paciente</th>
                    <th>Data da Consulta</th>
                </tr>";

        while($registro = $resultado->fetch_array(MYSQLI_ASSOC)) {
            // amei essa lógica <3, nunca tinha usado
            // Só que o fetch_array me dá os dados duplicados, com chave associativa E chave numérica...
            // Então deve ter o argumento pra passar igual em fetch_all()
            // var_dump($registro);


            // Filtrar e sanitizar quando puxa do banco de dados também? Sim, pq dados podem ter sido 


            echo "<tr>";
            foreach ($registro as $dado) {
                $dadoValidado = htmlentities($dado, ENT_QUOTES);
                echo "<td>$dadoValidado</td>";
            }
            echo "</tr>";
        }

        echo "</table>";    

    }





