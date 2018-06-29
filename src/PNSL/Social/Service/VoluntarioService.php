<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\PessoaEntity;
use PNSL\Social\Entity\VoluntarioEntity;

class VoluntarioService
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
            $voluntario = new VoluntarioEntity();
            $voluntario->setPessoa($pessoa);
            $voluntario->setProfissao(utf8_encode($dados['profissao']));
            $voluntario->setEstadoCivil(utf8_encode($dados['estado_civil']));
            $voluntario->setConhecimento($dados['conhecimento']);
            $voluntario->setAssinouTermo($dados['assinou_termo']);
            $voluntario->setUsuarioInclusao($dados['usuario']);
            $voluntario->setUsuarioAlteracao($dados['usuario']);
            $this->em->persist($voluntario);
        } else {
            $voluntario->setProfissao(utf8_encode($dados['profissao']));
            $voluntario->setEstadoCivil(utf8_encode($dados['estado_civil']));
            $voluntario->setConhecimento($dados['conhecimento']);
            $voluntario->setAssinouTermo($dados['conhecimento']);
            $voluntario->setUsuarioAlteracao($dados['usuario']);
            $voluntario->setPessoa($pessoa);
        }
        $this->em->flush();
        if ($voluntario) {
            return $pessoa_id;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $voluntario = $this->em->getReference(
            '\PNSL\Social\Entity\VoluntarioEntity', $id
        );
        if ($voluntario) {
            $this->em->remove($voluntario);
            $this->em->flush();
            return true;
        } else {
            return false;
        }
    }
    
    public function fetchAll()
    {
        $voluntarios = $this->em->createQuery(
            'select v from \PNSL\Social\Entity\VoluntarioEntity v
            join v.pessoa'
        )->getArrayResult();
        return $voluntarios;
    }
    
    public function findById(int $id)
    {
        $voluntario = $this->em->createQuery(
            'select v from \PNSL\Social\Entity\VoluntarioEntity v 
            join v.pessoa p where p.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $voluntario;
    }
}