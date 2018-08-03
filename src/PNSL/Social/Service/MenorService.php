<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\PessoaEntity;
use PNSL\Social\Entity\MenorEntity;

class MenorService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($pessoa_id, $dados)
    {
        $pessoa = $this->em->getReference(
            '\PNSL\Social\Entity\PessoaEntity', 
            $pessoa_id
        );
        if (empty($dados['id'])) {
            $menor = new MenorEntity();
            $menor->setPessoa($pessoa);
            $menor->setEscola(utf8_encode($dados['escola']));
            $menor->setAno(utf8_encode($dados['ano']));
            $menor->setTurno($dados['turno']);
            $menor->setGrau($dados['grau']);
            $menor->setAutorizadoSairSozinho($dados['autorizadoSairSozinho']);
            $menor->setResponsavel($dados['responsavel']);
            $menor->setUsuarioInclusao($dados['usuario']);
            $menor->setUsuarioAlteracao($dados['usuario']);
            $this->em->persist($menor);
        } else {
            $menor->setEscola(utf8_encode($dados['escola']));
            $menor->setAno(utf8_encode($dados['ano']));
            $menor->setTurno($dados['turno']);
            $menor->setGrau($dados['grau']);
            $menor->setAutorizadoSairSozinho($dados['autorizadoSairSozinho']);
            $menor->setResponsavel($dados['responsavel']);
            $menor->setUsuarioAlteracao($dados['usuario']);
            $menor->setPessoa($pessoa);
        }
        $this->em->flush();
        if ($menor) {
            return $pessoa_id;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $menor = $this->em->getReference(
            '\PNSL\Social\Entity\MenorEntity', $id
        );
        if ($menor) {
            $this->em->remove($menor);
            $this->em->flush();
            return true;
        } else {
            return false;
        }
    }
    
    public function fetchAll()
    {
        $menors = $this->em->createQuery(
            'select v from \PNSL\Social\Entity\MenorEntity v
            join v.pessoa'
        )->getArrayResult();
        return $menors;
    }
    
    public function findById(int $id)
    {
        $menor = $this->em->createQuery(
            'select v from \PNSL\Social\Entity\MenorEntity v 
            join v.pessoa p where p.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $menor;
    }
}