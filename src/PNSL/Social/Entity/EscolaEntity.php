<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="escola")
 */
class EscolaEntity
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer", name="seq_escola")
    */
    private $id;

    /** @ORM\Column(type="string", name="nom_escola", length=100) */
    private $nome;

    /** @ORM\Column(type="smallint", name="num_ano") */
    private $ano;

    /** @ORM\ManyToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_turno", referencedColumnName="seq_tipo", nullable=false) */
    private $turno;

    /** @ORM\ManyToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_grau", referencedColumnName="seq_tipo", nullable=false) */
    private $grau;

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
     * Get the value of Id
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
     * Get the value of ano
     */ 
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set the value of ano
     *
     * @return  self
     */ 
    public function setAno($ano)
    {
        $this->ano = $ano;

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
     * Get the value of grau
     */ 
    public function getGrau()
    {
        return $this->grau;
    }

    /**
     * Set the value of grau
     *
     * @return  self
     */ 
    public function setGrau($grau)
    {
        $this->grau = $grau;

        return $this;
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