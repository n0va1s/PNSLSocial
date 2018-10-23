<?php
namespace PNSL\Social\Service;

use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\AcessoEntity;

class AcessoService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        $acesso = $this->em->getReference(
            '\PNSL\Social\Entity\AcessoEntity', 
            $dados['seq_acesso']
        );
        if ($acesso) {
            if (empty($acesso->getId)) {
                $acesso = new AcessoEntity();
                $acesso->setNome(utf8_encode($dados['nome']));
                $acesso->setSenha(utf8_encode($dados['senha']));
                $acesso->setPerfil($dados['perfil']);
                $acesso->setLogInclusao($dados['usuario']);
                $acesso->setLogAlteracao($dados['usuario']);
                $this->em->persist($acesso);
            } else {
                $acesso = $this->em->getReference('\PNSL\Social\Entity\AcessoEntity', $id);
                $acesso->setNome(utf8_encode($dados['nome']));
                $acesso->setSenha(utf8_encode($dados['senha']));
                $acesso->setPerfil($dados['perfil']);
                $acesso->setLogAlteracao($dados['usuario']);
            }
            $this->em->flush();
            return true;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $acesso = $this->em->getReference(
            '\PNSL\Social\Entity\AcessoEntity', $id
        );
        $this->em->remove($acesso);
        return $this->em->flush();
    }
    
    public function fetchAll()
    {
        $acessos = $this->em->createQuery(
            'select a from \PNSL\Social\Entity\AcessoEntity a '
        )->getArrayResult();
        return $acessos;
    }
    
    public function findById(int $id)
    {
        $acesso = $this->em->createQuery(
            'select p from \PNSL\Social\Entity\AcessoEntity a where a.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $acesso;
    }
}