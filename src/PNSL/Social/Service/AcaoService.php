<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Common\Collections\ArrayCollection;
use PNSL\Social\Entity\AcaoEntity;
use PNSL\Social\Entity\PessoaEntity;
use PNSL\Social\Entity\TurmaEntity;
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
        $publico_alvo = $this->em->getReference(
            '\PNSL\Social\Entity\TipoEntity', 
            $dados['publico_alvo']
        );
        $faixa_etaria = $this->em->getReference(
            '\PNSL\Social\Entity\TipoEntity', 
            $dados['faixa_etaria']
        );
        $dia_semana = $this->em->getReference(
            '\PNSL\Social\Entity\TipoEntity', 
            $dados['dia_semana']
        );
        $turno = $this->em->getReference(
            '\PNSL\Social\Entity\TipoEntity', 
            $dados['turno']
        );
        $local = $this->em->getReference(
            '\PNSL\Social\Entity\TipoEntity', 
            $dados['local']
        );

        if (empty($dados['id'])) {
            $acao = new AcaoEntity();
            $acao->setNome($dados['acao']);
            $acao->setProposito($dados['proposito']);
            $acao->setInicio($dados['inicio']);
            $acao->setTermino($dados['termino']);
            $acao->setPublicoAlvo($publico_alvo);
            $acao->setFaixaEtaria($faixa_etaria);
            $acao->setPreRequisito($dados['pre_requisito']);
            $acao->setCargaHoraria($dados['carga_horaria']);
            $acao->setEntrada($dados['entrada']);
            $acao->setSaida($dados['saida']);
            $acao->setDiaSemana($dia_semana);
            $acao->setTurno($turno);
            $acao->setLocal($local);
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
            $acao->setProposito($dados['proposito']);
            $acao->setInicio($dados['inicio']);
            $acao->setTermino($dados['termino']);
            $acao->setPublicoAlvo($publico_alvo);
            $acao->setFaixaEtaria($faixa_etaria);
            $acao->setPreRequisito($dados['pre_requisito']);
            $acao->setCargaHoraria($dados['carga_horaria']);
            $acao->setEntrada($dados['entrada']);
            $acao->setSaida($dados['saida']);
            $acao->setDiaSemana($dia_semana);
            $acao->setTurno($turno);
            $acao->setLocal($local);
            $acao->setVoluntario($voluntario);
            $acao->setTipo($tipo_acao);
            $acao->setUsuarioAlteracao('usuarioAlt');
        }

        $this->em->flush();
        if ($acao) {
            return $acao;
        } else {
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
            'select a, v, p from \PNSL\Social\Entity\AcaoEntity a 
            join a.voluntario v
            join v.pessoa p'
        )->getArrayResult();
        return $acoes;
    }
    
    public function findById(int $id)
    {
        $acao = $this->em->createQuery(
            'select a, v, p, ta, tu, pa, fa, di from \PNSL\Social\Entity\AcaoEntity a 
            join a.voluntario v 
            join v.pessoa p
            join a.tipo ta
            join a.turno tu
            join a.publicoAlvo pa
            join a.faixaEtaria fa
            join a.diaSemana di
            where a.id = :id'
        )->setParameter('id', $id)->getOneOrNullResult();
        return $acao;
    }

    public function findByVoluntario(int $voluntario, int $acao)
    {
        $acoes = $this->em->createQuery(
            'select a, v, p, ta, tu, pa, fa, di from \PNSL\Social\Entity\AcaoEntity a 
            join a.voluntario v 
            join v.pessoa p
            join a.tipo ta
            join a.turno tu
            join a.publicoAlvo pa
            join a.faixaEtaria fa
            join a.diaSemana di
            where a.voluntario = :voluntario
            and a.id = :acao'
        )
        ->setParameter('voluntario', $voluntario)
        ->setParameter('acao', $acao)
        ->getOneOrNullResult();
        return $acoes;
    }

    public function findByTipo($tipo)
    {
        $acoes = $this->em->createQuery(
            'select a, v, p, ta, tu, pa, fa, di from \PNSL\Social\Entity\AcaoEntity a 
            join a.voluntario v 
            join v.pessoa p
            join a.tipo ta
            join a.turno tu
            join a.publicoAlvo pa
            join a.faixaEtaria fa
            join a.diaSemana di
            where ta.descricao = :tipo'
        )->setParameter('tipo', $tipo)->getArrayResult();
        return $acoes;
    }

    public function addTurma($acao, $usuario)
    {
        $acao = $this->em->getReference(
            '\PNSL\Social\Entity\AcaoEntity', 
            $acao
        );
        $usuario = $this->em->getReference(
            '\PNSL\Social\Entity\PessoaEntity', 
            $usuario
        );
        $turma = new TurmaEntity();
        $turma->setAcao($acao);
        $turma->setPessoa($usuario);
        $turma->setSituacao('A');
        $turma->setUsuarioInclusao('usuarioInc');
        $turma->setUsuarioAlteracao('usuarioAlt');
        $this->em->persist($turma);
        $this->em->flush();
        if ($turma) {
            return $turma;
        } else {
            return false;
        }
    }
    
    public function findTurmaByAcao(int $id)
    {
        $turma = $this->em->createQuery(
            'select t, p, a
            from \PNSL\Social\Entity\TurmaEntity t
            inner join t.pessoa p
            inner join t.acao a
            where a.id = :id
            and t.situacao = :situacao'
        )
        ->setParameter('id', $id)
        ->setParameter('situacao', 'A')
        ->getArrayResult();
        return $turma;
    }

    public function evadirTurma(int $id)
    {
        $turma = $this->em->getReference(
            '\PNSL\Social\Entity\TurmaEntity', $id
        );
        $turma->setUsuarioExclusao('usuarioExc');
        $turma->setDataExclusao();
        $this->em->persist($turma);
        $this->em->flush();
        if ($turma) {
            return $turma;
        } else {
            return false;
        }
    }

    public function consolidarTipo()
    {
        $acoes = $this->em->createQuery(
            'select ta.descricao, count(a.id) as qtd from \PNSL\Social\Entity\AcaoEntity a 
            join a.tipo ta
            group by ta.id'
        )->getArrayResult();
        return $acoes;
    }

    public function consolidarTurno()
    {
        $acoes = $this->em->createQuery(
            'select tu.descricao, count(a.id) as qtd from \PNSL\Social\Entity\AcaoEntity a 
            join a.turno tu
            group by tu.id'
        )->getArrayResult();
        return $acoes;
    }

    public function consolidarPublicoAlvo()
    {
        $acoes = $this->em->createQuery(
            'select pa.descricao, count(a.id) as qtd from \PNSL\Social\Entity\AcaoEntity a 
            join a.publicoAlvo pa
            join a.faixaEtaria fa
            join a.diaSemana di
            group by pa.id'
        )->getArrayResult();
        return $acoes;
    }

    public function consolidarFaixaEtaria()
    {
        $acoes = $this->em->createQuery(
            'select fa.descricao, count(a.id) as qtd from \PNSL\Social\Entity\AcaoEntity a 
            join a.faixaEtaria fa
            join a.diaSemana di
            group by fa.id'
        )->getArrayResult();
        return $acoes;
    }

    public function consolidarDiaSemana()
    {
        $acoes = $this->em->createQuery(
            'select di.descricao, count(a.id) as qtd from \PNSL\Social\Entity\AcaoEntity a 
            join a.diaSemana di
            group by di.id'
        )->getArrayResult();
        return $acoes;
    }

    public function consolidarAcao()
    {
        $qtd = $this->em->createQuery(
            'select count(a.id) as qtd from \PNSL\Social\Entity\AcaoEntity a'
        )->getOneOrNullResult();
        return $qtd;
    }

    public function consolidarTurma()
    {
        $qtd = $this->em->createQuery(
            'select count(a.id) as qtd from \PNSL\Social\Entity\AcaoEntity a
            join a.tipo t
            where t.descricao = :tipo'
        )->setParameter('tipo', 'Grupo')->getOneOrNullResult();
        return $qtd;
    }

    public function consolidarAtendimento()
    {
        $qtd = $this->em->createQuery(
            'select count(a.id) as qtd from \PNSL\Social\Entity\AcaoEntity a
            join a.tipo t
            where t.descricao = :tipo'
        )->setParameter('tipo', 'Individual')->getOneOrNullResult();
        return $qtd;
    }
}