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
        $frequencia = $this->em->getReference(
            '\PNSL\Social\Entity\FrequenciaEntity', 
            $dados['seq_frequencia']
        );
        if ($frequencia) {
            if (empty($frequencia->getId)) {
                $frequencia = new FrequenciaEntity();
                $frequencia->setData($dados['data']);
                $frequencia->setPresenca($dados['presenca']);
                $frequencia->setInativo($dados['inativo']);
                $frequencia->setTurma(new TurmaEntity());
                $frequencia->setAtendido(new PessoaEntity());
                $frequencia->setUsuarioInclusao(utf8_encode($dados['usuario']));
                $frequencia->setUsuarioAlteracao(utf8_encode($dados['usuario']));
                $this->em->persist($frequencia);
            } else {
                $frequencia = $this->em->getReference(
                    '\PNSL\Social\Entity\FrequenciaEntity', 
                    $id
                );
                $frequencia->setData($dados['data']);
                $frequencia->setPresenca($dados['presenca']);
                $frequencia->setInativo($dados['inativo']);
                $frequencia->setTurma(new TurmaEntity());
                $frequencia->setAtendido(new PessoaEntity());
                $frequencia->setUsuarioAlteracao(utf8_encode($dados['usuario']));
            }
            $this->em->flush();
            return true;
        } else {
            return false;
        }
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
            'select f from \PNSL\Social\Entity\FrequenciaEntity f '
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
}