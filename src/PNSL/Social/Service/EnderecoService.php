<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\EnderecoEntity;
use PNSL\Social\Entity\ContatoEntity;
use PNSL\Social\Entity\EnderecoEntity;

class EnderecoService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        $endereco = $this->em->getReference('\PNSL\Social\Entity\EnderecoEntity', $dados['seq_pessoa']);
        if (empty($endereco)) {
            if (empty($endereco->getId())) {
                $endereco = new EnderecoEntity();
                $endereco->setLogradouro($dados['logradouro']);
                $endereco->setBairro($dados['bairro']);
                $endereco->setCidade($dados['cidade']);
                $endereco->setUf($dados['uf']);
                $endereco->setPessoa($pessoa);
                $this->em->persist($endereco);
            } else {
                $endereco->setLogradouro($dados['logradouro']);
                $endereco->setBairro($dados['bairro']);
                $endereco->setCidade($dados['cidade']);
                $endereco->setUf($dados['uf']);
                $endereco->setPessoa($endereco);
            }
            $this->em->flush();
            return true;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $endereco = $this->em->getReference(
            '\PNSL\Social\Entity\EnderecoEntity', $id
        );
        $this->em->remove($endereco);
        return $this->em->flush();
    }
    
    public function fetchAll()
    {
        $enderecos = $this->em->createQuery(
            'select e from \PNSL\Social\Entity\EnderecoEntity e 
            join v.pessoa p'
        )->getArrayResult();
        return $enderecos;
    }
    
    public function findById(int $id)
    {
        $endereco = $this->em->createQuery(
            'select p from \PNSL\Social\Entity\EnderecoEntity p where p.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $endereco;
    }
}