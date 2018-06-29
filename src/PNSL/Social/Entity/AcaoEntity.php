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

    /** @ORM\Column(type="string", name="tip_frequencia", columnDefinition="CHAR(1) NOT NULL") */
    private $frequencia;

    /** @ORM\Column(type="string", name="dia_semana", columnDefinition="CHAR(3) NOT NULL") */
    private $diaSemana;

    /** @ORM\Column(type="string", name="tip_turno", columnDefinition="CHAR(1) NOT NULL") */
    private $turno;

    /** @ORM\Column(type="datetime", name="ano_mes_inicio") */
    private $inicio;

    /** @ORM\Column(type="datetime", name="ano_mes_termino", nullable=true) */
    private $termino;

    /** @ORM\Column(type="text", name="txt_acao") */
    private $descricao;

    /**
     * @ORM\ManyToOne(targetEntity="VoluntarioEntity", inversedBy="acao")
     * @ORM\JoinColumn(name="seq_voluntario", referencedColumnName="seq_pessoa")
     */
    private $voluntario;

    /** @ORM\OneToMany(targetEntity="AtendimentoEntity", mappedBy="atendimento") */
    private $atendimento;

    /** @ORM\OneToMany(targetEntity="TurmaEntity", mappedBy="turma") */
    private $turma;

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
    public function setTurma($turma)
    {
        $this->turma = $turma;

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