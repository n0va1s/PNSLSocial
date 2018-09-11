<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\TurmaEntity;
use PNSL\Social\Entity\PessoaEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="frequencia")
 */
class FrequenciaEntity
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer", name="seq_frequencia")
    */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="TurmaEntity", inversedBy="turma")
     * @ORM\JoinColumn(name="seq_turma", referencedColumnName="seq_turma")
     */
    private $turma;
    
    /** @ORM\Column(type="datetime", name="dat_frequencia", nullable=false) */
    private $data;

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
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        if (empty($data)) {
            throw new \InvalidArgumentException('A data é obrigatória', 99);
        } else {
            if (substr_count($data, "/") == 2) {
                list($dia, $mes, $ano) = explode("/", $data);
                $this->data = new \DateTime(
                    date_format(date_create($ano."-".$mes."-".$dia), "Y-m-d")
                );
            } else {
                throw new \InvalidArgumentException('A data é inválida', 99);
            }
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