<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\PessoaEntity;
use PNSL\Social\Entity\EscolaEntity;

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
                $pessoa->setCPF($dados['CPF_pessoa']);
                $pessoa->setNome($dados['nome_pessoa']);
                $pessoa->setDataNascimento($dados['nascimento_pessoa']);
                $pessoa->setRG($dados['RG_pessoa']);
                $pessoa->setNacionalidade($dados['nacionalidade_pessoa']);
                $pessoa->setSexo($dados['sexo_pessoa']);
                $pessoa->setProfissao($dados['profissao_pessoa']);
                $pessoa->setNIS($dados['NIS_pessoa']);
                $pessoa->setEndereco($dados['endereco_pessoa']);
                $pessoa->setCidade($dados['cidade_pessoa']);
                $pessoa->setUF($dados['UF_pessoa']);
                $pessoa->setCEP($dados['CEP_pessoa']);
                $pessoa->setTelefone($dados['telefone_pessoa']);
                $pessoa->setEmail($dados['email_pessoa']);
                $pessoa->setTipoPessoa($dados['tipo_pessoa']);
                $pessoa->setUsuarioInclusao('usuarioInclusao');
                $pessoa->setUsuarioAlteracao('usuarioAlteracao');
                $pessoa->setEstadoCivil(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['estado_civil_pessoa']
                    )
                );
                $pessoa->setTipoTelefone(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_telefone_pessoa']
                    )
                );
                
                if (!empty($dados['nome_responsavel'])) {
                    $responsavel = new PessoaEntity();
                    $responsavel->setCPF($dados['CPF_responsavel']);
                    $responsavel->setNome($dados['nome_responsavel']);
                    $responsavel->setDataNascimento($dados['nascimento_responsavel']);
                    $responsavel->setRG($dados['RG_responsavel']);
                    $responsavel->setNacionalidade($dados['nacionalidade_responsavel']);
                    $responsavel->setSexo($dados['sexo_responsavel']);
                    $responsavel->setProfissao($dados['profissao_responsavel']);
                    $responsavel->setNIS($dados['NIS_responsavel']);
                    $responsavel->setEndereco($dados['endereco_responsavel']);
                    $responsavel->setCidade($dados['cidade_responsavel']);
                    $responsavel->setUF($dados['UF_responsavel']);
                    $responsavel->setCEP($dados['CEP_responsavel']);
                    $responsavel->setTelefone($dados['telefone_responsavel']);
                    $responsavel->setEmail($dados['email_responsavel']);
                    $responsavel->setTipoPessoa('RSP');
                    $responsavel->setUsuarioInclusao('usuarioInclusao');
                    $responsavel->setUsuarioAlteracao('usuarioAlteracao');
                    $responsavel->setEstadoCivil(
                        $this->em->getReference(
                            '\PNSL\Social\Entity\TipoEntity', 
                            $dados['estado_civil_responsavel']
                        )
                    );
                    $responsavel->setParentesco(
                        $this->em->getReference(
                            '\PNSL\Social\Entity\TipoEntity', 
                            $dados['parentesco_responsavel']
                        )
                    );
                    $responsavel->setTipoTelefone(
                        $this->em->getReference(
                            '\PNSL\Social\Entity\TipoEntity', 
                            $dados['tipo_telefone_responsavel']
                        )
                    );
                    $this->em->persist($responsavel);
                    $pessoa->setResponsavel($responsavel);
                    $this->em->flush();
                }
                $this->em->persist($pessoa);
            } else {
                $pessoa = $this->em->getReference(
                    '\PNSL\Social\Entity\PessoaEntity', 
                    $dados['id']
                );
                $pessoa->setCPF($dados['CPF_pessoa']);
                $pessoa->setNome($dados['nome_pessoa']);
                $pessoa->setDataNascimento($dados['nascimento_pessoa']);
                $pessoa->setRG($dados['RG_pessoa']);
                $pessoa->setNacionalidade($dados['nacionalidade_pessoa']);
                $pessoa->setSexo($dados['sexo_pessoa']);
                $pessoa->setProfissao($dados['profissao_pessoa']);
                $pessoa->setNIS($dados['NIS_pessoa']);
                $pessoa->setEndereco($dados['endereco_pessoa']);
                $pessoa->setCidade($dados['cidade_pessoa']);
                $pessoa->setUF($dados['UF_pessoa']);
                $pessoa->setCEP($dados['CEP_pessoa']);
                $pessoa->setTelefone($dados['telefone_pessoa']);
                $pessoa->setEmail($dados['email_pessoa']);
                $pessoa->setTipoPessoa($dados['tipo_pessoa']);
                $pessoa->setUsuarioAlteracao('usuarioAlt');
                $pessoa->setEstadoCivil(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['estado_civil_pessoa']
                    )
                );
                $pessoa->setTipoTelefone(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_telefone_pessoa']
                    )
                );                
                $responsavel = $this->em->getReference(
                    '\PNSL\Social\Entity\PessoaEntity', 
                    $pessoa->getResponsavel()
                );
                $responsavel->setCPF($dados['CPF_responsavel']);
                $responsavel->setNome($dados['nome_responsavel']);
                $responsavel->setDataNascimento($dados['nascimento_responsavel']);
                $responsavel->setRG($dados['RG_responsavel']);
                $responsavel->setNacionalidade($dados['nacionalidade_responsavel']);
                $responsavel->setSexo($dados['sexo_responsavel']);
                $responsavel->setProfissao($dados['profissao_responsavel']);
                $responsavel->setNIS($dados['NIS_responsavel']);
                $responsavel->setEndereco($dados['endereco_responsavel']);
                $responsavel->setCidade($dados['cidade_responsavel']);
                $responsavel->setUF($dados['UF_responsavel']);
                $responsavel->setCEP($dados['CEP_responsavel']);
                $responsavel->setTelefone($dados['telefone_responsavel']);
                $responsavel->setEmail($dados['email_responsavel']);
                $responsavel->setTipoPessoa('RSP');
                $responsavel->setUsuarioInclusao('usuarioInclusao');
                $responsavel->setUsuarioAlteracao('usuarioAlteracao');
                $responsavel->setEstadoCivil(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['estado_civil_responsavel']
                    )
                );
                $responsavel->setParentesco(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['parentesco_responsavel']
                    )
                );
                $responsavel->setTipoTelefone(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_telefone_responsavel']
                    )
                );
            }
            //A transacao conclui no cadastro do usuario (Pessoa) caso nao
            //haja o cadastro do responsavel ou da escola
            if (empty($dados['nome_responsavel']) && empty($dados['escola'])) {
                $this->em->flush();
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
            'select p, ec, tt, pa
              from \PNSL\Social\Entity\PessoaEntity p 
                inner join p.estadoCivil ec
                inner join p.tipoTelefone tt
                inner join p.parentesco pa
             where p.id = :id'
        )->setParameter('id', $id)->getOneOrNullResult();
        return $pessoa;
    }

    public function findUsuarios()
    {
        $pessoas = $this->em->createQuery(
            'select p, ec, tt, pa
              from \PNSL\Social\Entity\PessoaEntity p 
                inner join p.estadoCivil ec
                inner join p.tipoTelefone tt
                left join p.parentesco pa
             where p.tipoPessoa <> :tipo'
        )->setParameter('tipo', 'VOL')->getArrayResult();
        return $pessoas;
    }

    public function findVoluntarios()
    {
        $pessoas = $this->em->createQuery(
            'select p, ec, tt, pa
              from \PNSL\Social\Entity\PessoaEntity p 
                inner join p.estadoCivil ec
                inner join p.tipoTelefone tt
                left join p.parentesco pa
             where p.tipoPessoa = :tipo'
        )->setParameter('tipo', 'VOL')->getArrayResult();
        return $pessoas;
    }
}