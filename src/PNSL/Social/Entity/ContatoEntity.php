<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\PessoaEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="contato")
 */
class ContatoEntity
{
    /** 
     * @ORM\ManyToOne(targetEntity="PessoaEntity", inversedBy="contatos") 
     * @ORM\JoinColumn(name="seq_pessoa", referencedColumnName="seq_pessoa")
    */
    private $pessoa;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="seq_contato")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3, name="tip_contato")
     */
    private $tipo;

    /**
     * @ORM\Column(type="string", length=255, name="des_contato")
     */
    private $contato;

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
        $this->pessoa = $pessoa;

        return $this;
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
     * Get the value of contato
     */ 
    public function getContato()
    {
        return $this->contato;
    }

    /**
     * Set the value of contato
     *
     * @return  self
     */ 
    public function setContato($contato)
    {
        $this->contato = $contato;

        return $this;
    }
}