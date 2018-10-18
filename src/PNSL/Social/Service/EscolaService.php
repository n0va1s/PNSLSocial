<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\PessoaEntity;
use PNSL\Social\Entity\EscolaEntity;

class EscolaService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($pessoa, $dados)
    {
        if ($pessoa) {
            if (!empty($dados['escola'])) {
                $escola = new EscolaEntity();
                $escola->setEscola($dados['escola']);
                $escola->setAno($dados['ano']);
                $escola->setTurno(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['turno']
                    )
                );
                $escola->setGrau(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['grau']
                    )
                );
                $escola->setLogInclusao('usuarioInc');
                $escola->setLogAlteracao('usuarioAlt');
                $escola->setPessoa($pessoa);
                $this->em->persist($escola);
                $this->em->flush();
                return $escola;
                //Insere no banco de dados a pessoa e os dados da escola
                $this->em->flush();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public function fetchAll()
    {
        $pessoas = $this->em->createQuery(
            'select p, e, g, t from \PNSL\Social\Entity\EscolaEntity e 
            join e.pessoa p 
            join e.grau g
            join e.turno t 
            order by p.nome ASC'
        )->getArrayResult();
        return $pessoas;
    }
    
    public function findById(int $id)
    {
        $pessoa = $this->em->createQuery(
            'select p, e, g, t from \PNSL\Social\Entity\EscolaEntity e 
            join e.pessoa p
            join e.grau g
            join e.turno t 
            where p.id = :id'
        )->setParameter('id', $id)->getOneOrNullResult();
        return $pessoa; 
    }
}