<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use PNSL\Social\Entity\VoluntarioEntity;
use PNSL\Social\Entity\ResponsavelEntity;
use PNSL\Social\Entity\MenorEntity;
use PNSL\Social\Entity\EnderecoEntity;
use PNSL\Social\Entity\ContatoEntity;

 /**
 * @ORM\Entity
 * @ORM\Table(name="pessoa")
 * @ORM\MappedSuperclass
 */
class PessoaEntity
{
    /** 
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="seq_pessoa") */
    private $id;

    /** @ORM\Column(type="string", length=255, name="nom_pessoa") */
    private $nome;

    /** @ORM\Column(type="string", name="tip_genero", columnDefinition="CHAR(1) NOT NULL") */
    private $genero;

    /** @ORM\Column(type="datetime", name="dat_nascimento") */
    private $dataNascimento;

    /** @ORM\Column(type="string", length=15, name="num_rg") */
    private $numRG;

    /** @ORM\Column(type="string", length=15, name="num_cpf") */
    private $numCPF;
    
    /** @ORM\Column(type="string", length=255, name="des_naturalidade") */
    private $naturalidade;

    /** @ORM\Column(type="string", length=3, name="tip_pessoa") */
    private $tipo;

    /** @ORM\OneToMany(targetEntity="ContatoEntity", mappedBy="pessoa") */
    private $contatos;

    /** @ORM\OneToMany(targetEntity="AtendimentoEntity", mappedBy="atendido") */
    private $atendimentos;

    /** @ORM\OneToMany(targetEntity="FrequenciaEntity", mappedBy="atendido") */
    private $frequencias;
    
    /** @ORM\Column(type="string", name="usu_inc", nullable=false) */
    private $usuarioInclusao;

    /** @ORM\Column(type="datetime", name="dat_inc", nullable=false) */
    private $dataInclusao;

    /** @ORM\Column(type="string", name="usu_alt", nullable=false) */
    private $usuarioAlteracao;
    
    /** @ORM\Column(type="datetime", name="dat_alt", nullable=false) */
    private $dataAlteracao;

    public function __construct() {
        $this->contatos = new ArrayCollection();
        $this->atendimentos = new ArrayCollection();
        $this->frequencias = new ArrayCollection();
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
     * Get the value of responsavel
     */ 
    public function getResponsavel()
    {
        return $this->responsavel;
    }

    /**
     * Set the value of responsavel
     *
     * @return  self
     */ 
    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;

        return $this;
    }

    /**
     * Get the value of menor
     */ 
    public function getMenor()
    {
        return $this->menor;
    }

    /**
     * Set the value of menor
     *
     * @return  self
     */ 
    public function setMenor($menor)
    {
        $this->menor = $menor;

        return $this;
    }

    /**
     * Get the value of endereco
     */ 
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */ 
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

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
     * Get the value of contatos
     */ 
    public function getContatos()
    {
        return $this->contatos;
    }

    /**
     * Set the value of contatos
     *
     * @return  self
     */ 
    public function setContatos($contatos)
    {
        $this->contatos = $contatos;

        return $this;
    }

    /**
     * Get the value of atendimentos
     */ 
    public function getAtendimentos()
    {
        return $this->atendimentos;
    }

    /**
     * Set the value of atendimentos
     *
     * @return  self
     */ 
    public function setAtendimentos($atendimentos)
    {
        $this->atendimentos = $atendimentos;

        return $this;
    }

    /**
     * Get the value of turmas
     */ 
    public function getTurmas()
    {
        return $this->turmas;
    }

    /**
     * Set the value of turmas
     *
     * @return  self
     */ 
    public function setTurmas($turmas)
    {
        $this->turmas = $turmas;

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