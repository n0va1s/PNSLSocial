<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use PNSL\Social\Entity\PessoaEntity;
use PNSL\Social\Entity\MenorEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="responsavel")
 */
class ResponsavelEntity
{
    /** @ORM\Id @ORM\OneToOne(targetEntity="PessoaEntity")
     *  @ORM\JoinColumn(name="seq_pessoa", referencedColumnName="seq_pessoa", nullable=false) */
    private $pessoa;

    /** @ORM\Column(type="string", length=3, name="tip_parentesco") */
    private $parentesco;

    /** @ORM\Column(type="string", name="ind_empregado", columnDefinition="CHAR(1) NOT NULL", options={"default":"N"}) */
    private $empregado;

    /** @ORM\Column(type="string", name="ind_termo_imagem", columnDefinition="CHAR(1) NOT NULL", options={"default":"N"}) */
    private $autorizouImagem;

    /** @ORM\Column(type="string", name="ind_autorizou_sair_sozinho", columnDefinition="CHAR(1) NOT NULL", options={"default":"N"}) */
    private $autorizouSairSozinho;

    /** @ORM\OneToMany(targetEntity="MenorEntity", mappedBy="responsavel") */
    private $menores;

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
        $this->menores = new ArrayCollection();
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
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;

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
     * Get the value of menores
     */ 
    public function getMenores()
    {
        return $this->menores;
    }

    /**
     * Set the value of menores
     *
     * @return  self
     */ 
    public function setMenores($menores)
    {
        $this->menores = $menores;

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
