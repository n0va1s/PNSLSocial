<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\PessoaEntity;
use PNSL\Social\Entity\ResponsavelEntity;

class ResponsavelService
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
            $responsavel = new ResponsavelEntity();
            $responsavel->setPessoa($pessoa);
            $responsavel->setProfissao(utf8_encode($dados['profissao']));
            $responsavel->setEstadoCivil(utf8_encode($dados['estado_civil']));
            $responsavel->setAssinouTermo($dados['assinou_termo']);
            $responsavel->setUsuarioInclusao($dados['usuario']);
            $responsavel->setUsuarioAlteracao($dados['usuario']);
            $this->em->persist($responsavel);
        } else {
            $responsavel->setProfissao(utf8_encode($dados['profissao']));
            $responsavel->setEstadoCivil(utf8_encode($dados['estado_civil']));
            $responsavel->setAssinouTermo($dados['assinou_termo']);
            $responsavel->setPessoa($pessoa);
        }
        $this->em->flush();
        if ($responsavel) {
            return $pessoa_id;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $responsavel = $this->em->getReference(
            '\PNSL\Social\Entity\ResponsavelEntity', $id
        );
        if ($responsavel) {
            $this->em->remove($responsavel);
            $this->em->flush();
            return true;
        } else {
            return false;
        }
    }
    
    public function fetchAll()
    {
        $responsavels = $this->em->createQuery(
            'select v from \PNSL\Social\Entity\ResponsavelEntity v
            join v.pessoa'
        )->getArrayResult();
        return $responsavels;
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