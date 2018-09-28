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
        if (is_array($dados)) {
            if (empty($dados['id'])) {
                $pessoa = new PessoaEntity();
                $pessoa->setCPF($dados['CPF_pessoa']);
                $pessoa->setNome($dados['nome_pessoa']);
                $pessoa->setDataNascimento($dados['nascimento_pessoa']);
                $pessoa->setRG($dados['RG_pessoa']);
                $pessoa->setNacionalidade($dados['nacionalidade_pessoa']);
                $pessoa->setSexo(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['sexo_pessoa']
                    )
                );
                $pessoa->setTipoRenda(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_renda_pessoa']
                    )
                );
                $pessoa->setFamiliar($dados['familiar_pessoa']);
                $pessoa->setProfissao($dados['profissao_pessoa']);
                $pessoa->setRegistro($dados['registro_pessoa']);
                $pessoa->setTipoRegistro(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_registro_pessoa']
                    )
                );
                $pessoa->setEndereco($dados['endereco_pessoa']);
                $pessoa->setCidade($dados['cidade_pessoa']);
                $pessoa->setUF(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['UF_pessoa']
                    )
                );
                $pessoa->setCEP($dados['CEP_pessoa']);
                $pessoa->setTelefone($dados['telefone_pessoa']);
                $pessoa->setEmail($dados['email_pessoa']);
                $pessoa->setTipoPessoa(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_pessoa']
                    )
                );
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
                    $responsavel->setSexo(
                        $this->em->getReference(
                            '\PNSL\Social\Entity\TipoEntity', 
                            $dados['sexo_responsavel']
                        )
                    );
                    //Usei a mesma renda do usuario
                    $responsavel->setTipoRenda(
                        $this->em->getReference(
                            '\PNSL\Social\Entity\TipoEntity', 
                            $dados['tipo_renda_pessoa']
                        )
                    );
                    //Usei o mesmo do usuario
                    $responsavel->setFamiliar($dados['familiar_pessoa']);
                    $responsavel->setProfissao($dados['profissao_responsavel']);
                    $responsavel->setRegistro($dados['registro_responsavel']);
                    $responsavel->setTipoRegistro(
                        $this->em->getReference(
                            '\PNSL\Social\Entity\TipoEntity', 
                            $dados['tipo_registro_responsavel']
                        )
                    );
                    $responsavel->setEndereco($dados['endereco_responsavel']);
                    $responsavel->setCidade($dados['cidade_responsavel']);
                    $responsavel->setUF(
                        $this->em->getReference(
                            '\PNSL\Social\Entity\TipoEntity', 
                            $dados['UF_responsavel']
                        )
                    );
                    $responsavel->setCEP($dados['CEP_responsavel']);
                    $responsavel->setTelefone($dados['telefone_responsavel']);
                    $responsavel->setEmail($dados['email_responsavel']);
                    $responsavel->setTipoPessoa(
                        $this->em->getReference(
                            '\PNSL\Social\Entity\TipoEntity', 
                            $dados['tipo_responsavel']
                        )
                    );
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
                $pessoa->setSexo(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['sexo_pessoa']
                    )
                );
                $pessoa->setTipoRenda(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_renda_pessoa']
                    )
                );
                $pessoa->setFamiliar($dados['familiar_pessoa']);
                $pessoa->setProfissao($dados['profissao_pessoa']);
                $pessoa->setRegistro($dados['registro_pessoa']);
                $pessoa->setTipoRegistro(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_registro_pessoa']
                    )
                );
                $pessoa->setEndereco($dados['endereco_pessoa']);
                $pessoa->setCidade($dados['cidade_pessoa']);
                $pessoa->setUF(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['UF_pessoa']
                    )
                );
                $pessoa->setCEP($dados['CEP_pessoa']);
                $pessoa->setTelefone($dados['telefone_pessoa']);
                $pessoa->setEmail($dados['email_pessoa']);
                $pessoa->setTipoPessoa(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_pessoa']
                    )
                );
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
                $responsavel->setSexo(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['sexo_responsavel']
                    )
                );
                //Usei a mesma renda do usuario
                $responsavel->setTipoRenda(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_renda_pessoa']
                    )
                );
                //Usei o mesmo do usuario
                $responsavel->setFamiliar($dados['familiar_pessoa']);
                $responsavel->setProfissao($dados['profissao_responsavel']);
                $responsavel->setRegistro($dados['registro_responsavel']);
                $responsavel->setTipoRegistro(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_registro_responsavel']
                    )
                );
                $responsavel->setEndereco($dados['endereco_responsavel']);
                $responsavel->setCidade($dados['cidade_responsavel']);
                $responsavel->setUF(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['UF_responsavel']
                    )
                );
                $responsavel->setCEP($dados['CEP_responsavel']);
                $responsavel->setTelefone($dados['telefone_responsavel']);
                $responsavel->setEmail($dados['email_responsavel']);
                $responsavel->setTipoPessoa(
                    $this->em->getReference(
                        '\PNSL\Social\Entity\TipoEntity', 
                        $dados['tipo_responsavel']
                    )
                );
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

    public function findUsuarios()
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
             where p.tipoPessoa <> :tipo'
        )->setParameter('tipo', 'VOL')->getArrayResult();
        return $pessoas;
    }

    public function findVoluntarios()
    {
        $pessoas = $this->em->createQuery(
            'select p, ec, tt, pa, se, uf, tp
              from \PNSL\Social\Entity\PessoaEntity p 
                inner join p.estadoCivil ec
                inner join p.tipoTelefone tt
                left join p.parentesco pa
                inner join p.sexo se
                inner join p.uf uf
                inner join p.tipoPessoa tp
             where p.tipoPessoa = :tipo'
        )->setParameter('tipo', 'VOL')->getArrayResult();
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