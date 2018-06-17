<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\PessoaEntity;
use PNSL\Social\Entity\ContatoEntity;
use PNSL\Social\Entity\EnderecoEntity;

class ContatoService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        $pessoa = $this->em->getReference(
            '\PNSL\Social\Entity\PessoaEntity', 
            $dados['seq_pessoa']
        );
        if ($pessoa) {
            if ($pessoa != $contato->getPessoa()) {
                $contato = new ContatoEntity();
                $contato->setTipo($dados['tipo']);
                $contato->setContato(utf8_encode($dados['contato']));
                $contato->setPessoa($pessoa);
                $this->em->persist($contato);
            } else {
                $contato = $this->em->getReference('\PNSL\Social\Entity\ContatoEntity', $id);
                $contato->setTipo($dados['tipo']);
                $contato->setContato(utf8_encode($dados['contato']));
                $contato->setPessoa($pessoa);
            }
            $this->em->flush();
            return true;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $pessoa = $this->em->getReference(
            '\PNSL\Social\Entity\PessoaEntity', $id
        );
        $this->em->remove($pessoa);
        return $this->em->flush();
    }
    
    public function fetchAll()
    {
        $pessoas = $this->em->createQuery(
            'select p from \PNSL\Social\Entity\PessoaEntity p '
        )->getArrayResult();
        return $pessoas;
    }
    
    public function findById(int $id)
    {
        $pessoa = $this->em->createQuery(
            'select p from \PNSL\Social\Entity\PessoaEntity p where p.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $pessoa;
    }
}