<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\PessoaEntity;
use PNSL\Social\Entity\TipoContatoEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="contato")
 */
class ContatoEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="seq_contato")     
     */
    private $id;

    /** @ORM\Column(type="string", length=255, name="des_contato") */
    private $contato;

    /**
     * @ORM\OneToOne(targetEntity="TipoContatoEntity")
     * @ORM\JoinColumn(name="seq_tipo_contato", referencedColumnName="seq_tipo_contato", nullable=false)
     */
    private $tipo;

    /** 
     * @ORM\ManyToOne(targetEntity="PessoaEntity", inversedBy="contatos")
     * @ORM\JoinColumn(name="seq_pessoa", referencedColumnName="seq_pessoa", nullable=false)
     */
    private $pessoa;
}