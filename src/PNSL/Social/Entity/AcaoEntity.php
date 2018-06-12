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

    /** @ORM\Column(type="string", length=255, name="nom_acao") */
    private $nome;

    /** @ORM\Column(type="datetime", name="dat_inicio") */
    private $inicio;

    /** @ORM\Column(type="datetime", name="dat_termino") */
    private $termino;

    /** @ORM\Column(type="text", name="txt_acao") */
    private $descricao;

    /**
     * @ORM\ManyToOne(targetEntity="VoluntarioEntity", inversedBy="acao")
     * @ORM\JoinColumn(name="seq_voluntario", referencedColumnName="seq_voluntario")
     */
    private $voluntario;

    /** @ORM\OneToMany(targetEntity="AtendimentoEntity", mappedBy="atendimento") */
    private $atendimento;

    /** @ORM\OneToMany(targetEntity="TurmaEntity", mappedBy="turma") */
    private $turma;

    public function __construct()
    {
        $this->dataInclusao = new \Datetime();
    }
}