<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\AcaoEntity;
use PNSL\Social\Entity\PessoaEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="voluntario")
 */
class VoluntarioEntity
{
     /** @ORM\Id @ORM\OneToOne(targetEntity="PessoaEntity")
     *  @ORM\JoinColumn(name="seq_pessoa", referencedColumnName="seq_pessoa", nullable=false) */
    private $pessoa;
    
    /** @ORM\Column(type="string", length=255, name="nom_profissao") */
    private $profissao;

    /** @ORM\Column(type="string", name="tip_estado_civil", columnDefinition="CHAR(1) NOT NULL") */
    private $estadoCivil;

    /** @ORM\Column(type="string", name="ind_assinou_termo", columnDefinition="CHAR(1) NOT NULL", options={"default":"N"}) */
    private $assinouTermo;

    /** @ORM\OneToMany(targetEntity="AcaoEntity", mappedBy="voluntario") */
    private $acao;
    

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
    public function setPessoa(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;

        return $this;
    }

    /**
     * Get the value of profissao
     */ 
    public function getProfissao()
    {
        return $this->profissao;
    }

    /**
     * Set the value of profissao
     *
     * @return  self
     */ 
    public function setProfissao($profissao)
    {
        $this->profissao = $profissao;

        return $this;
    }

    /**
     * Get the value of estadoCivil
     */ 
    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    /**
     * Set the value of estadoCivil
     *
     * @return  self
     */ 
    public function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;

        return $this;
    }

    /**
     * Get the value of assinouTermo
     */ 
    public function getAssinouTermo()
    {
        return $this->assinouTermo;
    }

    /**
     * Set the value of assinouTermo
     *
     * @return  self
     */ 
    public function setAssinouTermo($assinouTermo)
    {
        $this->assinouTermo = $assinouTermo;

        return $this;
    }

    /**
     * Get the value of acao
     */ 
    public function getAcao()
    {
        return $this->acao;
    }

    /**
     * Set the value of acao
     *
     * @return  self
     */ 
    public function setAcao(Acao $acao)
    {
        $this->acao = $acao;

        return $this;
    }
}