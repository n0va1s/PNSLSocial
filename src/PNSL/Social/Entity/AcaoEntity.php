<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\VoluntarioEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="acao")
 */
class AcaoEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="seq_acao")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\Column(type="string", length=255, name="nom_acao") */
    private $nome;

    /** @ORM\Column(type="datetime", name="ano_mes_inicio") */
    private $inicio;

    /** @ORM\Column(type="datetime", name="ano_mes_termino", nullable=true) */
    private $termino;

    /** @ORM\Column(type="string", length=255, name="des_publico_alvo") */
    private $publicoAlvo;

    /** @ORM\Column(type="string", length=255, name="des_pre_requisito") */
    private $preRequisito;

    /** @ORM\Column(type="string", name="ind_segunda", columnDefinition="CHAR(1) NOT NULL") */
    private $segunda;

    /** @ORM\Column(type="string", name="ind_terca", columnDefinition="CHAR(1) NOT NULL") */
    private $terca;

    /** @ORM\Column(type="string", name="ind_quarta", columnDefinition="CHAR(1) NOT NULL") */
    private $quarta;

    /** @ORM\Column(type="string", name="ind_quinta", columnDefinition="CHAR(1) NOT NULL") */
    private $quinta;

    /** @ORM\Column(type="string", name="ind_sexta", columnDefinition="CHAR(1) NOT NULL") */
    private $sexta;

    /** @ORM\Column(type="string", name="ind_sabado", columnDefinition="CHAR(1) NOT NULL") */
    private $sabado;

    /** @ORM\Column(type="string", name="ind_domingo", columnDefinition="CHAR(1) NOT NULL") */
    private $domingo;

    /** @ORM\Column(type="time", name="hor_acao") */
    private $horario;

    /** @ORM\Column(type="string", name="tip_turno", columnDefinition="CHAR(1) NOT NULL") */
    private $turno;

     /**
     * @ORM\ManyToOne(targetEntity="VoluntarioEntity", inversedBy="acao")
     * @ORM\JoinColumn(name="seq_voluntario", referencedColumnName="seq_pessoa")
     */
    private $voluntario;
    
    /** 
     * @ORM\OneToOne(targetEntity="TipoEntity")
     * @ORM\JoinColumn(name="seq_tipo_acao", referencedColumnName="seq_tipo") 
     */
    private $tipo;

    /** @ORM\OneToMany(targetEntity="FrequenciaEntity", mappedBy="acao") */
    private $frequencias;

    /** @ORM\OneToMany(targetEntity="AtendimentoEntity", mappedBy="acao") */
    private $atendimentos;

    /** @ORM\OneToMany(targetEntity="TurmaEntity", mappedBy="acao") */
    private $turmas;

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
        $this->frequencias = new ArrayCollection();
        $this->atendimentos = new ArrayCollection();
        $this->turmas = new ArrayCollection();
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
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of inicio
     */ 
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * Set the value of inicio
     *
     * @return  self
     */ 
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;

        return $this;
    }

    /**
     * Get the value of termino
     */ 
    public function getTermino()
    {
        return $this->termino;
    }

    /**
     * Set the value of termino
     *
     * @return  self
     */ 
    public function setTermino($termino)
    {
        $this->termino = $termino;

        return $this;
    }

    /**
     * Get the value of publicoAlvo
     */ 
    public function getPublicoAlvo()
    {
        return $this->publicoAlvo;
    }

    /**
     * Set the value of publicoAlvo
     *
     * @return  self
     */ 
    public function setPublicoAlvo($publicoAlvo)
    {
        $this->publicoAlvo = $publicoAlvo;

        return $this;
    }

    /**
     * Get the value of preRequisito
     */ 
    public function getPreRequisito()
    {
        return $this->preRequisito;
    }

    /**
     * Set the value of preRequisito
     *
     * @return  self
     */ 
    public function setPreRequisito($preRequisito)
    {
        $this->preRequisito = $preRequisito;

        return $this;
    }

    /**
     * Get the value of segunda
     */ 
    public function getSegunda()
    {
        return $this->segunda;
    }

    /**
     * Set the value of segunda
     *
     * @return  self
     */ 
    public function setSegunda($segunda)
    {
        $this->segunda = $segunda;

        return $this;
    }

    /**
     * Get the value of terca
     */ 
    public function getTerca()
    {
        return $this->terca;
    }

    /**
     * Set the value of terca
     *
     * @return  self
     */ 
    public function setTerca($terca)
    {
        $this->terca = $terca;

        return $this;
    }

    /**
     * Get the value of quarta
     */ 
    public function getQuarta()
    {
        return $this->quarta;
    }

    /**
     * Set the value of quarta
     *
     * @return  self
     */ 
    public function setQuarta($quarta)
    {
        $this->quarta = $quarta;

        return $this;
    }

    /**
     * Get the value of quinta
     */ 
    public function getQuinta()
    {
        return $this->quinta;
    }

    /**
     * Set the value of quinta
     *
     * @return  self
     */ 
    public function setQuinta($quinta)
    {
        $this->quinta = $quinta;

        return $this;
    }

    /**
     * Get the value of sexta
     */ 
    public function getSexta()
    {
        return $this->sexta;
    }

    /**
     * Set the value of sexta
     *
     * @return  self
     */ 
    public function setSexta($sexta)
    {
        $this->sexta = $sexta;

        return $this;
    }

    /**
     * Get the value of sabado
     */ 
    public function getSabado()
    {
        return $this->sabado;
    }

    /**
     * Set the value of sabado
     *
     * @return  self
     */ 
    public function setSabado($sabado)
    {
        $this->sabado = $sabado;

        return $this;
    }

    /**
     * Get the value of domingo
     */ 
    public function getDomingo()
    {
        return $this->domingo;
    }

    /**
     * Set the value of domingo
     *
     * @return  self
     */ 
    public function setDomingo($domingo)
    {
        $this->domingo = $domingo;

        return $this;
    }

    /**
     * Get the value of horario
     */ 
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * Set the value of horario
     *
     * @return  self
     */ 
    public function setHorario($horario)
    {
        $this->horario = $horario;

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
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

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