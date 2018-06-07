<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\PessoaEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="voluntario")
 */
class VoluntarioEntity
{
    /** @ORM\Id @ORM\Column(type="integer", name="seq_pessoa") */
    private $id;

    /** @ORM\OneToOne(targetEntity="PessoaEntity", mappedBy="voluntario", cascade={"persist", "remove"}) */
    private $pessoa;

    /** @ORM\OneToMany(targetEntity="AcaoEntity", mappedBy="voluntario") */
    private $acao;

    /** @ORM\Column(type="string", length=255, name="nom_profissao") */
    private $profissao;

    /** @ORM\Column(type="string", length=1, name="tip_estado_civil") */
    private $estadoCivil;

    /** @ORM\Column(type="string", length=1, name="ind_assinou_termo") */
    private $assinouTermo;

    /** @ORM\OneToMany(targetEntity="AtendimentoEntity", mappedBy="voluntario") */
    private $atendimento;

    /** @ORM\OneToMany(targetEntity="TurmaEntity", mappedBy="voluntario") */
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
}