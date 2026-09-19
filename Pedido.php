<?php

class Pedido
{
    private int $numero;
    private Cliente $cliente;

    /** @var Prato[] */
    private array $pratos;

    private string $status;

    public function __construct(int $numero, Cliente $cliente)
    {
        if ($numero <= 0) {
            throw new InvalidArgumentException(
                "O número do pedido deve ser positivo."
            );
        }

        $this->numero = $numero;
        $this->cliente = $cliente;
        $this->pratos = [];
        $this->status = "Em aberto";
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    /**
     * @return Prato[]
     */
    public function getPratos(): array
    {
        return $this->pratos;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function adicionarPrato(Prato $prato): void
    {
        $this->pratos[] = $prato;
    }

    public function alterarStatus(string $status): void
    {
        if (trim($status) === '') {
            throw new InvalidArgumentException(
                "O status não pode ser vazio."
            );
        }

        $this->status = $status;
    }

    public function calcularTotal(): float
    {
        $total = 0;

        foreach ($this->pratos as $prato) {
            $total += $prato->getPreco();
        }

        return $total;
    }

    public function exibirPedido(): void
    {
        echo "<h3>Pedido #{$this->numero}</h3>";

        echo "Cliente: "
            . $this->cliente->getNome()
            . "<br>";

        echo "Status: {$this->status}<br><br>";

        echo "<strong>Pratos:</strong><br>";

        foreach ($this->pratos as $prato) {
            echo "- {$prato->getNome()} - R$ "
                . number_format(
                    $prato->getPreco(),
                    2,
                    ',',
                    '.'
                )
                . "<br>";
        }

        echo "<br><strong>Total: R$ "
            . number_format(
                $this->calcularTotal(),
                2,
                ',',
                '.'
            )
            . "</strong><br>";
    }
}
?>