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
     /** 
     * @ORM\Id 
     * @ORM\OneToOne(targetEntity="PessoaEntity", inversedBy="voluntario")
     * @ORM\JoinColumn(name="seq_pessoa", referencedColumnName="seq_pessoa", nullable=false) */
    private $pessoa;
    
     /** @ORM\Column(type="text", name="txt_conhecimento", nullable=true) */
     private $conhecimento;

    /** @ORM\Column(type="string", name="ind_assinou_termo", columnDefinition="CHAR(1) NOT NULL", options={"default":"N"}) */
    private $assinouTermo;

    /** @ORM\OneToMany(targetEntity="AcaoEntity", mappedBy="voluntario") */
    private $acao;

    /** @ORM\Column(type="string", length=50, name="usu_inc", nullable=false) */
    private $usuarioInclusao;

    /** @ORM\Column(type="datetime", name="dat_inc", nullable=false) */
    private $dataInclusao;

    /** @ORM\Column(type="string", length=50, name="usu_alt", nullable=false) */
    private $usuarioAlteracao;

    /** @ORM\Column(type="datetime", name="dat_alt", nullable=false) */
    private $dataAlteracao;

    /** @ORM\Column(type="string", length=50, name="usu_exc", nullable=true) */
    private $usuarioExclusao;

    /** @ORM\Column(type="datetime", name="dat_exc", nullable=true) */
    private $dataExclusao;

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
    public function setPessoa(PessoaEntity $pessoa)
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
        if (empty($estadoCivil)) {
            throw new \InvalidArgumentException('O estado civil é obrigatório', 99);
        } else {
            $this->estadoCivil = $estadoCivil;
            return $this;
        }
    }

    /**
     * Get the value of conhecimento
     */ 
    public function getConhecimento()
    {
        return $this->conhecimento;
    }

    /**
     * Set the value of conhecimento
     *
     * @return  self
     */ 
    public function setConhecimento($conhecimento)
    {
        if (empty($conhecimento)) {
            throw new \InvalidArgumentException('O estado civil é obrigatório', 99);
        } else {
            $this->conhecimento = $conhecimento;
            return $this;
        }
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
        if (empty($assinouTermo)) {
            $this->assinouTermo = 'N';
        } else {
            $this->assinouTermo = $assinouTermo;
            return $this;
        }
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

    /**
     * Set the value of usuarioExclusao
     *
     * @return  self
     */ 
    public function setUsuarioExclusao($usuarioExclusao)
    {
        $this->usuarioExclusao = $usuarioExclusao;
        return $this;
    }

    /**
     * Get the value of dataExclusao
     */ 
    public function getDataExclusao()
    {
        return $this->dataExclusao;
    }
}