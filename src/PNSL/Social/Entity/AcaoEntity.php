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

    /** @ORM\Column(type="time", name="hor_entrada") */
    private $entrada;

    /** @ORM\Column(type="time", name="hor_saida") */
    private $saida;
    
    /** @ORM\Column(type="string", name="tip_turno", columnDefinition="CHAR(1) NOT NULL") */
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
        if (empty($publicoAlvo)) {
            throw new \InvalidArgumentException('O público é obrigatório', 99);
        } else {
            $this->publicoAlvo = $publicoAlvo;
            return $this;
        }
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
        if (empty($segunda)) {
            $this->segunda = 'N';
        } else {
            $this->segunda = 'S';
        }
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
        if (empty($terca)) {
            $this->terca = 'N';
        } else {
            $this->terca = 'S';
        }
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
        if (empty($quarta)) {
            $this->quarta = 'N';
        } else {
            $this->quarta = 'S';
        }
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
        if (empty($quinta)) {
            $this->quinta = 'N';
        } else {
            $this->quinta = 'S';
        }
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
        if (empty($sexta)) {
            $this->sexta = 'N';
        } else {
            $this->sexta = 'S';
        }
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
        if (empty($sabado)) {
            $this->sabado = 'N';
        } else {
            $this->sabado = 'S';
        }
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
        if (empty($domingo)) {
            $this->domingo = 'N';
        } else {
            $this->domingo = 'S';
        }
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
}