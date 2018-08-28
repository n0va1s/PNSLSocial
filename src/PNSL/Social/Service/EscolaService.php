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
                $escola->setPessoa($pessoa);
                $escola->setEscola($dados['escola']);
                $escola->setAno($dados['ano']);
                $escola->setTurno($dados['turno']);
                $escola->setGrau($dados['grau']);                    
                $escola->setUsuarioInclusao('usuarioInc');
                $escola->setUsuarioAlteracao('usuarioAlt');
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
            'select p, v from \PNSL\Social\Entity\EscolaEntity e 
            join e.pessoa p order by p.nome ASC'
        )->getArrayResult();
        return $pessoas;
    }
    
    public function findById(int $id)
    {
        $pessoa = $this->em->createQuery(
            'select p, v, tt, es from \PNSL\Social\Entity\EscolaEntity e 
            join e.pessoa p
            where p.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $pessoa[0]; //TODO: substituir o array pelo getSingleResult. Ao usar travou
    }
}