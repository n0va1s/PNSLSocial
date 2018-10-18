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