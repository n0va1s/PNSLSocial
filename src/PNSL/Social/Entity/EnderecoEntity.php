<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use PNSL\Social\Entity\PessoaEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="endereco")
 */
class EnderecoEntity
{
    /** 
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="seq_endereco") */
    private $id;

    /** @ORM\Column(type="string", length=255, name="des_logradouro") */
    private $logradouro;

    /** @ORM\Column(type="string", length=100, name="des_bairro") */
    private $bairro;

    /** @ORM\Column(type="string", length=100, name="des_cidade") */
    private $cidade;

    /** @ORM\OneToOne(targetEntity="PessoaEntity", mappedBy="pessoa") */
    private $pessoa;

}