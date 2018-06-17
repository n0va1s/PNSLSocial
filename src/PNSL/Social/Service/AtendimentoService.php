<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\AcaoEntity;
use PNSL\Social\Entity\TurmaEntity;

class AtendimentoService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        $atendimento = $this->em->getReference(
            '\PNSL\Social\Entity\AtendimentoEntity', 
            $dados['seq_atendimento']
        );
        if ($atendimento) {
            if (empty($atendimento->getId)) {
                $atendimento = new AtendimentoEntity();
                $atendimento->setAcao(new AcaoEntity());
                $atendimento->setatendido(new PessoaEntity());
                $atendimento->setDataAtendimento($dados['dataAtendimento']);
                $atendimento->setTexto(utf8_encode($dados['texto']));
                $this->em->persist($atendimento);
            } else {
                $atendimento = $this->em->getReference('\PNSL\Social\Entity\AtendimentoEntity', $id);
                $atendimento->setAcao(new AcaoEntity());
                $atendimento->setatendido(new PessoaEntity());
                $atendimento->setDataAtendimento($dados['dataAtendimento']);
                $atendimento->setTexto(utf8_encode($dados['texto']));
            }
            $this->em->flush();
            return true;
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
            'select a from \PNSL\Social\Entity\AtendimentoEntity a '
        )->getArrayResult();
        return $atendimentos;
    }
    
    public function findById(int $id)
    {
        $atendimento = $this->em->createQuery(
            'select p from \PNSL\Social\Entity\AtendimentoEntity a where a.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $atendimento;
    }
}