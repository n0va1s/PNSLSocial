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
        if (empty($dados['id'])) {
            $voluntario = new VoluntarioEntity();
            $voluntario->setPessoa($pessoa);
            $voluntario->setConhecimento($dados['conhecimento']);
            $voluntario->setAssinouTermo('N');
            $voluntario->setUsuarioInclusao('usuarioInc');
            $voluntario->setUsuarioAlteracao('usuarioAlt');
            $this->em->persist($voluntario);
        } else {
            $voluntario = $this->em->getReference('\PNSL\Social\Entity\VoluntarioEntity', $dados['id']);
            $voluntario->setPessoa($pessoa);
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
            'select p, v from \PNSL\Social\Entity\VoluntarioEntity v 
            join v.pessoa p order by p.nome ASC'
        )->getArrayResult();
        return $voluntarios;
    }
    
    public function findById(int $id)
    {
        $voluntario = $this->em->createQuery(
            'select p, v, tt, es from \PNSL\Social\Entity\VoluntarioEntity v 
            join v.pessoa p
            join p.tipoTelefone tt
            join p.estadoCivil es
            where p.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $voluntario[0]; //TODO: substituir o array pelo getSingleResult. Ao usar travou
    }
}