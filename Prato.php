<?php

class Prato
{
    private string $nome;
    private float $preco;
    private string $descricao;

    public function __construct(
        string $nome,
        float $preco,
        string $descricao
    ) {
        $this->setNome($nome);
        $this->setPreco($preco);
        $this->setDescricao($descricao);
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        if (trim($nome) === '') {
            throw new InvalidArgumentException(
                "O nome do prato não pode ser vazio."
            );
        }

        $this->nome = $nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): void
    {
        if ($preco <= 0) {
            throw new InvalidArgumentException(
                "O preço deve ser maior que zero."
            );
        }

        $this->preco = $preco;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        if (trim($descricao) === '') {
            throw new InvalidArgumentException(
                "A descrição não pode ser vazia."
            );
        }

        $this->descricao = $descricao;
    }

    public function exibirDados(): void
    {
        echo "{$this->nome} - R$ "
            . number_format($this->preco, 2, ',', '.')
            . "<br>";

        echo "{$this->descricao}<br>";
    }
}
?>