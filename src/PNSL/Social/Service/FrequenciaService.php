<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\TurmaEntity;
use PNSL\Social\Entity\FrequenciaEntity;

class FrequenciaService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        foreach ($dados as $valor) {
            $turma = $this->em->getReference(
                '\PNSL\Social\Entity\TurmaEntity', 
                $valor['turma']
            );
            if ($turma) {
                $frequencia = new FrequenciaEntity();
                $frequencia->setData($valor['data']);
                $frequencia->setUsuarioInclusao('usuarioInc');
                $frequencia->setUsuarioAlteracao('usuarioAlt');
                $this->em->persist($frequencia);
                $frequencia->setTurma($turma);
                $this->em->flush();
            } else {
                return false;
            }
        }
        return true;
    }
    
    public function delete(int $id)
    {
        $frequencia = $this->em->getReference(
            '\PNSL\Social\Entity\FrequenciaEntity', $id
        );
        $this->em->remove($frequencia);
        return $this->em->flush();
    }

    public function fetchAll()
    {
        $frequencias = $this->em->createQuery(
            'select f 
            from \PNSL\Social\Entity\FrequenciaEntity f
            join turma t
            join t.acao a
            join t.pessoa p
            where a.dataExclusao is null'
        )->getArrayResult();
        return $frequencias;
    }
    
    public function findById(int $id)
    {
        $frequencia = $this->em->createQuery(
            'select f from \PNSL\Social\Entity\FrequenciaEntity f where f.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $frequencia;
    }

    public function findByTurma(int $id)
    {
        $frequencia = $this->em->createQuery(
            'select f, t, a, p, v
            from \PNSL\Social\Entity\FrequenciaEntity f 
            join f.turma t
            join t.acao a
            join a.voluntario v
            join t.pessoa p
            where f.id = :id'
        )->setParameter('id', $id)->getOneOrNullResult();
        return $frequencia;
    }
}