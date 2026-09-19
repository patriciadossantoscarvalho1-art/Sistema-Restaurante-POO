<?php

class Cliente
{
    private string $nome;
    private string $cpf;
    private string $telefone;

    public function __construct(string $nome, string $cpf, string $telefone)
    {
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setTelefone($telefone);
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        if (trim($nome) === '') {
            throw new InvalidArgumentException(
                "O nome não pode ser vazio."
            );
        }

        $this->nome = $nome;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        if (trim($cpf) === '') {
            throw new InvalidArgumentException(
                "O CPF não pode ser vazio."
            );
        }

        $this->cpf = $cpf;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void
    {
        if (trim($telefone) === '') {
            throw new InvalidArgumentException(
                "O telefone não pode ser vazio."
            );
        }

        $this->telefone = $telefone;
    }

    public function exibirDados(): void
    {
        echo "Cliente: {$this->nome}<br>";
        echo "CPF: {$this->cpf}<br>";
        echo "Telefone: {$this->telefone}<br>";
    }
}
?>