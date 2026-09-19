<?php

require_once "Cliente.php";
require_once "Prato.php";
require_once "Pedido.php";
require_once "Restaurante.php";

try {

    // Criando um objeto Restaurante
    $restaurante = new Restaurante(
        "Restaurante Sabor Caseiro",
        "Rua Principal, 100"
    );

    // Criando um objeto Cliente
    $cliente = new Cliente(
        "João Silva",
        "123.456.789-00",
        "(55) 99999-9999"
    );

    // Criando objetos Prato
    $prato1 = new Prato(
        "X-Burger",
        25.00,
        "Hambúrguer, queijo, alface e tomate"
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

    // Criando um Pedido relacionado ao Cliente
    $pedido = new Pedido(1, $cliente);

    // Adicionando os pratos ao pedido
    $pedido->adicionarPrato($prato1);
    $pedido->adicionarPrato($prato2);
    $pedido->adicionarPrato($prato3);

    // Alterando o status do pedido
    $pedido->alterarStatus("Preparando");

    // Adicionando o pedido ao restaurante
    $restaurante->adicionarPedido($pedido);

    // Exibindo os dados
    echo "<h2>Dados do Cliente</h2>";

    $cliente->exibirDados();

    echo "<hr>";

    // Listando os pedidos
    $restaurante->listarPedidos();

} catch (InvalidArgumentException $erro) {

    echo "Erro: " . $erro->getMessage();
}
?>