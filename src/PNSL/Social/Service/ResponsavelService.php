<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\PessoaEntity;

class ResponsavelService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        $responsavel = $this->em->getReference(
            '\PNSL\Social\Entity\ResponsavelEntity', 
            $dados['seq_pessoa']
        );
        if (empty($responsavel)) {
            if (empty($responsavel->getId())) {
                $responsavel = new ResponsavelEntity();
                $responsavel->setParentesco($dados['parentesco']);
                $responsavel->setEmpregado($dados['empregado']);
                $responsavel->setAutorizouImagem($dados['autorizouImagem']);
                $responsavel->setAutorizouSairSozinho($dados['autorizouSairSozinho']);
                $responsavel->setMenores(new MenorEntity());
                $responsavel->setPessoa($pessoa);
                $this->em->persist($responsavel);
            } else {
                $responsavel->setParentesco($dados['parentesco']);
                $responsavel->setEmpregado($dados['empregado']);
                $responsavel->setAutorizouImagem($dados['autorizouImagem']);
                $responsavel->setAutorizouSairSozinho($dados['autorizouSairSozinho']);
            }
            $this->em->flush();
            return true;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $responsavel = $this->em->getReference(
            '\PNSL\Social\Entity\ResponsavelEntity', $id
        );
        $this->em->remove($responsavel);
        return $this->em->flush();
    }
    
    public function fetchAll()
    {
        $responsaveis = $this->em->createQuery(
            'select r from \PNSL\Social\Entity\ResponsavelEntity r 
            join r.pessoa p'
        )->getArrayResult();
        return $responsaveis;
    }
    
    public function findById(int $id)
    {
        $responsavel = $this->em->createQuery(
            'select v from \PNSL\Social\Entity\ResponsavelEntity v 
            join v.pessoa p where p.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $responsavel;
    }
}