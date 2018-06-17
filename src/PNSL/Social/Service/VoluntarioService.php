<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\PessoaEntity;

class VoluntarioService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        $voluntario = $this->em->getReference('\PNSL\Social\Entity\VoluntarioEntity', $dados['seq_pessoa']);
        if (empty($voluntario)) {
            if (empty($voluntario->getId())) {
                $voluntario = new VoluntarioEntity();
                $voluntario->setProfissao(utf8_encode($dados['profissao']));
                $voluntario->setEstadoCivil(utf8_encode($dados['estado_civil']));
                $voluntario->setAssinouTermo($dados['assinou_termo']);
                $pessoa->setPessoa($pessoa);
                $this->em->persist($voluntario);
            } else {
                $voluntario->setProfissao(utf8_encode($dados['profissao']));
                $voluntario->setEstadoCivil(utf8_encode($dados['estado_civil']));
                $voluntario->setAssinouTermo($dados['assinou_termo']);
                $pessoa->setPessoa($pessoa);
            }
            $this->em->flush();
            return true;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $voluntario = $this->em->getReference(
            '\PNSL\Social\Entity\VoluntarioEntity', $id
        );
        $this->em->remove($voluntario);
        return $this->em->flush();
    }
    
    public function fetchAll()
    {
        $voluntarios = $this->em->createQuery(
            'select v from \PNSL\Social\Entity\VoluntarioEntity v 
            join v.pessoa p'
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