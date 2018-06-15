<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\AcaoEntity;
use PNSL\Social\Entity\PessoaEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="atendimento")
 */
class AtendimentoEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="seq_atendimento")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AcaoEntity", inversedBy="atendimento")
     * @ORM\JoinColumn(name="seq_acao", referencedColumnName="seq_acao")
     */
    private $acao;

    /**
     * @ORM\ManyToOne(targetEntity="PessoaEntity", inversedBy="atendimentos")
     * @ORM\JoinColumn(name="seq_atendido", referencedColumnName="seq_pessoa")
     */
    private $atendido;

    /** @ORM\Column(type="datetime", name="dat_atendimento") */
    private $dataAtendimento;

    /** @ORM\Column(type="text", name="txt_atendimento") */
    private $texto;

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
        $this->cadastro = new \Datetime();
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
    public function setAcao(Acao $acao)
    {
        $this->acao = $acao;

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
     * Get the value of dataAtendimento
     */ 
    public function getDataAtendimento()
    {
        return $this->dataAtendimento;
    }

    /**
     * Set the value of dataAtendimento
     *
     * @return  self
     */ 
    public function setDataAtendimento($dataAtendimento)
    {
        $this->dataAtendimento = $dataAtendimento;

        return $this;
    }

    /**
     * Get the value of texto
     */ 
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */ 
    public function setTexto($texto)
    {
        $this->texto = $texto;

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