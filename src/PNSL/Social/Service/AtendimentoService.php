<?php
namespace PNSL\Social\Service;

use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\AcaoEntity;
use PNSL\Social\Entity\AtendimentoEntity;
use PNSL\Social\Entity\UsuarioEntity;

class AtendimentoService
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
            $dados['acao']
        );
        $usuario = $this->em->getReference(
            '\PNSL\Social\Entity\PessoaEntity', 
            $dados['usuario']
        );
        if (empty($dados['id'])) {
            $atendimento = new AtendimentoEntity();
            $atendimento->setAcao($acao);
            $atendimento->setPessoa($usuario);
            $atendimento->setDataAtendimento($dados['data']);
            $atendimento->setTexto($dados['atendimento']);
            $atendimento->setLogInclusao($dados['usuario']);
            $atendimento->setLogAlteracao($dados['usuario']);
            $this->em->persist($atendimento);
        } else {
            $atendimento = $this->em->getReference(
                '\PNSL\Social\Entity\AtendimentoEntity',
                $dados['id']
            );
            $atendimento->setAcao($acao);
            $atendimento->setPessoa($usuario);
            $atendimento->setDataAtendimento($dados['data']);
            $atendimento->setTexto($dados['atendimento']);
            $atendimento->setLogAlteracao($dados['usuario']);
        }
        if ($atendimento) {
            $this->em->flush();
            return $atendimento;                
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $atendimento = $this->em->getReference(
            '\PNSL\Social\Entity\AtendimentoEntity', $id
        );
        $this->em->remove($atendimento);
        return $this->em->flush();
    }
    
    public function fetchAll()
    {
        $atendimentos = $this->em->createQuery(
            'select at, ps, ac, vo, pe from \PNSL\Social\Entity\AtendimentoEntity at 
            join at.pessoa ps
            join at.acao ac
            join ac.voluntario vo
            join vo.pessoa pe'
        )->getArrayResult();
        return $atendimentos;
    }
    
    public function findById(int $id)
    {
        $atendimento = $this->em->createQuery(
            'select t, a, p from \PNSL\Social\Entity\AtendimentoEntity t
            join t.acao a
            join t.pessoa p
            where t.id = :id'
        )->setParameter('id', $id)->getOneOrNullResult();
        return $atendimento;
    }
}