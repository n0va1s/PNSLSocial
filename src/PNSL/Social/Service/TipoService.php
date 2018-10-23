<?php
namespace PNSL\Social\Service;

use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\TipoEntity;

class TipoService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        if (empty($dados['id'])) {
            $tipo = new TipoEntity();
            $tipo->setDescricao($dados['descricao']);
            $tipo->setGrupo($dados['grupo']);
            $this->em->persist($tipo);
        } else {
            $tipo = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['id']
            );
            $tipo->setDescricao($dados['descricao']);
            $tipo->setGrupo($dados['grupo']);
        }
        $this->em->flush();
        if ($tipo) {
            return $tipo;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $tipo = $this->em->getReference(
            '\PNSL\Social\Entity\TipoEntity', $id
        );
        $this->em->remove($tipo);
        return $this->em->flush();
    }
    
    public function fetchAll()
    {
        $tipos = $this->em->createQuery(
            'select t from \PNSL\Social\Entity\TipoEntity t '
        )->getArrayResult();
        return $tipos;
    }
    
    public function findById(int $id)
    {
        $tipo = $this->em->createQuery(
            'select t from \PNSL\Social\Entity\TipoEntity t where t.id = :id'
        )->setParameter('id', $id)->getOneOrNullResult();
        return $tipo;
    }

    public function findByGrupo($grupo)
    {
        $tipos = $this->em->createQuery(
            'select t from \PNSL\Social\Entity\TipoEntity t where t.grupo = :grupo'
        )->setParameter('grupo', $grupo)->getArrayResult();
        return $tipos;
    }
}