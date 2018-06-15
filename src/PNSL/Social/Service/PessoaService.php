<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\PessoaEntity;
use PNSL\Social\Entity\ContatoEntity;
use PNSL\Social\Entity\EnderecoEntity;

class PessoaService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        if (is_array($dados)) {
            if (empty($dados['id'])) {                
                $pessoa = new PessoaEntity();
                $pessoa->setNome(utf8_encode($dados['nome']));
                $pessoa->setGenero($dados['genero']);
                $pessoa->setDataNascimento(new \DateTime($dados['data_nascimento']));
                $pessoa->setNumRG($dados['num_rg']);
                $pessoa->setNumCPF($dados['num_cpf']);
                $pessoa->setNaturalidade(utf8_encode($dados['naturalidade']));
                $pessoa->setUsuario(utf8_encode($dados['usuario']));;
                $this->em->persist($pessoa);
            } else {
                $pessoa = $this->em->getReference('\PNSL\Social\Entity\PessoaEntity', $id);
                $pessoa->setNome(utf8_encode($dados['nome']));
                $pessoa->setGenero($dados['genero']);
                $pessoa->setDataNascimento(new \DateTime($dados['data_nascimento']));
                $pessoa->setNumRG($dados['num_rg']);
                $pessoa->setNumCPF($dados['num_cpf']);
                $pessoa->setNaturalidade(utf8_encode($dados['naturalidade']));
                $pessoa->setUsuario(utf8_encode($dados['usuario']));;
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