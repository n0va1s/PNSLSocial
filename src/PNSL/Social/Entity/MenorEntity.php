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
    /** @ORM\Id @ORM\OneToOne(targetEntity="PessoaEntity")
     *  @ORM\JoinColumn(name="seq_pessoa", referencedColumnName="seq_pessoa", nullable=false, onDelete="CASCADE") */
    private $pessoa;
    
    /** @ORM\Column(type="string", length=255, name="nom_escola") */
    private $escola;

    /** @ORM\Column(type="integer", length=4, name="num_ano") */
    private $ano;

    /** @ORM\Column(type="string", name="tip_turno", columnDefinition="CHAR(1) NOT NULL") */
    private $turno;

    /** @ORM\Column(type="string", name="tip_grau", columnDefinition="CHAR(2) NOT NULL") */
    private $grau;

    /** @ORM\Column(type="string", name="ind_pode_sair_sozinho", columnDefinition="CHAR(1) NOT NULL", options={"default":"N"}) */
    private $autorizadoSairSozinho;

    /** @ORM\ManyToOne(targetEntity="ResponsavelEntity", inversedBy="menores")
     * @ORM\JoinColumn(name="seq_responsavel", referencedColumnName="seq_pessoa", nullable=false) */
    private $responsavel;

    /** @ORM\Column(type="string", length=50, name="usu_inc", nullable=false) */
    private $usuarioInclusao;

    /** @ORM\Column(type="datetime", name="dat_inc", nullable=false) */
    private $dataInclusao;

    /** @ORM\Column(type="string", length=50, name="usu_alt", nullable=false) */
    private $usuarioAlteracao;

    /** @ORM\Column(type="datetime", name="dat_alt", nullable=false) */
    private $dataAlteracao;

    public function __construct()
    {
        $this->dataInclusao = new \Datetime();
        $this->dataAlteracao = new \Datetime();
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
    public function setPessoa(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;

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
     * Get the value of usuarioInclusao
     */ 
    public function getUsuarioInclusao()
    {
        return $this->usuarioInclusao;
    }

    /**
     * Set the value of usuarioInclusao
     *
     * @return  self
     */ 
    public function setUsuarioInclusao($usuarioInclusao)
    {
        $this->usuarioInclusao = $usuarioInclusao;

        return $this;
    }

    /**
     * Get the value of dataInclusao
     */ 
    public function getDataInclusao()
    {
        return $this->dataInclusao;
    }

    /**
     * Get the value of usuarioAlteracao
     */ 
    public function getUsuarioAlteracao()
    {
        return $this->usuarioAlteracao;
    }

    /**
     * Set the value of usuarioAlteracao
     *
     * @return  self
     */ 
    public function setUsuarioAlteracao($usuarioAlteracao)
    {
        $this->usuarioAlteracao = $usuarioAlteracao;

        return $this;
    }

    /**
     * Get the value of dataAlteracao
     */ 
    public function getDataAlteracao()
    {
        return $this->dataAlteracao;
    }

}