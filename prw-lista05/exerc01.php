<?php

    include '../includes/lista05.inc.php';

    /* Comando e bibliotecas que eu aprendi aqui:
        - biblioteca mysqli
        new mysqli(params...) -> cria conexão ao banco de dados
        ->select_db('') seleciona base de dados
        ->query('') manda query SQL
        or die($conexao->error) finaliza e pega erro
        ->fetch_all() transforma objeto result_set em uma array


        Boas práticas... criar base de dados se não existir
        Criar tabela se não existir

        O que fazer em caso de erro e imprimir erros...


    */

    //pprint($_POST);


    /*
    Passos a seguir:
        1 - conectar ao banco de dados
        2 - Pegar dados do formulário e tratar eles
        3 - Salvar Dados no banco de dados
        4 - Fazer query
        5 - Tratar os dados da query 
        6 - Apresentar em formato tabular
        7 - Apresentar o nº de aprovados
        8 - Fechar conexão com banco de dados

    */


    $values = "";
    foreach($_POST as $key => $value) {
        $values .= $value;
        if ($key != array_key_last($_POST)) {
            $values .= ", ";
        }
    }
    //print($values);

    $matricula = $_POST['matricula'];
    $nome = $_POST['name'];
    $media = $_POST['media'];


    $conexao = new mysqli('localhost', 'root', '');
    
    $sql = 'CREATE DATABASE IF NOT EXISTS prw';
    $resultado = $conexao->query($sql) or die($conexao->error);
    //print($resultado); (1)
    
    $conexao->select_db('prw');
    
    $sql = 'CREATE TABLE IF NOT EXISTS media_alunos (
        id varchar(100) unique not null,
        nome varchar(150),
        media float,
        PRIMARY KEY (id)
    );';
    $resultado = $conexao->query($sql) or die($conexao->error);
    //print($resultado); (1)

    $sql = "INSERT INTO media_alunos VALUES ('$matricula', '$nome', $media);";
    // Para iterar, a princípio, teria que criar um foreach e ir concatenando.. cuidando por causa das aspas ainda.. seria um saco na vdd..
    // Por isso a ideia de modelos é bem melhor msm
    //print($sql);
    $resultado = $conexao->query($sql) or die($conexao->error);
    //print($resultado); 



    // Agora... vamos pegar os dados e exibir no formato TABULAR

    $sql = "SELECT * FROM media_alunos";
    $resultado = $conexao->query($sql) or die($conexao->error);
    $resultArray = $resultado->fetch_all(MYSQLI_ASSOC); // Foi!
    //pprint($resultArray); 

/* 
    Array
(
    [0] => Array
        (
            [id] => 041
            [nome] => Ju
            [media] => 6
        )

    [1] => Array
        (
            [id] => 042
            [nome] => Paulo
            [media] => 10
        )

    [2] => Array
        (
            [id] => 043
            [nome] => André
            [media] => 9.5
        )

)
*/
    echo "<table>
            <tr>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Média Final</th>
            </tr>";
    foreach($resultArray as $student) {
        echo "<tr>";
        foreach($student as $data) {
            echo "<td>$data</td>";
        }
        echo "</tr>";
    }

    // Usando outra query no banco de dados
    // Mas não precisava, pois já tenho estes dados
    // O melhor seria apenas usar a lógica com a array que já peguei

    $sql = "SELECT * FROM media_alunos WHERE (media >= 6);";
    $resultado = $conexao->query($sql) or die($conexao->error);
    $resultArray = $resultado->fetch_all(); 

    echo "<tr>
            <td colspan='3'>Total de Alunos aprovados: " . count($resultArray) . "</td>
          </tr>
        </table>";

    // Observação: talvez criar a tabela assim quebrada tbm não seja a melhor das ideias, mas é só pra ver como fica desta forma


    $conexao->close();  //fecha conexão, sempre usar!


?>