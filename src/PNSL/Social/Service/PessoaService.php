<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\PessoaEntity;

class PessoaService
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function save($dados)
    {
        if (is_array($dados)) {
            if (empty($dados['id'])) {
                $pessoa = new PessoaEntity();
                $pessoa->setCPF($dados['CPF']);
                $pessoa->setNome($dados['nome']);
                $pessoa->setDataNascimento($dados['nascimento']);
                $pessoa->setRG($dados['RG']);
                $pessoa->setNacionalidade($dados['nacionalidade']);
                $pessoa->setSexo($dados['sexo']);
                $pessoa->setProfissao($dados['profissao']);
                $pessoa->setNIS($dados['NIS']);
                $pessoa->setEndereco($dados['endereco']);
                $pessoa->setCidade($dados['cidade']);
                $pessoa->setUF($dados['uf']);
                $pessoa->setCEP($dados['CEP']);
                $pessoa->setTelefone($dados['telefone']);
                $pessoa->setEmail($dados['email']);
                $pessoa->setTipoPessoa($dados['tipo_pessoa']);
                $pessoa->setUsuarioInclusao('usuarioInclusao');
                $pessoa->setUsuarioAlteracao('usuarioAlteracao');
                $pessoa->setEstadoCivil(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['estado_civil']
                    )
                );
                $pessoa->setTipoTelefone(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_telefone']
                    )
                );
                $this->em->persist($pessoa);                
            } else {
                $pessoa = $this->em->getReference('\PNSL\Social\Entity\PessoaEntity', $dados['id']);
                $pessoa->setCPF($dados['CPF']);
                $pessoa->setNome($dados['nome']);
                $pessoa->setDataNascimento($dados['nascimento']);
                $pessoa->setRG($dados['RG']);
                $pessoa->setEstadoCivil($dados['estado_civil']);
                $pessoa->setNacionalidade($dados['nacionalidade']);
                $pessoa->setSexo($dados['sexo']);
                $pessoa->setProfissao($dados['profissao']);
                $pessoa->setNIS($dados['NIS']);
                $pessoa->setEndereco($dados['endereco']);
                $pessoa->setCidade($dados['cidade']);
                $pessoa->setUF($dados['uf']);
                $pessoa->setCEP($dados['CEP']);
                $pessoa->setTelefone($dados['telefone']);
                $pessoa->setEmail($dados['email']);
                $pessoa->setTipoPessoa($dados['tipo_pessoa']);
                $pessoa->setUsuarioAlteracao('usuario');
                $pessoa->setEstadoCivil(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['estado_civil']
                    )
                );
                $pessoa->setTipoTelefone(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_telefone']
                    )
                );                
            }
            return $pessoa;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $pessoa = $this->em->getReference(
            '\PNSL\Social\Entity\PessoaEntity', $id
        );
        $this->em->remove($pessoa);
        return $this->em->flush();
    }
    
    public function fetchAll()
    {
        $pessoas = $this->em->createQuery(
            'select p from \PNSL\Social\Entity\PessoaEntity p '
        )->getArrayResult();
        return $pessoas;
    }
    
    public function findById(int $id)
    {
        $pessoa = $this->em->createQuery(
            'select p from \PNSL\Social\Entity\PessoaEntity p where p.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $pessoa;
    }
}