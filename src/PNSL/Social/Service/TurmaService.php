<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\AcaoEntity;
use PNSL\Social\Entity\TurmaEntity;

class TurmaService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        $turma = $this->em->getReference(
            '\PNSL\Social\Entity\TurmaEntity', 
            $dados['seq_turma']
        );
        if ($turma) {
            if (empty($turma->getId)) {
                $turma = new TurmaEntity();
                $turma->setDescricao(utf8_encode($dados['descricao']));
                $turma->setDataInicio($dados['inicio']);
                $turma->setDataTermino($dados['termino']);
                $turma->setUsuarioInclusao(utf8_encode($dados['usuario']));
                $turma->setUsuarioAlteracao(utf8_encode($dados['usuario']));
                $this->em->persist($turma);
            } else {
                $turma = $this->em->getReference('\PNSL\Social\Entity\TurmaEntity', $turma->getId);
                $turma->setDescricao(utf8_encode($dados['descricao']));
                $turma->setDataInicio($dados['inicio']);
                $turma->setDataTermino($dados['termino']);
                $turma->setUsuarioAlteracao(utf8_encode($dados['usuario']));
            }
            $this->em->flush();
            return true;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $turma = $this->em->getReference(
            '\PNSL\Social\Entity\TurmaEntity', $id
        );
        $this->em->remove($turma);
        return $this->em->flush();
    }
    
    public function fetchAll()
    {
        $turmas = $this->em->createQuery(
            'select t from \PNSL\Social\Entity\TurmaEntity t '
        )->getArrayResult();
        return $turmas;
    }
    
    public function findById(int $id)
    {
        $turma = $this->em->createQuery(
            'select t from \PNSL\Social\Entity\TurmaEntity t where t.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $turma;
    }
}