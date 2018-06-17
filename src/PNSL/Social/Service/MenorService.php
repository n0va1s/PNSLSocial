<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\PessoaEntity;

class MenorService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        $menor = $this->em->getReference(
            '\PNSL\Social\Entity\MenorEntity', 
            $dados['seq_pessoa']
        );
        if (empty($menor)) {
            if (empty($menor->getId())) {
                $menor = new MenorEntity(
                    $dados['escola'], $dados['ano'],
                    $dados['turno'], $dados['grau'],
                    $dados['autorizadoSairSozinho'],
                    new ResponsavelEntity()
                );
                $this->em->persist($menor);
            } else {
                $menor->setEscola($dados['escola']);
                $menor->setAno($dados['ano']);
                $menor->setTurno($dados['turno']);
                $menor->setGrau($dados['grau']);
                $menor->setAutorizadoSairSozinho($dados['autorizouSairSozinho']);
            }
            $this->em->flush();
            return true;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $menor = $this->em->getReference(
            '\PNSL\Social\Entity\MenorEntity', $id
        );
        $this->em->remove($menor);
        return $this->em->flush();
    }
    
    public function fetchAll()
    {
        $responsaveis = $this->em->createQuery(
            'select r from \PNSL\Social\Entity\MenorEntity r 
            join r.pessoa p'
        )->getArrayResult();
        return $menors;
    }
    
    public function findById(int $id)
    {
        $menor = $this->em->createQuery(
            'select v from \PNSL\Social\Entity\MenorEntity m 
            join m.pessoa p where p.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $menor;
    }
}