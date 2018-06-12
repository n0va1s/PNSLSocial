<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use PNSL\Social\Entity\PessoaEntity;
use PNSL\Social\Entity\MenorEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="responsavel")
 */
class ResponsavelEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="seq_responsavel")
     */
    private $id;

    /** @ORM\Column(type="string", length=3, name="tip_parentesco") */
    private $parentesco;

    /** @ORM\Column(type="string", length=1, name="ind_empregado") */
    private $empregado;

    /** @ORM\Column(type="string", length=1, name="ind_termo_imagem") */
    private $autorizouImagem;

    /** @ORM\Column(type="string", length=1, name="ind_autorizou_sair_sozinho") */
    private $autorizouSairSozinho;

    /** @ORM\OneToOne(targetEntity="PessoaEntity", mappedBy="responsavel") */
    private $pessoa;

    /** @ORM\OneToMany(targetEntity="MenorEntity", mappedBy="responsavel") */
    private $menores;

    public function __construct()
    {
        $this->menores = new ArrayCollection();
    }

}
