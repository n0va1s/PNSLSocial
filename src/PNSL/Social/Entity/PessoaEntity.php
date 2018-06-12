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

    /**
     * @ORM\OneToOne(targetEntity="VoluntarioEntity", inversedBy="pessoa")
     * @ORM\JoinColumn(name="seq_voluntario", referencedColumnName="seq_voluntario")
     */
    private $voluntario;

    /**
     * @ORM\OneToOne(targetEntity="ResponsavelEntity", inversedBy="pessoa")
     * @ORM\JoinColumn(name="seq_responsavel", referencedColumnName="seq_responsavel")
     */
    private $responsavel;

    /**
     * @ORM\OneToOne(targetEntity="MenorEntity", inversedBy="pessoa")
     * @ORM\JoinColumn(name="seq_menor", referencedColumnName="seq_menor")
     */
    private $menor;
    
    /**
     * @ORM\OneToOne(targetEntity="EnderecoEntity", inversedBy="pessoa")
     * @ORM\JoinColumn(name="seq_endereco", referencedColumnName="seq_endereco", nullable=false)
     */
    private $endereco;

    /** @ORM\OneToMany(targetEntity="ContatoEntity", mappedBy="pessoa") */
    private $contatos;

    /** @ORM\OneToMany(targetEntity="AtendimentoEntity", mappedBy="atendido") */
    private $atendimentos;

    /** @ORM\OneToMany(targetEntity="TurmaEntity", mappedBy="atendido") */
    private $turmas;
    

    /** @ORM\Column(type="string", name="usu_inc", nullable=false) */
    private $usuarioInclusao;

    /** @ORM\Column(type="datetime", name="dat_inc", nullable=false) */
    private $dataInclusao;

    /** @ORM\Column(type="string", name="usu_alt", nullable=false) */
    private $usuarioAlteracao;
    
    /** @ORM\Column(type="datetime", name="dat_alt", nullable=false) */
    private $dataAlteracao;

    public function __construct()
    {
        $this->contatos = new ArrayCollection();
        $this->atendimentos = new ArrayCollection();
        $this->turmas = new ArrayCollection();
        $this->dataInclusao = new \Datetime();
        $this->dataAlteracao = new \Datetime();
    }
}