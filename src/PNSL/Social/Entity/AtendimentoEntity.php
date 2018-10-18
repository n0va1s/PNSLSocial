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
     * @ORM\ManyToOne(targetEntity="PessoaEntity", inversedBy="atendimento")
     * @ORM\JoinColumn(name="seq_pessoa", referencedColumnName="seq_pessoa")
     */
    private $pessoa;

    /** @ORM\Column(type="datetime", name="dat_atendimento") */
    private $dataAtendimento;

    /** @ORM\Column(type="text", name="txt_atendimento") */
    private $texto;

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
        if (empty($acao)) {
            throw new \InvalidArgumentException('A ação é obrigatória', 99);
        } else {
            $this->acao = $acao;
            return $this;
        }
    }

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
    public function setPessoa($pessoa)
    {
        if (empty($pessoa)) {
            throw new \InvalidArgumentException('O usuário é obrigatório', 99);
        } else {
            $this->pessoa = $pessoa;
            return $this;
        }
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
        if (empty($dataAtendimento)) {
            throw new \InvalidArgumentException('A data do atendimento é obrigatória', 99);
        } else {
            if (substr_count($dataAtendimento, "/") == 2) {
                list($dia, $mes, $ano) = explode("/", $dataAtendimento);
                $this->dataAtendimento = new \DateTime(
                    date_format(date_create($ano."-".$mes."-".$dia), "Y-m-d")
                );
            } else {
                throw new \InvalidArgumentException('A data é inválida', 99);
            }
        }
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
        if (empty($texto)) {
            throw new \InvalidArgumentException('O texto do atendimento é obrigatório', 99);
        } else {
            $this->texto = $texto;
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