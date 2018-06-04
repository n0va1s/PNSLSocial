<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\VoluntarioEntity;
use PNSL\Social\Entity\ResponsavelEntity;
use PNSL\Social\Entity\ContatoEntity;
use PNSL\Social\Entity\EnderecoEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="pessoa")
 */
class PessoaEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="seq_pessoa")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="VoluntarioEntity", mappedBy="pessoa")
     */
    private $voluntario;

    /**
     * @ORM\OneToOne(targetEntity="ResponsavelEntity", mappedBy="pessoa")
     */
    private $responsavel;

    /**
     * @ORM\OneToMany(targetEntity="ContatoEntity", mappedBy="pessoa")
     */
    private $contato;

    /**
     * @ORM\OneToMany(targetEntity="EnderecoEntity", mappedBy="pessoa")
     */
    private $endereco;
    
    /**
     * @ORM\Column(type="string", length=255, name="nom_profissao")
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=1, name="tip_genero")
     */
    private $genero;

    /**
     * @ORM\Column(type="datetime", name="dat_nascimento")
     */
    private $dataNascimento;

    /**
     * @ORM\Column(type="string", length=15, name="num_rg")
     */
    private $numRG;

    /**
     * @ORM\Column(type="string", length=15, name="num_cpf")
     */
    private $numCPF;
    
    /**
     * @ORM\Column(type="string", length=255, name="des_naturalidade")
     */
    private $naturalidade;

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
     * Get the value of genero
     */ 
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */ 
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of dataNascimento
     */ 
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * Set the value of dataNascimento
     *
     * @return  self
     */ 
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get the value of numRG
     */ 
    public function getNumRG()
    {
        return $this->numRG;
    }

    /**
     * Set the value of numRG
     *
     * @return  self
     */ 
    public function setNumRG($numRG)
    {
        $this->numRG = $numRG;

        return $this;
    }

    /**
     * Get the value of numCPF
     */ 
    public function getNumCPF()
    {
        return $this->numCPF;
    }

    /**
     * Set the value of numCPF
     *
     * @return  self
     */ 
    public function setNumCPF($numCPF)
    {
        $this->numCPF = $numCPF;

        return $this;
    }

    /**
     * Get the value of naturalidade
     */ 
    public function getNaturalidade()
    {
        return $this->naturalidade;
    }

    /**
     * Set the value of naturalidade
     *
     * @return  self
     */ 
    public function setNaturalidade($naturalidade)
    {
        $this->naturalidade = $naturalidade;

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