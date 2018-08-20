<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;

class AcaoService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        $acao = $this->em->getReference(
            '\PNSL\Social\Entity\AcaoEntity', 
            $dados['seq_acao']
        );
        if (empty($acao)) {
            if (empty($acao->getId())) {
                $acao = new AcaoEntity();
                $acao->setParentesco($dados['parentesco']);
                $acao->setNome($dados['nome']);
                $acao->setFrequencia($dados['frequencia']);
                $acao->setDiaSemana($dados['diaSemana']);
                $acao->setTurno($dados['turno']);
                $acao->setInicio($dados['inicio']);
                $acao->setTermino($dados['termino']);
                $acao->setDescricao($dados['descricao']);
                $acao->setVoluntario(new VoluntarioEntity());
                $acao->setUsuarioInclusao(utf8_encode($dados['usuario']));
                $acao->setUsuarioAlteracao(utf8_encode($dados['usuario']));
                $this->em->persist($acao);
            } else {
                $acao->setParentesco($dados['parentesco']);
                $acao->setNome($dados['nome']);
                $acao->setFrequencia($dados['frequencia']);
                $acao->setDiaSemana($dados['diaSemana']);
                $acao->setTurno($dados['turno']);
                $acao->setInicio($dados['inicio']);
                $acao->setTermino($dados['termino']);
                $acao->setDescricao($dados['descricao']);
                $acao->setUsuarioAlteracao(utf8_encode($dados['usuario']));
                $acao->setVoluntario(new VoluntarioEntity());
            }
            $this->em->flush();
            return true;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $acao = $this->em->getReference(
            '\PNSL\Social\Entity\AcaoEntity', $id
        );
        $this->em->remove($acao);
        return $this->em->flush();
    }
    
    public function fetchAll()
    {
        $acoes = $this->em->createQuery(
            'select a from \PNSL\Social\Entity\AcaoEntity a 
            join a.voluntario v'
        )->getArrayResult();
        return $acoes;
    }
    
    public function findById(int $id)
    {
        $acao = $this->em->createQuery(
            'select a from \PNSL\Social\Entity\AcaoEntity a 
            join a.voluntario p where p.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $acao;
    }
}