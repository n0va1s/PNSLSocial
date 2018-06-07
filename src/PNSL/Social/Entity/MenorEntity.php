<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\ResponsavelEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="menor")
 */
class MenorEntity
{
    /** @ORM\Id @ORM\Column(type="integer", name="seq_pessoa") */
    private $id;

    /** @ORM\OneToOne(targetEntity="PessoaEntity", mappedBy="menor", cascade={"persist", "remove"}) */
    private $pessoa;

    /** @ORM\OneToOne(targetEntity="ResponsavelEntity", mappedBy="menor") */
    private $responsavel;

    /** @ORM\Column(type="string", length=255, name="nom_escola") */
    private $escola;

    /** @ORM\Column(type="integer", length=4, name="num_ano") */
    private $ano;

    /** @ORM\Column(type="string", length=1, name="tip_turno") */
    private $turno;

    /** @ORM\Column(type="integer", length=1, name="tip_grau") */
    private $grau;

    /** @ORM\Column(type="string", length=1, name="ind_pode_sair_sozinho") */
    private $autorizadoSairSozinho;

    /** @ORM\OneToMany(targetEntity="AtendimentoEntity", mappedBy="menor") */
    private $atendimento;

    /** @ORM\OneToMany(targetEntity="TurmaEntity", mappedBy="menor") */
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
     * Get the value of responsavel
     */ 
    public function getResponsavel()
    {
        return $this->responsavel;
    }

    /**
     * Set the value of responsavel
     *
     * @return  self
     */ 
    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;

        return $this;
    }

    /**
     * Get the value of escola
     */ 
    public function getEscola()
    {
        return $this->escola;
    }

    /**
     * Set the value of escola
     *
     * @return  self
     */ 
    public function setEscola($escola)
    {
        $this->escola = $escola;

        return $this;
    }

    /**
     * Get the value of ano
     */ 
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set the value of ano
     *
     * @return  self
     */ 
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get the value of turno
     */ 
    public function getTurno()
    {
        return $this->turno;
    }

    /**
     * Set the value of turno
     *
     * @return  self
     */ 
    public function setTurno($turno)
    {
        $this->turno = $turno;

        return $this;
    }

    /**
     * Get the value of grau
     */ 
    public function getGrau()
    {
        return $this->grau;
    }

    /**
     * Set the value of grau
     *
     * @return  self
     */ 
    public function setGrau($grau)
    {
        $this->grau = $grau;

        return $this;
    }

    /**
     * Get the value of autorizadoSairSozinho
     */ 
    public function getAutorizadoSairSozinho()
    {
        return $this->autorizadoSairSozinho;
    }

    /**
     * Set the value of autorizadoSairSozinho
     *
     * @return  self
     */ 
    public function setAutorizadoSairSozinho($autorizadoSairSozinho)
    {
        $this->autorizadoSairSozinho = $autorizadoSairSozinho;

        return $this;
    }
}