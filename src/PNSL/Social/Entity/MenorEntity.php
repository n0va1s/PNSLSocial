<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\ResponsavelEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="menor")
 */
class MenorEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="seq_menor")
     */
    private $id;

    /** @ORM\Column(type="string", length=255, name="nom_escola") */
    private $escola;

    /** @ORM\Column(type="integer", length=4, name="num_ano") */
    private $ano;

    /** @ORM\Column(type="string", length=1, name="tip_turno") */
    private $turno;

    /** @ORM\Column(type="integer", length=1, name="tip_grau") */
    private $grau;

    /** @ORM\Column(type="string", length=1, name="ind_pode_sair_sozinho") */
    private $autorizadoSairSozinho;

    /** @ORM\OneToOne(targetEntity="PessoaEntity", mappedBy="menor") */
    private $pessoa;

    /** 
     * @ORM\ManyToOne(targetEntity="ResponsavelEntity", inversedBy="menores")
     * @ORM\JoinColumn(name="seq_responsavel", referencedColumnName="seq_responsavel", nullable=false)
     */
    private $responsavel;
}