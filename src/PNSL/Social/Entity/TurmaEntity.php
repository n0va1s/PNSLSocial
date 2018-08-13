<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\AcaoEntity;
use PNSL\Social\Entity\VoluntarioEntity;
use PNSL\Social\Entity\PessoaEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="turma")
 */
class TurmaEntity
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer", name="seq_turma")
    */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AcaoEntity", inversedBy="turma")
     * @ORM\JoinColumn(name="seq_acao", referencedColumnName="seq_acao")
     */
    private $acao;

    /**
     * @ORM\ManyToOne(targetEntity="PessoaEntity", inversedBy="turma")
     * @ORM\JoinColumn(name="seq_pessoa", referencedColumnName="seq_pessoa")
     */
    private $pessoa;

    /** @ORM\Column(type="string", name="tip_situacao", columnDefinition="CHAR(1) NOT NULL") */
    private $situacao;

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
    public function setAcao($acao)
    {
        $this->acao = $acao;

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
     * Get the value of situacao
     */ 
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * Set the value of situacao
     *
     * @return  self
     */ 
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;

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