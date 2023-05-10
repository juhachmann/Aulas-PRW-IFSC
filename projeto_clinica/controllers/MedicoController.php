<?php

    use Validacao;
    use Fluxo;
    use Models\Medico;

    $request = json_encode($_POST);

    $request->crm = validarCRM($request->crm);
    $request->nome = validarNome($request->nome);
    $request->cpf = validarCPF($request->cpf);
    $request->telefone = validarTelefone($request->telefone);
    $request->endereco = validarEndereco($request->endereco);

    $medico = new Medico();
    $medico->inserirDados($request);
    $medico->salvar();

    return view();


    