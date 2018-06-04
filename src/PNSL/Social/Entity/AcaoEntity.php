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

    /**
     * @@ORM\ManyToOne(targetEntity="VoluntarioEntity", inversedBy="acao")
     * @@ORM\JoinColumn(name="seq_voluntario", referencedColumnName="id")
     */
    private $voluntario;

    /**
     * @ORM\Column(type="string", length=255, name="nom_acao")
     */
    private $nome;

    /**
     * @ORM\Column(type="datetime", name="dat_inicio")
     */
    private $inicio;

    /**
     * @ORM\Column(type="datetime", name="dat_termino")
     */
    private $termino;

    /**
     * @ORM\Column(type="text", name="txt_acao")
     */
    private $descricao;

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