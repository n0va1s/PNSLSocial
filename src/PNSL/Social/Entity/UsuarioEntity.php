<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class UsuarioEntity
{
    /** @ORM\Id @ORM\OneToOne(targetEntity="PessoaEntity")
     *  @ORM\JoinColumn(name="seq_pessoa", referencedColumnName="seq_pessoa", nullable=false, onDelete="CASCADE") */
    private $pessoa;

    /** @ORM\Column(type="string", name="nom_usuario", length=50, unique=true, nullable=false) */
    private $nome;

    /** @ORM\Column(type="string", name="pwd_usuario", length=100, nullable=false) */
    private $senha;

    /** @ORM\Column(type="datetime", name="dat_criacao") */
    private $dataCriacao;

    /** @ORM\Column(type="datetime", name="dat_atualizacao") */
    private $dataAtualizacao;

    public function __construct()
    {
        $this->dataCriacao = new \Datetime();
        $this->dataAtualizacao = new \Datetime();
    }

    /**
     * Get the value of pessoa
     */ 
    public function getPessoa()
    {
        return $this->pessoa;
    }

    /**
     * Set the value of pessoa
     *
     * @return  self
     */ 
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of dataCriacao
     */ 
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    /**
     * Get the value of dataAtualizacao
     */ 
    public function getDataAtualizacao()
    {
        return $this->dataAtualizacao;
    }

    /**
     * Set the value of dataAtualizacao
     *
     * @return  self
     */ 
}