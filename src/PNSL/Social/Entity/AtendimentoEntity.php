<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\AcaoEntity;
use PNSL\Social\Entity\VoluntarioEntity;
use PNSL\Social\Entity\ResponsavelEntity;
use PNSL\Social\Entity\MenorEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="atendimento")
 */
class AtendimentoEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="seq_acao")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AcaoEntity", inversedBy="atendimento")
     * @ORM\JoinColumn(name="seq_acao", referencedColumnName="seq_acao")
     */
    private $acao;

    /**
     * @ORM\ManyToOne(targetEntity="VoluntarioEntity", inversedBy="atendimento")
     * @ORM\JoinColumn(name="seq_voluntario", referencedColumnName="seq_pessoa")
     */
    private $voluntario;

    /**
     * @ORM\ManyToOne(targetEntity="ResponsavelEntity", inversedBy="atendimento")
     * @ORM\JoinColumn(name="seq_responsavel", referencedColumnName="seq_pessoa")
     */
    private $responsavel;

    /**
     * @ORM\ManyToOne(targetEntity="MenorEntity", inversedBy="atendimento")
     * @ORM\JoinColumn(name="seq_menor", referencedColumnName="seq_pessoa")
     */
    private $menor;

    /**
     * @ORM\Column(type="datetime", name="dat_atendimento")
     */
    private $atendimento;

    /**
     * @ORM\Column(type="text", name="txt_atendimento")
     */
    private $texto;

    /**
     * @ORM\Column(type="string", length=50, name="nom_usuario")
     */
    private $usuario;

    /**
     * @ORM\Column(type="datetime", name="dat_cadastro")
     */
    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new \Datetime();
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
     * Get the value of voluntario
     */ 
    public function getVoluntario()
    {
        return $this->voluntario;
    }

    /**
     * Set the value of voluntario
     *
     * @return  self
     */ 
    public function setVoluntario($voluntario)
    {
        $this->voluntario = $voluntario;

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
     * Get the value of menor
     */ 
    public function getMenor()
    {
        return $this->menor;
    }

    /**
     * Set the value of menor
     *
     * @return  self
     */ 
    public function setMenor($menor)
    {
        $this->menor = $menor;

        return $this;
    }

    /**
     * Get the value of atendimento
     */ 
    public function getAtendimento()
    {
        return $this->atendimento;
    }

    /**
     * Set the value of atendimento
     *
     * @return  self
     */ 
    public function setAtendimento($atendimento)
    {
        $this->atendimento = $atendimento;

        return $this;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of cadastro
     */ 
    public function getCadastro()
    {
        return $this->cadastro;
    }
}