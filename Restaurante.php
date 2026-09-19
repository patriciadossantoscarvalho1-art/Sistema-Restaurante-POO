<?php

class Restaurante
{
    private string $nome;
    private string $endereco;

    /** @var Pedido[] */
    private array $pedidos;

    public function __construct(string $nome, string $endereco)
    {
        if (trim($nome) === '') {
            throw new InvalidArgumentException(
                "O nome do restaurante não pode ser vazio."
            );
        }

        if (trim($endereco) === '') {
            throw new InvalidArgumentException(
                "O endereço não pode ser vazio."
            );
        }

        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->pedidos = [];
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function adicionarPedido(Pedido $pedido): void
    {
        $this->pedidos[] = $pedido;
    }

    public function listarPedidos(): void
    {
        echo "<h2>{$this->nome}</h2>";
        echo "Endereço: {$this->endereco}<br><br>";

        if (count($this->pedidos) === 0) {
            echo "Nenhum pedido cadastrado.";
            return;
        }

        foreach ($this->pedidos as $pedido) {
            $pedido->exibirPedido();
            echo "<hr>";
        }
    }
}
?>