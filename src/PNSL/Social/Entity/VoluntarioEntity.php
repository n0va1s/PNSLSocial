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
    
    /** @ORM\Column(type="string", length=15, name="num_registro", nullable=true) */
    private $registro;

    /** @ORM\ManyToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_registro", referencedColumnName="seq_tipo", nullable=true) */
    private $tipoRegistro;

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
     * Get the value of registro
     */ 
    public function getRegistro()
    {
        return $this->registro;
    }

    /**
     * Set the value of registro
     *
     * @return  self
     */ 
    public function setRegistro($registro)
    {
        $this->registro = $registro;

        return $this;
    }

    /**
     * Get the value of tipoRegistro
     */ 
    public function getTipoRegistro()
    {
        return $this->tipoRegistro;
    }

    /**
     * Set the value of tipoRegistro
     *
     * @return  self
     */ 
    public function setTipoRegistro($tipoRegistro)
    {
        $this->tipoRegistro = $tipoRegistro;

        return $this;
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
     * Set the usuarioInclusao and actual date for dataInclusao
     *
     * @return  self
     */ 
    public function setLogInclusao($usuarioInclusao)
    {
        if (!empty($usuarioInclusao)) {
            $this->usuarioInclusao = $usuarioInclusao;
            $this->dataInclusao = new \DateTime();
        } else {
            throw new \InvalidArgumentException('Usuário responsável pela inclusão é obrigatório', 99);
        }
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
     * Get the value of dataInclusao
     */ 
    public function getDataInclusao()
    {
        return $this->dataInclusao;
    }    

    /**
     * Set the usuarioAlteracao and actual date for dataAlteracao
     *
     * @return  self
     */ 
    public function setLogAlteracao($usuarioAlteracao)
    {
        if (!empty($usuarioAlteracao)) {
            $this->usuarioAlteracao = $usuarioAlteracao;
            $this->dataAlteracao = new \DateTime();
        } else {
            throw new \InvalidArgumentException('Usuário responsável pela alteração é obrigatório', 99);
        }
        return $this;
    }

    /**
     * Get the value of usuarioAlteracao
     */ 
    public function getUsuarioAlteracao()
    {
        return $this->usuarioAlteracao;
    }

    /**
     * Get the value of dataAlteracao
     */ 
    public function getDataAlteracao()
    {
        return $this->dataAlteracao;
    }

    /**
     * Set the usuarioExclusao and actual date for dataExclusao
     *
     * @return  self
     */ 
    public function setLogExclusao($usuarioExclusao)
    {
        if (!empty($usuarioExclusao)) {
            $this->usuarioExclusao = $usuarioExclusao;
            $this->dataExclusao = new \DateTime();
        } else {
            throw new \InvalidArgumentException('Usuário responsável pela exclusão é obrigatório', 99);
        }
        return $this;
    }

    /**
     * Get the value of usuarioExclusao
     */ 
    public function getUsuarioExclusao()
    {
        return $this->usuarioExclusao;
    }

    /**
     * Get the value of dataExclusao
     */ 
    public function getDataExclusao()
    {
        return $this->dataExclusao;
    }
}