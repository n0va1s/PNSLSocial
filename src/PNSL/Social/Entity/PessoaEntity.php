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

    /** @ORM\OneToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_estado_civil", referencedColumnName="seq_tipo", nullable=false) */
    private $estadoCivil;

    /** @ORM\Column(type="datetime", name="dat_nascimento") */
    private $dataNascimento;

    /** @ORM\Column(type="string", length=15, name="num_rg") */
    private $numRG;

    /** @ORM\Column(type="string", length=15, name="num_cpf") */
    private $numCPF;
    
    /** @ORM\Column(type="string", length=255, name="des_nacionalidade") */
    private $nacionalidade;

    /** @ORM\OneToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_pessoa", referencedColumnName="seq_tipo", nullable=false) */
    private $tipoPessoa;

    /** @ORM\Column(type="string", length=255, name="end_des_logradouro", nullable=false) */
    private $endereco;
    
    /** @ORM\Column(type="string", length=50, name="end_nom_cidade", nullable=false) */
    private $cidade;

    /** @ORM\Column(type="string", length=50, name="end_sig_UF", columnDefinition="CHAR(2) NOT NULL") */
    private $uf;

    /** @ORM\Column(type="string", length=50, name="eml_principal") */
    private $email;

    /** @ORM\Column(type="string", length=10, name="tel_principal") */
    private $telefone;

    /** @ORM\OneToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_telefone", referencedColumnName="seq_tipo", nullable=false) */
    private $tipoTelefone;

    ///** @ORM\OneToMany(targetEntity="ContatoEntity", mappedBy="pessoa") */
    //private $contatos;

    /** @ORM\Column(type="string", length=100, name="nom_profissao") */
    private $profissao;

    /** @ORM\OneToMany(targetEntity="AtendimentoEntity", mappedBy="atendido") */
    private $atendimentos;

    /** @ORM\OneToMany(targetEntity="FrequenciaEntity", mappedBy="atendido") */
    private $frequencias;
    
    /** @ORM\Column(type="string", length=50, name="usu_inc", nullable=false) */
    private $usuarioInclusao;

    /** @ORM\Column(type="datetime", name="dat_inc", nullable=false) */
    private $dataInclusao;

    /** @ORM\Column(type="string", length=50, name="usu_alt", nullable=false) */
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
     * Get the value of estadoCivil
     */ 
    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    /**
     * Set the value of estadoCivil
     *
     * @return  self
     */ 
    public function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;

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
     * Get the value of nacionalidade
     */ 
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }

    /**
     * Set the value of nacionalidade
     *
     * @return  self
     */ 
    public function setNacionalidade($nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;

        return $this;
    }

    /**
     * Get the value of tipoPessoa
     */ 
    public function getTipoPessoa()
    {
        return $this->tipoPessoa;
    }

    /**
     * Set the value of tipoPessoa
     *
     * @return  self
     */ 
    public function setTipoPessoa($tipoPessoa)
    {
        $this->tipoPessoa = $tipoPessoa;

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
     * Get the value of cidade
     */ 
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */ 
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of uf
     */ 
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set the value of uf
     *
     * @return  self
     */ 
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $emailValido = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$emailValido) {
            throw new \InvalidArgumentException('O email é inválido', 99);
        }
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of telefone
     */ 
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */ 
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of tipoTelefone
     */ 
    public function getTipoTelefone()
    {
        return $this->tipoTelefone;
    }

    /**
     * Set the value of tipoTelefone
     *
     * @return  self
     */ 
    public function setTipoTelefone($tipoTelefone)
    {
        $this->tipoTelefone = $tipoTelefone;

        return $this;
    }

    /**
     * Get the value of profissao
     */ 
    public function getProfissao()
    {
        return $this->profissao;
    }

    /**
     * Set the value of profissao
     *
     * @return  self
     */ 
    public function setProfissao($profissao)
    {
        $this->profissao = $profissao;

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
     * Get the value of frequencias
     */ 
    public function getFrequencias()
    {
        return $this->frequencias;
    }

    /**
     * Set the value of frequencias
     *
     * @return  self
     */ 
    public function setFrequencias($frequencias)
    {
        $this->frequencias = $frequencias;

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
     * Set the value of dataInclusao
     *
     * @return  self
     */ 
    public function setDataInclusao($dataInclusao)
    {
        $this->dataInclusao = $dataInclusao;

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
     * Set the value of dataAlteracao
     *
     * @return  self
     */ 
    public function setDataAlteracao($dataAlteracao)
    {
        $this->dataAlteracao = $dataAlteracao;

        return $this;
    }
}