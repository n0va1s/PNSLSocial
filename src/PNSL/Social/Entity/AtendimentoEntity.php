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
     * @ORM\ManyToOne(targetEntity="PessoaEntity", inversedBy="atendimentos")
     * @ORM\JoinColumn(name="seq_atendido", referencedColumnName="seq_pessoa")
     */
    private $atendido;

    /** @ORM\Column(type="datetime", name="dat_atendimento") */
    private $dataAtendimento;

    /** @ORM\Column(type="text", name="txt_atendimento") */
    private $texto;

    public function __construct()
    {
        $this->cadastro = new \Datetime();
    }

}