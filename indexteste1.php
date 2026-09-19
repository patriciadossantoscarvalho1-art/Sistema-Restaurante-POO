<?php

require_once "Cliente.php";
require_once "Prato.php";
require_once "Pedido.php";
require_once "Restaurante.php";

echo "<h1>Sistema de Restaurante</h1>";

try {

    // ==========================================
    // 1. CRIAÇÃO DE OBJETOS
    // ==========================================

    echo "<h2>1. Criando objetos</h2>";

    // Objeto Restaurante
    $restaurante = new Restaurante(
        "Restaurante Sabor Caseiro",
        "Rua Principal, 100"
    );

    // Objetos Cliente
    $cliente1 = new Cliente(
        "João Silva",
        "123.456.789-00",
        "(55) 99999-9999"
    );

    $cliente2 = new Cliente(
        "Maria Souza",
        "987.654.321-00",
        "(55) 98888-8888"
    );

    // Objetos Prato
    $prato1 = new Prato(
        "X-Burger",
        25.00,
        "Hambúrguer com queijo, alface e tomate"
    );

    $prato2 = new Prato(
        "Batata Frita",
        15.00,
        "Porção de batatas fritas"
    );

    $prato3 = new Prato(
        "Refrigerante",
        7.00,
        "Refrigerante lata"
    );

    $prato4 = new Prato(
        "Pizza",
        40.00,
        "Pizza de queijo"
    );

    echo "Objetos criados com sucesso!<br>";


    // ==========================================
    // 2. EXECUTANDO MÉTODOS
    // ==========================================

    echo "<h2>2. Executando métodos</h2>";

    // Exibindo dados do cliente
    echo "<h3>Dados do Cliente 1:</h3>";
    $cliente1->exibirDados();

    echo "<br>";

    // Alterando o telefone através do setter
    $cliente1->setTelefone("(55) 97777-7777");

    echo "Telefone atualizado: "
        . $cliente1->getTelefone()
        . "<br>";

    echo "<br>";


    // ==========================================
    // 3. CRIANDO PEDIDOS
    // ==========================================

    echo "<h2>3. Criando pedidos</h2>";

    // Pedido do cliente 1
    $pedido1 = new Pedido(1, $cliente1);

    // Adicionando pratos ao pedido
    $pedido1->adicionarPrato($prato1);
    $pedido1->adicionarPrato($prato2);
    $pedido1->adicionarPrato($prato3);

    // Alterando o status
    $pedido1->alterarStatus("Preparando");

    // Adicionando pedido ao restaurante
    $restaurante->adicionarPedido($pedido1);


    // Pedido do cliente 2
    $pedido2 = new Pedido(2, $cliente2);

    $pedido2->adicionarPrato($prato4);
    $pedido2->adicionarPrato($prato3);

    $pedido2->alterarStatus("Em entrega");

    $restaurante->adicionarPedido($pedido2);

    echo "Dois pedidos foram criados com sucesso!<br>";


    // ==========================================
    // 4. TESTE DE SITUAÇÃO VÁLIDA
    // ==========================================

    echo "<h2>4. Teste de situação válida</h2>";

    try {

        // Criando um prato com preço válido
        $pratoValido = new Prato(
            "Hambúrguer Especial",
            35.00,
            "Hambúrguer artesanal com queijo"
        );

        echo "Teste válido: prato criado corretamente.<br>";
        echo "Nome: " . $pratoValido->getNome() . "<br>";
        echo "Preço: R$ "
            . number_format(
                $pratoValido->getPreco(),
                2,
                ',',
                '.'
            )
            . "<br>";

    } catch (InvalidArgumentException $erro) {

        echo "Erro no teste válido: "
            . $erro->getMessage()
            . "<br>";
    }


    // ==========================================
    // 5. TESTE DE SITUAÇÃO INVÁLIDA
    // ==========================================

    echo "<h2>5. Teste de situação inválida</h2>";

    try {

        // Tentando criar um prato com preço inválido
        $pratoInvalido = new Prato(
            "Prato com erro",
            -10.00,
            "Este prato possui preço inválido"
        );

        echo "Teste inválido não detectou o erro.<br>";

    } catch (InvalidArgumentException $erro) {

        echo "Teste inválido realizado com sucesso!<br>";
        echo "Erro detectado: "
            . $erro->getMessage()
            . "<br>";
    }


    // ==========================================
    // 6. OUTRO TESTE INVÁLIDO
    // ==========================================

    echo "<h2>6. Segundo teste de situação inválida</h2>";

    try {

        // Tentando criar cliente sem nome
        $clienteInvalido = new Cliente(
            "",
            "111.222.333-44",
            "(55) 96666-6666"
        );

        echo "Teste inválido não detectou o erro.<br>";

    } catch (InvalidArgumentException $erro) {

        echo "Erro detectado corretamente!<br>";
        echo "Mensagem: "
            . $erro->getMessage()
            . "<br>";
    }


    // ==========================================
    // 7. EXIBINDO OS PEDIDOS
    // ==========================================

    echo "<h2>7. Pedidos cadastrados</h2>";

    $restaurante->listarPedidos();


    // ==========================================
    // 8. TESTANDO O CÁLCULO DO TOTAL
    // ==========================================

    echo "<h2>8. Teste do cálculo do pedido</h2>";

    echo "Total do Pedido 1: R$ "
        . number_format(
            $pedido1->calcularTotal(),
            2,
            ',',
            '.'
        )
        . "<br>";

    echo "Total do Pedido 2: R$ "
        . number_format(
            $pedido2->calcularTotal(),
            2,
            ',',
            '.'
        )
        . "<br>";


} catch (InvalidArgumentException $erro) {

    echo "<h2>Erro no sistema</h2>";
    echo $erro->getMessage();
}
?>