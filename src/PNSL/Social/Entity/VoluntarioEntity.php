<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\AcaoEntity;
use PNSL\Social\Entity\PessoaEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="voluntario")
 */
class VoluntarioEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="seq_voluntario")
     */
    private $id;
    
    /** @ORM\Column(type="string", length=255, name="nom_profissao") */
    private $profissao;

    /** @ORM\Column(type="string", length=1, name="tip_estado_civil") */
    private $estadoCivil;

    /** @ORM\Column(type="string", length=1, name="ind_assinou_termo") */
    private $assinouTermo;

    /** @ORM\OneToOne(targetEntity="PessoaEntity", mappedBy="voluntario") */
    private $pessoa;
    
    /** @ORM\OneToMany(targetEntity="AcaoEntity", mappedBy="voluntario") */
    private $acao;
    
}