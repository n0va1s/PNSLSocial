<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Common\Collections\ArrayCollection;
use PNSL\Social\Entity\AcaoEntity;
use PNSL\Social\Entity\TipoEntity;

class AcaoService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        $voluntario = $this->em->getReference(
            '\PNSL\Social\Entity\VoluntarioEntity', 
            $dados['voluntario']
        );
        $tipo_acao = $this->em->getReference(
            '\PNSL\Social\Entity\TipoEntity', 
            $dados['tipo_acao']
        );

        if (empty($dados['id'])) {
            $acao = new AcaoEntity();
            $acao->setNome($dados['acao']);
            $acao->setInicio($dados['inicio']);
            $acao->setTermino($dados['termino']);
            $acao->setPublicoAlvo($dados['publico-alvo']);
            $acao->setPreRequisito($dados['pre-requisito']);
            $acao->setEntrada($dados['entrada']);
            $acao->setSaida($dados['saida']);
            $acao->setSegunda($dados['segunda']);
            $acao->setTerca($dados['terca']);
            $acao->setQuarta($dados['quarta']);
            $acao->setQuinta($dados['quinta']);
            $acao->setSexta($dados['sexta']);
            $acao->setSabado($dados['sabado']);
            $acao->setDomingo($dados['domingo']);
            $acao->setTurno($dados['turno']);
            $acao->setVoluntario($voluntario);
            $acao->setTipo($tipo_acao);
            $acao->setUsuarioInclusao('usuarioInc');
            $acao->setUsuarioAlteracao('usuarioAlt');
            $this->em->persist($acao);
        } else {
            $acao = $this->em->getReference(
                '\PNSL\Social\Entity\AcaoEntity', 
                $dados['id']
            );
            $acao->setNome($dados['acao']);
            $acao->setInicio($dados['inicio']);
            $acao->setTermino($dados['termino']);
            $acao->setPublicoAlvo($dados['publico-alvo']);
            $acao->setPreRequisito($dados['pre-requisito']);
            $acao->setEntrada($dados['entrada']);
            $acao->setSaida($dados['saida']);
            $acao->setSegunda($dados['segunda']);
            $acao->setTerca($dados['terca']);
            $acao->setQuarta($dados['quarta']);
            $acao->setQuinta($dados['quinta']);
            $acao->setSexta($dados['sexta']);
            $acao->setSabado($dados['sabado']);
            $acao->setDomingo($dados['domingo']);
            $acao->setTurno($dados['turno']);
            $acao->setVoluntario($voluntario);
            $acao->setTipo($tipo_acao);
            $acao->setUsuarioAlteracao('usuarioAlt');
        }

        $this->em->flush();
        if ($acao) {
            echo "7";
            return $acao;
        } else {
            echo "8";
            return false;
        }
}
    
    public function delete(int $id)
    {
        $acao = $this->em->getReference(
            '\PNSL\Social\Entity\AcaoEntity', $id
        );
        if ($acao) {
            $this->em->remove($acao);
            $this->em->flush();
            return true;
        } else {
            return false;
        }
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