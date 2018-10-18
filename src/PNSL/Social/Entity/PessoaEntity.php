<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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

    /** @ORM\Column(type="string", length=255, name="nom_pessoa", nullable=false) */
    private $nome;

     /** @ORM\ManyToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_sexo", referencedColumnName="seq_tipo", nullable=false) */
    private $sexo;

    /** @ORM\ManyToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_estado_civil", referencedColumnName="seq_tipo", nullable=false) */
    private $estadoCivil;

    /** @ORM\Column(type="date", name="dat_nascimento", nullable=false) */
    private $dataNascimento;

    /** @ORM\Column(type="string", length=15, name="num_rg", nullable=true) */
    private $RG;

    /** @ORM\Column(type="string", length=15, name="num_cpf", unique=true, nullable=false) */
    private $CPF;
    
    /** @ORM\Column(type="string", length=255, name="des_nacionalidade", nullable=false) */
    private $nacionalidade;

    /** @ORM\ManyToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_pessoa", referencedColumnName="seq_tipo", nullable=false) */
    private $tipoPessoa;

    /** @ORM\Column(type="string", length=255, name="end_des_logradouro", nullable=false, nullable=false) */
    private $endereco;
    
    /** @ORM\Column(type="string", length=50, name="end_nom_cidade", nullable=false, nullable=false) */
    private $cidade;

    /** @ORM\ManyToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_uf", referencedColumnName="seq_tipo", nullable=false) */
    private $uf;
    
    /** @ORM\Column(type="string", length=10, name="end_num_CEP", nullable=false) */
    private $CEP;

    /** @ORM\Column(type="string", length=50, name="eml_principal", nullable=false) */
    private $email;

    /** @ORM\Column(type="string", length=15, name="tel_principal", nullable=false) */
    private $telefone;

    /** @ORM\ManyToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_telefone", referencedColumnName="seq_tipo", nullable=false) */
    private $tipoTelefone;

    /** @ORM\ManyToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_renda", referencedColumnName="seq_tipo", nullable=true) */
    private $tipoRenda;

    /** @ORM\Column(type="integer", name="qtd_familiar", nullable=true) */
    private $familiar;

    /** @ORM\Column(type="string", length=100, name="nom_profissao", nullable=true) */
    private $profissao;

    /**
     * @ORM\OneToOne(targetEntity="PessoaEntity", cascade={"persist"})
     * @ORM\JoinColumn(name="seq_responsavel", referencedColumnName="seq_pessoa", nullable=true)
     */
    private $responsavel;

    /** @ORM\ManyToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_parentesco", referencedColumnName="seq_tipo", nullable=true) */
    private $parentesco;

    /** @ORM\ManyToOne(targetEntity="TipoEntity")
     *  @ORM\JoinColumn(name="seq_tipo_origem", referencedColumnName="seq_tipo", nullable=true) */
    private $tipoOrigem;

    /** @ORM\OneToOne(targetEntity="VoluntarioEntity", mappedBy="pessoa", cascade={"remove"}) */
    private $voluntario;

    /**
     * @ORM\OneToOne(targetEntity="EscolaEntity")
     * @ORM\JoinColumn(name="seq_escola", referencedColumnName="seq_escola", nullable=true)
     */
    private $escola;

    /** @ORM\OneToMany(targetEntity="AtendimentoEntity", mappedBy="atendido") */
    private $atendimentos;

    /** @ORM\OneToMany(targetEntity="FrequenciaEntity", mappedBy="atendido") */
    private $frequencias;
    
    /** @ORM\OneToMany(targetEntity="TurmaEntity", mappedBy="pessoa") */
    private $turmas;

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

    public function __construct() {
        $this->atendimentos = new ArrayCollection();
        $this->frequencias = new ArrayCollection();
        $this->turmas = new ArrayCollection();
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
        if (empty($id)) {
            throw new \InvalidArgumentException('O ID é obrigatório', 99);
        } else {
            $this->id = $id;
            return $this;
        }
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
            throw new \InvalidArgumentException('O nome é obrigatório', 99);
        } else {
            $this->nome = $nome;
            return $this;
        }
    }

    /**
     * Get the value of sexo
     */ 
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */ 
    public function setSexo($sexo)
    {
        if (empty($sexo)) {
            throw new \InvalidArgumentException('O sexo é obrigatório', 99);
        } else {
            $this->sexo = $sexo;
            return $this;
        }
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
        if (empty($estadoCivil)) {
            throw new \InvalidArgumentException('O estado civil é obrigatório', 99);
        } else {
            $this->estadoCivil = $estadoCivil;
            return $this;
        }
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
        if (empty($dataNascimento)) {
            throw new \InvalidArgumentException('A data de nascimento é obrigatória', 99);
        } else {
            if (substr_count($dataNascimento, "/") == 2) {
                list($dia, $mes, $ano) = explode("/", $dataNascimento);
                $this->dataNascimento = new \DateTime(
                    date_format(date_create($ano."-".$mes."-".$dia), "Y-m-d")
                );
            } elseif (substr_count($dataNascimento, "-") == 2) {
                list($dia, $mes, $ano) = explode("-", $dataNascimento);
                $this->dataNascimento = new \DateTime(
                    date_format(date_create($ano."-".$mes."-".$dia), "Y-m-d")
                );
            } else {
                throw new \InvalidArgumentException('A data de nascimento é inválida', 99);
            }
            return $this;
        }
    }

    /**
     * Get the value of RG
     */ 
    public function getRG()
    {
        return $this->RG;
    }

    /**
     * Set the value of RG
     *
     * @return  self
     */ 
    public function setRG($RG)
    {
        if (!is_numeric($RG)) {
            if (substr_count($RG, ".") > 0) {
                $RG_saneado = str_replace(".", "", $RG);
            } else {
                $RG_saneado = $RG;
            }
            if (substr_count($RG_saneado, "-") > 0) {
                $RG_saneado = str_replace("-", "", $RG_saneado);
            }
            if (substr_count($RG_saneado, " ") > 0) {
                $RG_saneado = str_replace(" ", "", $RG_saneado);
            }
            $this->RG = $RG_saneado;
        } else {
            $this->RG = $RG;
        }
        return $this;
    }

    /**
     * Get the value of CPF
     */ 
    public function getCPF()
    {
        return $this->CPF;
    }

    /**
     * Set the value of CPF
     *
     * @return  self
     */ 
    public function setCPF($CPF)
    {
        if (empty($CPF)) {
            throw new \InvalidArgumentException('O CPF é obrigatório', 99);
        } else {
            if (!is_numeric($CPF)) {
                if (substr_count($CPF, ".") > 0) {
                    $CPF_saneado = str_replace(".", "", $CPF);
                } else {
                    $CPF_saneado = $CPF;
                }
                if (substr_count($CPF_saneado, "-") > 0) {
                    $CPF_saneado = str_replace("-", "", $CPF_saneado);
                }
                if (substr_count($CPF_saneado, " ") > 0) {
                    $CPF_saneado = str_replace(" ", "", $CPF_saneado);
                }
                $this->CPF = $CPF_saneado;
            } else {
                $this->CPF = $CPF;
            }
            return $this;
        }
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
        if (empty($nacionalidade)) {
            throw new \InvalidArgumentException('A nacionalidade é obrigatória', 99);
        } else {
            $this->nacionalidade = $nacionalidade;
            return $this;
        }
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
        if (empty($tipoPessoa)) {
            throw new \InvalidArgumentException('O tipo de pessoa é obrigatório', 99);
        } else {
            $this->tipoPessoa = $tipoPessoa;
            return $this;
        }
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
        if (empty($endereco)) {
            throw new \InvalidArgumentException('O endereço é obrigatório', 99);
        } else {
            $this->endereco = $endereco;
            return $this;
        }
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
        if (empty($cidade)) {
            throw new \InvalidArgumentException('A cidade é obrigatória', 99);
        } else {
            $this->cidade = $cidade;
            return $this;
        }
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
        if (empty($uf)) {
            throw new \InvalidArgumentException('A uf é obrigatória', 99);
        } else {
            $this->uf = $uf;
            return $this;
        }
    }

    /**
     * Get the value of CEP
     */ 
    public function getCEP()
    {
        return $this->CEP;
    }

    /**
     * Set the value of CEP
     *
     * @return  self
     */ 
    public function setCEP($CEP)
    {
        if (empty($CEP)) {
            throw new \InvalidArgumentException('O CEP é obrigatório', 99);
        } else {
            if (!is_numeric($CEP)) {
                if (substr_count($CEP, ".") > 0) {
                    $CEP_saneado = str_replace(".", "", $CEP);
                } else {
                    $CEP_saneado = $CEP;
                }
                if (substr_count($CEP_saneado, "-") > 0) {
                    $CEP_saneado = str_replace("-", "", $CEP_saneado);
                }
                if (substr_count($CEP_saneado, " ") > 0) {
                    $CEP_saneado = str_replace(" ", "", $CEP_saneado);
                }
                $this->CEP = $CEP_saneado;
            } else {
                $this->CEP = $CEP;
            }
            return $this;
        }
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
        if (empty($email)) {
            throw new \InvalidArgumentException('O email é obrigatório', 99);
        } else {
            $emailValido = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$emailValido) {
                throw new \InvalidArgumentException('O email é inválido', 99);
            }
            $this->email = $email;
            return $this;
        }
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
        if (empty($telefone)) {
            throw new \InvalidArgumentException('O telefone é obrigatório', 99);
        } else {
            if (!is_numeric($telefone)) {
                if (substr_count($telefone, ".") > 0) {
                    $telefone_saneado = str_replace(".", "", $telefone);
                } else {
                    $telefone_saneado = $telefone;
                }
                if (substr_count($telefone_saneado, "-") > 0) {
                    $telefone_saneado = str_replace("-", "", $telefone_saneado);
                }
                if (substr_count($telefone_saneado, " ") > 0) {
                    $telefone_saneado = str_replace(" ", "", $telefone_saneado);
                }
                if (substr_count($telefone_saneado, ")") > 0) {
                    $telefone_saneado = str_replace(")", "", $telefone_saneado);
                }
                if (substr_count($telefone_saneado, "(") > 0) {
                    $telefone_saneado = str_replace("(", "", $telefone_saneado);
                }
                $this->telefone = $telefone_saneado;
            } else {
                $this->telefone = $telefone;
            }
            return $this;
        }
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
        if (empty($tipoTelefone)) {
            throw new \InvalidArgumentException('O tipo de telefone é obrigatório', 99);
        } else {
            $this->tipoTelefone = $tipoTelefone;
            return $this;
        }
    }

    /**
     * Get the value of tipoRenda
     */ 
    public function getTipoRenda()
    {
        return $this->tipoRenda;
    }

    /**
     * Set the value of tipoRenda
     *
     * @return  self
     */ 
    public function setTipoRenda($tipoRenda)
    {
        $this->tipoRenda = $tipoRenda;

        return $this;
    }

    /**
     * Get the value of familiar
     */ 
    public function getFamiliar()
    {
        return $this->familiar;
    }

    /**
     * Set the value of familiar
     *
     * @return  self
     */ 
    public function setFamiliar($familiar)
    {
        $this->familiar = $familiar;

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
     * Get the value of parentesco
     */ 
    public function getParentesco()
    {
        return $this->parentesco;
    }

    /**
     * Set the value of parentesco
     *
     * @return  self
     */ 
    public function setParentesco($parentesco)
    {
        $this->parentesco = $parentesco;

        return $this;
    }

    /**
     * Get the value of escola
     */ 
    public function getEscola()
    {
        return $this->escola;
    }

    /**
     * Set the value of escola
     *
     * @return  self
     */ 
    public function setEscola($escola)
    {
        $this->escola = $escola;
        return $this;
    }

    /**
     * Get the value of tipoOrigem
     */ 
    public function getTipoOrigem()
    {
        return $this->tipoOrigem;
    }

    /**
     * Set the value of tipoOrigem
     *
     * @return  self
     */ 
    public function setTipoOrigem($tipoOrigem)
    {
        $this->tipoOrigem = $tipoOrigem;

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
     * Get the value of frequencias
     */ 
    public function getFrequencias()
    {
        return $this->frequencias;
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