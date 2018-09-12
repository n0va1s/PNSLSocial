<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
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

    /** @ORM\Column(type="datetime", name="dat_inicio") */
    private $inicio;

    /** @ORM\Column(type="datetime", name="dat_termino", nullable=true) */
    private $termino;

    /** 
     * @ORM\ManyToOne(targetEntity="TipoEntity")
     * @ORM\JoinColumn(name="seq_tipo_publico_alvo", referencedColumnName="seq_tipo") 
     */
    private $publicoAlvo;

    /** 
     * @ORM\ManyToOne(targetEntity="TipoEntity")
     * @ORM\JoinColumn(name="seq_tipo_faixa_etaria", referencedColumnName="seq_tipo") 
     */
    private $faixaEtaria;

    /** @ORM\Column(type="string", length=255, name="des_pre_requisito") */
    private $preRequisito;

    /** @ORM\Column(type="integer", name="val_carga_horaria") */
    private $cargaHoraria;

    /** 
     * @ORM\ManyToOne(targetEntity="TipoEntity")
     * @ORM\JoinColumn(name="seq_tipo_dia_semana", referencedColumnName="seq_tipo") 
     */
    private $diaSemana;

    /** @ORM\Column(type="time", name="hor_entrada") */
    private $entrada;

    /** @ORM\Column(type="time", name="hor_saida") */
    private $saida;
    
    /** 
     * @ORM\ManyToOne(targetEntity="TipoEntity")
     * @ORM\JoinColumn(name="seq_tipo_turno", referencedColumnName="seq_tipo") 
     */
    private $turno;

     /**
     * @ORM\ManyToOne(targetEntity="VoluntarioEntity", inversedBy="acao")
     * @ORM\JoinColumn(name="seq_voluntario", referencedColumnName="seq_pessoa")
     */
    private $voluntario;
    
    /** 
     * @ORM\ManyToOne(targetEntity="TipoEntity")
     * @ORM\JoinColumn(name="seq_tipo_acao", referencedColumnName="seq_tipo") 
     */
    private $tipo;

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

    /** @ORM\Column(type="string", length=50, name="usu_exc", nullable=true) */
    private $usuarioExclusao;

    /** @ORM\Column(type="datetime", name="dat_exc", nullable=true) */
    private $dataExclusao;

    public function __construct()
    {
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
        if (empty($nome)) {
            throw new \InvalidArgumentException('O nome da ação é obrigatória', 99);
        } else {
            $this->nome = $nome;
            return $this;
        }
        
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
        if (empty($inicio)) {
            throw new \InvalidArgumentException('A data de início é obrigatória', 99);
        } else {
            if (substr_count($inicio, "/") == 2) {
                list($dia, $mes, $ano) = explode("/", $inicio);
                $this->inicio = new \DateTime(
                    date_format(date_create($ano."-".$mes."-".$dia), "Y-m-d")
                );
            } else {
                throw new \InvalidArgumentException('A data de início é inválida', 99);
            }
            return $this;
        }        
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
        if (empty($termino)) {
            $this->termino = null;
        } else {
            if (substr_count($termino, "/") == 2) {
                list($dia, $mes, $ano) = explode("/", $termino);
                $this->termino = new \DateTime(
                    date_format(date_create($ano."-".$mes."-".$dia), "Y-m-d")
                );
            } else {
                throw new \InvalidArgumentException('A data de início é inválida', 99);
            }
        }        
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
     * Get the value of faixaEtaria
     */ 
    public function getFaixaEtaria()
    {
        return $this->faixaEtaria;
    }

    /**
     * Set the value of faixaEtaria
     *
     * @return  self
     */ 
    public function setFaixaEtaria($faixaEtaria)
    {
        $this->faixaEtaria = $faixaEtaria;

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
        if (empty($preRequisito)) {
            throw new \InvalidArgumentException('O pré-requisito é obrigatório', 99);
        } else {
            $this->preRequisito = $preRequisito;
            return $this;
        }
    }

    /**
     * Get the value of cargaHoraria
     */ 
    public function getCargaHoraria()
    {
        return $this->cargaHoraria;
    }

    /**
     * Set the value of cargaHoraria
     *
     * @return  self
     */ 
    public function setCargaHoraria($cargaHoraria)
    {
        $this->cargaHoraria = $cargaHoraria;

        return $this;
    }

    /**
     * Get the value of diaSemana
     */ 
    public function getDiaSemana()
    {
        return $this->diaSemana;
    }

    /**
     * Set the value of diaSemana
     *
     * @return  self
     */ 
    public function setDiaSemana($diaSemana)
    {
        $this->diaSemana = $diaSemana;

        return $this;
    }

    /**
     * Get the value of entrada
     */ 
    public function getEntrada()
    {
        return $this->entrada;
    }

    /**
     * Set the value of entrada
     *
     * @return  self
     */ 
    public function setEntrada($entrada)
    {
        if (empty($entrada)) {
            throw new \InvalidArgumentException('A hora de entrada é obrigatória', 99);
        } else {
            
            if (substr_count($entrada, ":") == 1) {
                list($hora, $minuto) = explode(":", $entrada);
                $this->entrada = new \DateTime(
                    date_format(date_create($hora.":".$minuto), "h:i")
                );
            } else {
                throw new \InvalidArgumentException('O horário de entrada é inválido', 99);
            }
        }        
        return $this;
    }

    /**
     * Get the value of saida
     */ 
    public function getSaida()
    {
        return $this->saida;
    }

    /**
     * Set the value of saida
     *
     * @return  self
     */ 
    public function setSaida($saida)
    {
        if (empty($saida)) {
            throw new \InvalidArgumentException('A hora de saída é obrigatória', 99);
        } else {
            if (substr_count($saida, ":") == 1) {
                list($hora, $minuto) = explode(":", $saida);
                $this->saida = new \DateTime(
                    date_format(date_create($hora.":".$minuto), "h:i")
                );
            } else {
                throw new \InvalidArgumentException('O horário de saída é inválido', 99);
            }
        }        
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
        if (empty($turno)) {
            throw new \InvalidArgumentException('O turno é obrigatório', 99);
        } else {
            $this->turno = $turno;
            return $this;
        }
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
        if (empty($voluntario)) {
            throw new \InvalidArgumentException('O voluntário é obrigatório', 99);
        } else {
            $this->voluntario = $voluntario;
            return $this;
        }
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
        if (empty($tipo)) {
            throw new \InvalidArgumentException('O tipo de ação é obrigatório', 99);
        } else {
            $this->tipo = $tipo;
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
     * Get the value of usuarioExclusao
     */ 
    public function getUsuarioExclusao()
    {
        return $this->usuarioExclusao;
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

    /**
     * Set the value of dataExclusao
     *
     * @return  self
     */ 
    public function setDataExclusao($dataExclusao = null)
    {
        if (empty($dataExclusao)) {
            $this->dataExclusao = new \Datetime();
        } else {
            if (substr_count($dataExclusao, "/") == 2) {
                list($dia, $mes, $ano) = explode("/", $dataExclusao);
                $this->dataExclusao = new \DateTime(
                    date_format(date_create($ano."-".$mes."-".$dia), "Y-m-d")
                );
            } else {
                throw new \InvalidArgumentException('A data é inválida', 99);
            }
        }
        return $this;
    }
}