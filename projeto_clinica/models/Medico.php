<?php

    namespace Models\Medico;

    use Connect;


    class Medico {

        public $crm;
        public $nome;
        public $cpf;
        public $telefone;
        public $endereco;


        function inserirDados ($request) {
            $this->crm = $request->crm;
            $this->nome = $request->nome;
            $this->cpf = $request->cpf;
            $this->telefone = $request->telefone;
            $this->endereco = $request->endereco;        
        }


        function salvar () {
            $conexao = conectar();
            $tabela = criarTabela();
            $stmt = $conexao->prepare("INSERT INTO $tabela VALUES (null, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $crm, $nome, $cpf, $telefone, $endereco);
            $crm = $this->crm;
            $nome = $this->nome;
            $cpf = $this->cpf;
            $telefone = $this->telefone;
            $endereco = $this->endereco;
            $stmt->execute();
            $stmt->close();
            $conexao->close();
        }


        function atualizar () {

        }


        function deletar () {

        }


        function criarTabela () {
            $conexao = new mysqli (SERVIDOR, USUARIO, SENHA, BANCO_DE_DADOS);
            $tabela = "medicos";
            $sql = "CREATE TABLE IF NOT EXISTS $tabela (
                        id INT NOT NULL UNIQUE AUTO_INCREMENT,
                        crm VARCHAR(50) NOT NULL UNIQUE,
                        nome VARCHAR(150) NOT NULL,
                        cpf VARCHAR(15) NOT NULL,
                        telefone VARHAR(25) NOT NULL,
                        endereco VARCHAR(150) NOT NULL,
                        PRIMARY KEY (id)
                        )
                        ENGINE = $ENGINE";
            $conexao->query($sql) or die($conexao->error);
            $conexao->close();
            return $tabela;
        }



        




    }