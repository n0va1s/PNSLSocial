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
// echo "<pre>";
// print_r($dados);
// echo "</pre>";
// exit;
        //Pessoa
        if ($dados['sexo_pessoa']) {
            $sexo_pessoa = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['sexo_pessoa']
            );
        }
        if ($dados['tipo_renda_pessoa']) {
            $tipo_renda_pessoa = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['tipo_renda_pessoa']
            );
        }        
        if ($dados['UF_pessoa']) {
            $uf_pessoa = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['UF_pessoa']
            );
        }
        if ($dados['estado_civil_pessoa']) {
            $estado_civil_pessoa = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['estado_civil_pessoa']
            );
        }
        if ($dados['tipo_telefone_pessoa']) {
            $tipo_telefone_pessoa = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['tipo_telefone_pessoa']
            );
        }
        if ($dados['tipo_origem_pessoa']) {
            $tipo_origem_pessoa = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['tipo_origem_pessoa']
            );
        }
        if ($dados['tipo_pessoa']) {
            $tipo_pessoa = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['tipo_pessoa']
            );
        }        
        //Responsavel
        if ($dados['sexo_responsavel']) {
            $sexo_responsavel = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['sexo_responsavel']
            );
        }
        if ($dados['tipo_renda_responsavel']) {
            $tipo_renda_responsavel = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['tipo_renda_responsavel']
            );
        }        
        if ($dados['tipo_registro_responsavel']) {
            $tipo_registro_responsavel = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['tipo_registro_responsavel']
            );
        }
        if ($dados['UF_responsavel']) {
            $uf_responsavel = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['UF_responsavel']
            );
        }
        if ($dados['tipo_responsavel']) {
            $tipo_responsavel = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['tipo_responsavel']
            );
        }
        if ($dados['estado_civil_responsavel']) {
            $estado_civil_responsavel = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['estado_civil_responsavel']
            );
        }
        if ($dados['tipo_telefone_responsavel']) {
            $tipo_telefone_responsavel = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['tipo_telefone_responsavel']
            );
        }
        if ($dados['tipo_origem_responsavel']) {
            $tipo_origem_responsavel = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['tipo_origem_responsavel']
            );
        }
        if ($dados['tipo_responsavel']) {
            $tipo_responsavel = $this->em->getReference(
                '\PNSL\Social\Entity\TipoEntity', 
                $dados['tipo_responsavel']
            );
        }

        if (is_array($dados)) {
            if (empty($dados['id'])) {
                $pessoa = new PessoaEntity();
                $pessoa->setCPF($dados['CPF_pessoa']);
                $pessoa->setNome($dados['nome_pessoa']);
                $pessoa->setDataNascimento($dados['nascimento_pessoa']);
                $pessoa->setRG($dados['RG_pessoa']);
                $pessoa->setNacionalidade($dados['nacionalidade_pessoa']);
                $pessoa->setEstadoCivil($estado_civil_pessoa);
                $pessoa->setSexo($sexo_pessoa);
                $pessoa->setTipoRenda($tipo_renda_pessoa);
                $pessoa->setFamiliar($dados['familiar_pessoa']);
                $pessoa->setProfissao($dados['profissao_pessoa']);
                $pessoa->setEndereco($dados['endereco_pessoa']);
                $pessoa->setCidade($dados['cidade_pessoa']);
                $pessoa->setUF($uf_pessoa);
                $pessoa->setCEP($dados['CEP_pessoa']);
                $pessoa->setTipoTelefone($tipo_telefone_pessoa);
                $pessoa->setTelefone($dados['telefone_pessoa']);
                $pessoa->setEmail($dados['email_pessoa']);
                $pessoa->setTipoPessoa($tipo_pessoa);
                $pessoa->setTipoOrigem($tipo_origem_pessoa);
                $pessoa->setUsuarioInclusao('usuarioInclusao');
                $pessoa->setUsuarioAlteracao('usuarioAlteracao');
                
                if (!empty($dados['nome_responsavel'])) {
                    $responsavel = new PessoaEntity();
                    $responsavel->setCPF($dados['CPF_responsavel']);
                    $responsavel->setNome($dados['nome_responsavel']);
                    $responsavel->setDataNascimento($dados['nascimento_responsavel']);
                    $responsavel->setRG($dados['RG_responsavel']);
                    $responsavel->setNacionalidade($dados['nacionalidade_responsavel']);
                    $responsavel->setEstadoCivil($estado_civil_responsavel);
                    $responsavel->setSexo($sexo_responsavel);
                    $responsavel->setTipoRenda($tipo_renda_responsavel);
                    $responsavel->setFamiliar($dados['familiar_responsavel']);
                    $responsavel->setProfissao($dados['profissao_responsavel']);
                    $responsavel->setEndereco($dados['endereco_responsavel']);
                    $responsavel->setCidade($dados['cidade_responsavel']);
                    $responsavel->setUF($uf_responsavel);
                    $responsavel->setCEP($dados['CEP_responsavel']);
                    $responsavel->setTipoTelefone($tipo_telefone_responsavel);
                    $responsavel->setTelefone($dados['telefone_responsavel']);
                    $responsavel->setEmail($dados['email_responsavel']);
                    $responsavel->setTipoPessoa($tipo_responsavel);                
                    $responsavel->setTipoOrigem($tipo_origem_responsavel);
                    $responsavel->setUsuarioInclusao('usuarioInclusao');
                    $responsavel->setUsuarioAlteracao('usuarioAlteracao');

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
                $pessoa->setEstadoCivil($estado_civil_pessoa);
                $pessoa->setSexo($sexo_pessoa);
                $pessoa->setTipoRenda($tipo_renda_pessoa);
                $pessoa->setFamiliar($dados['familiar_pessoa']);
                $pessoa->setProfissao($dados['profissao_pessoa']);
                $pessoa->setEndereco($dados['endereco_pessoa']);
                $pessoa->setCidade($dados['cidade_pessoa']);
                $pessoa->setUF($uf_pessoa);
                $pessoa->setCEP($dados['CEP_pessoa']);
                $pessoa->setTipoTelefone($tipo_telefone_pessoa);
                $pessoa->setTelefone($dados['telefone_pessoa']);
                $pessoa->setEmail($dados['email_pessoa']);
                $pessoa->setTipoPessoa($tipo_pessoa);                
                $pessoa->setTipoOrigem($tipo_origem_pessoa);
                $pessoa->setUsuarioInclusao('usuarioInclusao');
                $pessoa->setUsuarioAlteracao('usuarioAlteracao');

                if (!empty($dados['nome_responsavel'])) {
                    $responsavel = $this->em->getReference(
                        '\PNSL\Social\Entity\PessoaEntity', 
                        $pessoa->getResponsavel()
                    );
                    $responsavel->setCPF($dados['CPF_responsavel']);
                    $responsavel->setNome($dados['nome_responsavel']);
                    $responsavel->setDataNascimento($dados['nascimento_responsavel']);
                    $responsavel->setRG($dados['RG_responsavel']);
                    $responsavel->setNacionalidade($dados['nacionalidade_responsavel']);
                    $responsavel->setEstadoCivil($estado_civil_responsavel);
                    $responsavel->setSexo($sexo_responsavel);
                    $responsavel->setTipoRenda($tipo_renda_responsavel);
                    $responsavel->setFamiliar($dados['familiar_responsavel']);
                    $responsavel->setProfissao($dados['profissao_responsavel']);
                    $responsavel->setEndereco($dados['endereco_responsavel']);
                    $responsavel->setCidade($dados['cidade_responsavel']);
                    $responsavel->setUF($uf_responsavel);
                    $responsavel->setCEP($dados['CEP_responsavel']);
                    $responsavel->setTipoTelefone($tipo_telefone_responsavel);
                    $responsavel->setTelefone($dados['telefone_responsavel']);
                    $responsavel->setEmail($dados['email_responsavel']);
                    $responsavel->setTipoPessoa($tipo_responsavel);                
                    $responsavel->setTipoOrigem($tipo_origem_responsavel);
                    $responsavel->setUsuarioInclusao('usuarioInclusao');
                    $responsavel->setUsuarioAlteracao('usuarioAlteracao');
                }
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
    
    public function findById(int $id)
    {
        $pessoa = $this->em->createQuery(
            'select p, ec, tt, pa, uf, tp, se
              from \PNSL\Social\Entity\PessoaEntity p 
                inner join p.estadoCivil ec
                inner join p.tipoTelefone tt
                inner join p.parentesco pa
                inner join p.sexo se
                inner join p.uf uf
                inner join p.tipoPessoa tp
             where p.id = :id'
        )->setParameter('id', $id)->getOneOrNullResult();
        return $pessoa;
    }

    public function fetchAll()
    {
        $pessoas = $this->em->createQuery(
            'select p, ec, tt, pa, uf, tp, se
              from \PNSL\Social\Entity\PessoaEntity p 
                inner join p.estadoCivil ec
                inner join p.tipoTelefone tt
                left join p.parentesco pa
                inner join p.sexo se
                inner join p.uf uf
                inner join p.tipoPessoa tp
             where tp.descricao <> :tipo'
        )->setParameter('tipo', 'Voluntário')->getArrayResult();
        return $pessoas;
    }

    public function consolidarIdade()
    {
        $pessoas = $this->em->createQuery(
            "select p.dataNascimento, count(p.id) as qtd
             from \PNSL\Social\Entity\PessoaEntity p
             group by p.dataNascimento"
        )->getArrayResult();
        return $pessoas;
    }

    public function consolidarEstadoCivil()
    {
        $pessoas = $this->em->createQuery(
            'select ec.descricao, count(p.id) as qtd
             from \PNSL\Social\Entity\PessoaEntity p 
              inner join p.estadoCivil ec
              inner join p.tipoTelefone tt
              left join p.parentesco pa
             group by ec.id'
        )->getArrayResult();
        return $pessoas;
    }

    public function consolidarParentesco()
    {
        $pessoas = $this->em->createQuery(
            'select pa.descricao, count(p.id) as qtd
             from \PNSL\Social\Entity\PessoaEntity p 
              left join p.parentesco pa
             group by pa.id'
        )->getArrayResult();
        return $pessoas;
    }

    public function consolidarSexo()
    {
        $pessoas = $this->em->createQuery(
            'select s.descricao, count(p.id) as qtd
             from \PNSL\Social\Entity\PessoaEntity p 
             join p.sexo s
             group by s.descricao'
        )->getArrayResult();
        return $pessoas;
    }

    public function consolidarTipoPessoa()
    {
        $pessoas = $this->em->createQuery(
            'select t.descricao, count(p.id) as qtd
             from \PNSL\Social\Entity\PessoaEntity p 
             join p.tipoPessoa t
             group by t.descricao'
        )->getArrayResult();
        return $pessoas;
    }

    public function consolidarUF()
    {
        $pessoas = $this->em->createQuery(
            'select u.descricao, count(p.id) as qtd
             from \PNSL\Social\Entity\PessoaEntity p 
             join p.uf u
             group by u.descricao'
        )->getArrayResult();
        return $pessoas;
    }

    public function consolidarPessoa()
    {
        $qtd = $this->em->createQuery(
            'select count(p.id) as qtd
             from \PNSL\Social\Entity\PessoaEntity p'
        )->getOneOrNullResult();
        return $qtd;
    }
}