<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\PessoaEntity;
use PNSL\Social\Entity\VoluntarioEntity;

class VoluntarioService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($pessoa, $dados)
    {
        if ($dados['tipo_registro']) {
            $tipo_registro = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['tipo_registro']
            );
        }
        if (empty($dados['id'])) {
            $voluntario = new VoluntarioEntity();
            $voluntario->setPessoa($pessoa);
            $voluntario->setRegistro($dados['registro']);
            $voluntario->setTipoRegistro($tipo_registro);
            $voluntario->setConhecimento($dados['conhecimento']);
            $voluntario->setAssinouTermo('N');
            $voluntario->setUsuarioInclusao('usuarioInc');
            $voluntario->setUsuarioAlteracao('usuarioAlt');
            $this->em->persist($voluntario);
        } else {
            $voluntario = $this->em->getReference('\PNSL\Social\Entity\VoluntarioEntity', $dados['id']);
            $voluntario->setPessoa($pessoa);
            $voluntario->setRegistro($dados['registro']);
            $voluntario->setTipoRegistro($tipo_registro);
            $voluntario->setConhecimento($dados['conhecimento']);
            $voluntario->setAssinouTermo('N');
            $voluntario->setUsuarioAlteracao('usuarioAlt');
        }
        //Insere no banco de dados a pessoa e o voluntario
        $this->em->flush();
        if ($voluntario) {
            return $voluntario;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $voluntario = $this->em->getReference(
            '\PNSL\Social\Entity\PessoaEntity', $id
        );
        if ($voluntario) {
            $this->em->remove($voluntario);
            $this->em->flush();
            return true;
        } else {
            return false;
        }
    }
    
    public function fetchAll()
    {
        $voluntarios = $this->em->createQuery(
            'select p, v 
            from \PNSL\Social\Entity\VoluntarioEntity v 
            join v.pessoa p
            order by p.nome ASC'
        )->getArrayResult();
        return $voluntarios;
    }
    
    public function findById(int $id)
    {
        $voluntario = $this->em->createQuery(
            'select p, v, s, e, t, u, f, r, g
            from \PNSL\Social\Entity\VoluntarioEntity v 
            join v.pessoa p
            join p.sexo s
            join p.estadoCivil e
            join p.tipoPessoa t
            join p.uf u
            join p.tipoTelefone f
            left join p.tipoRenda r
            left join v.tipoRegistro g
            where p.id = :id'
        )->setParameter('id', $id)->getOneOrNullResult();
        return $voluntario;
    }

    public function assinarTermo(int $id)
    {
        if ($id) {
            $voluntario = $this->em->getReference(
                '\PNSL\Social\Entity\VoluntarioEntity', $id
            );
            if ($voluntario) {
                $voluntario->setAssinouTermo('S');
                $voluntario->setUsuarioAlteracao('usuarioAlt2');
                $this->em->persist($voluntario);
                $this->em->flush();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }
}