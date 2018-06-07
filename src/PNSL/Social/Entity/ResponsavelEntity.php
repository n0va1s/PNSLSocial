<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\PessoaEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="responsavel")
 */
class ResponsavelEntity
{
    /** @ORM\Column(type="integer", name="seq_pessoa") */
    private $id;
    
    /** @ORM\Id @ORM\OneToOne(targetEntity="PessoaEntity", inversedBy="responsavel") 
     * @ORM\JoinColumn(name="seq_pessoa", referencedColumnName="seq_pessoa") */
    private $pessoa;

    /** @ORM\OneToMany(targetEntity="MenorEntity", mappedBy="pessoa", cascade={"ALL"}) */
    private $menor;

    /** @ORM\Column(type="string", length=3, name="tip_parentesco") */
    private $parentesco;

    /** @ORM\Column(type="string", length=1, name="ind_empregado") */
    private $empregado;

    /** @ORM\Column(type="string", length=1, name="ind_termo_imagem") */
    private $autorizouImagem;

    /** @ORM\Column(type="string", length=1, name="ind_autorizou_sair_sozinho") */
    private $autorizouSairSozinho;

    /** @ORM\OneToMany(targetEntity="AtendimentoEntity", mappedBy="responsavel") */
    private $atendimento;

    /** @ORM\OneToMany(targetEntity="TurmaEntity", mappedBy="responsavel") */
    private $turma;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Get the value of menor
     */ 
    public function getMenor()
    {
        return $this->menor;
    }

    /**
     * Set the value of menor
     *
     * @return  self
     */ 
    public function setMenor($menor)
    {
        $this->menor = $menor;

        return $this;
    }

    /**
     * Get the value of parentesco
     */ 
    public function getParentesco()
    {
        return $this->parentesco;
    }

    /**
     * Set the value of parentesco
     *
     * @return  self
     */ 
    public function setParentesco($parentesco)
    {
        $this->parentesco = $parentesco;

        return $this;
    }

    /**
     * Get the value of empregado
     */ 
    public function getEmpregado()
    {
        return $this->empregado;
    }

    /**
     * Set the value of empregado
     *
     * @return  self
     */ 
    public function setEmpregado($empregado)
    {
        $this->empregado = $empregado;

        return $this;
    }

    /**
     * Get the value of autorizouImagem
     */ 
    public function getAutorizouImagem()
    {
        return $this->autorizouImagem;
    }

    /**
     * Set the value of autorizouImagem
     *
     * @return  self
     */ 
    public function setAutorizouImagem($autorizouImagem)
    {
        $this->autorizouImagem = $autorizouImagem;

        return $this;
    }

    /**
     * Get the value of autorizouSairSozinho
     */ 
    public function getAutorizouSairSozinho()
    {
        return $this->autorizouSairSozinho;
    }

    /**
     * Set the value of autorizouSairSozinho
     *
     * @return  self
     */ 
    public function setAutorizouSairSozinho($autorizouSairSozinho)
    {
        $this->autorizouSairSozinho = $autorizouSairSozinho;

        return $this;
    }

}
