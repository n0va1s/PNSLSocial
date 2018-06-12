<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class UsuarioEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="seq_usuario")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\Column(type="string", name="nom_usuario", length=50, unique=true, nullable=false) */
    private $nome;

    /** @ORM\Column(type="string", name="pwd_usuario", length=100, nullable=false) */
    private $senha;

    /** @ORM\Column(type="datetime", name="dat_criacao") */
    private $dataCriacao;

    /** @ORM\Column(type="datetime", name="dat_atualizacao") */
    private $dataAtualizacao;

    public function __construct()
    {
        $this->dataCriacao = new \Datetime();
        $this->dataAtualizacao = new \Datetime();
    }
}