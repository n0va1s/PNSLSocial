<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\AcaoEntity;
use PNSL\Social\Entity\VoluntarioEntity;
use PNSL\Social\Entity\PessoaEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="turma")
 */
class TurmaEntity
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer", name="seq_turma")
    */
    private $id;

    /** @ORM\Column(type="string", length=1, name="tip_situacao") */
    private $situacao;

    /** @ORM\Column(type="datetime", name="dat_situacao") */
    private $data;

    /**
     * @ORM\ManyToOne(targetEntity="AcaoEntity", inversedBy="turma")
     * @ORM\JoinColumn(name="seq_acao", referencedColumnName="seq_acao")
     */
    private $acao;

    /**
     * @ORM\ManyToOne(targetEntity="PessoaEntity", inversedBy="turmas")
     * @ORM\JoinColumn(name="seq_atendido", referencedColumnName="seq_pessoa")
     */
    private $atendido;

    public function __construct()
    {
        $this->cadastro = new \Datetime();
    }
}