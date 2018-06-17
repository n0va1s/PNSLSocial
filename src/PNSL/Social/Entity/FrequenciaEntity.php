<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\TurmaEntity;
use PNSL\Social\Entity\PessoaEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="frequencia")
 */
class FrequenciaEntity
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer", name="seq_frequencia")
    */
    private $id;

    /** @ORM\Column(type="datetime", name="dat_frequencia", nullable=false) */
    private $data;

    /** @ORM\Column(type="string", name="ind_presenca", columnDefinition="CHAR(1) NOT NULL", options={"default":"F"}) */
    private $presenca;

    /** @ORM\Column(type="string", name="ind_inativo", columnDefinition="CHAR(1) NOT NULL", options={"default":"N"}) */
    private $inativo;

    /**
     * @ORM\ManyToOne(targetEntity="TurmaEntity", inversedBy="frequencias")
     * @ORM\JoinColumn(name="seq_turma", referencedColumnName="seq_turma")
     */
    private $turma;

    /**
     * @ORM\ManyToOne(targetEntity="PessoaEntity", inversedBy="turmas")
     * @ORM\JoinColumn(name="seq_atendido", referencedColumnName="seq_pessoa")
     */
    private $atendido;

    /** @ORM\Column(type="string", name="usu_inc", nullable=false) */
    private $usuarioInclusao;

    /** @ORM\Column(type="datetime", name="dat_inc", nullable=false) */
    private $dataInclusao;

    /** @ORM\Column(type="string", name="usu_alt", nullable=false) */
    private $usuarioAlteracao;

    /** @ORM\Column(type="datetime", name="dat_alt", nullable=false) */
    private $dataAlteracao;

    public function __construct()
    {
        $this->data = new \Datetime();
        $this->dataInclusao = new \Datetime();
        $this->dataAlteracao = new \Datetime();
    }

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
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the value of presenca
     */ 
    public function getPresenca()
    {
        return $this->presenca;
    }

    /**
     * Set the value of presenca
     *
     * @return  self
     */ 
    public function setPresenca($presenca)
    {
        $this->presenca = $presenca;

        return $this;
    }

    /**
     * Get the value of inativo
     */ 
    public function getInativo()
    {
        return $this->inativo;
    }

    /**
     * Set the value of inativo
     *
     * @return  self
     */ 
    public function setInativo($inativo)
    {
        $this->inativo = $inativo;

        return $this;
    }

    /**
     * Get the value of turma
     */ 
    public function getTurma()
    {
        return $this->turma;
    }

    /**
     * Set the value of turma
     *
     * @return  self
     */ 
    public function setTurma(Turma $turma)
    {
        $this->turma = $turma;

        return $this;
    }

    /**
     * Get the value of atendido
     */ 
    public function getAtendido()
    {
        return $this->atendido;
    }

    /**
     * Set the value of atendido
     *
     * @return  self
     */ 
    public function setAtendido(Pessoa $atendido)
    {
        $this->atendido = $atendido;

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