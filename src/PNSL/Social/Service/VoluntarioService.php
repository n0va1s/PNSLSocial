<?php
namespace PNSL\Social\Service;
use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Query;
use \Doctrine\ORM\Tools\Pagination\Paginator;
use PNSL\Social\Entity\PessoaEntity;
use PNSL\Social\Entity\VoluntarioEntity;
use PNSL\Social\Entity\ContatoEntity;
use PNSL\Social\Entity\EnderecoEntity;

class VoluntarioService
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
                $pessoa->setNome(utf8_encode($dados['nome']));
                $pessoa->setGenero($dados['genero']);
                $pessoa->setDataNascimento(new \DateTime($dados['data_nascimento']));
                $pessoa->setNumRG($dados['num_rg']);
                $pessoa->setNumCPF($dados['num_cpf']);
                $pessoa->setNaturalidade(utf8_encode($dados['naturalidade']));
                $pessoa->setUsuario(utf8_encode($dados['usuario']));;
                $this->em->persist($pessoa);
                $voluntario = new VoluntarioEntity();
                $voluntario->setProfissao(utf8_encode($dados['profissao']));
                $voluntario->setEstadoCivil(utf8_encode($dados['estado_civil']));
                $voluntario->setAssinouTermo($dados['assinou_termo']);
                $pessoa->setVoluntario($voluntario);
                $contato = new ContatoEntity();
                $contato->setTipo($dados['tipo']);
                $contato->setContato(utf8_encode($dados['contato']));
                $pessoa->setContato($contato);
                $endereco = new EnderecoEntity();
                $endereco->setLogradouro(utf8_encode($dados['logradouro']));
                $endereco->setBairro(utf8_encode($dados['bairro']));
                $endereco->setCidade(utf8_encode($dados['cidade']));
                $pessoa->setEndereco($endereco);
            } else {
                $pessoa = $this->em->getReference('\PNSL\Social\Entity\PessoaEntity', $id);
                $pessoa->setNome(utf8_encode($dados['nome']));
                $pessoa->setGenero($dados['genero']);
                $pessoa->setDataNascimento(new \DateTime($dados['data_nascimento']));
                $pessoa->setNumRG($dados['num_rg']);
                $pessoa->setNumCPF($dados['num_cpf']);
                $pessoa->setNaturalidade(utf8_encode($dados['naturalidade']));
                $pessoa->setUsuario(utf8_encode($dados['usuario']));;
                $voluntario = $pessoa->getVoluntario();
                $voluntario->setProfissao(utf8_encode($dados['profissao']));
                $voluntario->setEstadoCivil(utf8_encode($dados['estado_civil']));
                $voluntario->setAssinouTermo($dados['assinou_termo']);
                $contato = $pessoa->getContato();
                $contato->setTipo($dados['tipo']);
                $contato->setContato(utf8_encode($dados['contato']));
                $endereco = $pessoa->getEndereco();
                $endereco->setLogradouro(utf8_encode($dados['logradouro']));
                $endereco->setBairro(utf8_encode($dados['bairro']));
                $endereco->setCidade(utf8_encode($dados['cidade']));
                $pessoa->setEndereco($endereco);
            }
            $this->em->flush();
var_dump($pessoa);
exit;
            return true;
        } else {
            return false;
        }
    }
    
    public function delete(int $id)
    {
        $voluntario = $this->em->getReference(
            '\PNSL\Social\Entity\VoluntarioEntity', $id
        );
        $this->em->remove($voluntario);
        return $this->em->flush();
    }
    
    public function fetchAll()
    {
        $voluntarios = $this->em->createQuery(
            'select v from \PNSL\Social\Entity\VoluntarioEntity v 
            join v.pessoa p'
        )->getArrayResult();
        return $voluntarios;
    }
    
    public function findById(int $id)
    {
        $voluntario = $this->em->createQuery(
            'select v from \PNSL\Social\Entity\VoluntarioEntity v 
            join v.pessoa p where p.id = :id'
        )->setParameter('id', $id)->getArrayResult();
        return $voluntario;
    }
}