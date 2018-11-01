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
            $dados['id']
        );
        if ($acesso) {
            $pessoa = $this->em->getReference(
                '\PNSL\Social\Entity\PessoaEntity', 
                $dados['voluntario']
            );
            $perfil = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['perfil']
            );
            if (empty($dados['id'])) {
                $acesso = new AcessoEntity();
                $acesso->setPessoa($pessoa);
                $acesso->setNome($dados['login']);
                $acesso->setSenha($dados['password']);
                $acesso->setPerfil($perfil);
                $acesso->setLogInclusao($dados['usuario']);
                $acesso->setLogAlteracao($dados['usuario']);
                $this->em->persist($acesso);
                
            } else {
                $acesso->setPessoa($pessoa);
                $acesso->setNome($dados['login']);
                $acesso->setSenha($dados['password']);
                $acesso->setPerfil($perfil);
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
            'select a, p
            from \PNSL\Social\Entity\AcessoEntity a
            join a.perfil p'
        )->getArrayResult();
        return $acessos;
    }
    
    public function findById(int $id)
    {
        $acesso = $this->em->createQuery(
            'select a, p, f
            from \PNSL\Social\Entity\AcessoEntity a 
            join a.pessoa p
            join a.perfil f
            where a.pessoa = :id'
        )->setParameter('id', $id)->getOneOrNullResult();
        return $acesso;
    }
}