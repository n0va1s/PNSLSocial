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
        //Pessoa
        $nome           = $dados->getNome();
        $genero         = $dados->getGenero();
        $dataNascimento = $dados->getDataNascimento();
        $numRG          = $dados->getNumRG();
        $numCPF         = $dados->getNumCPF();
        $naturalidade   = $dados->getNaturalidade();
        $usuario        = $dados->getUsuario();
        //Voluntario
        $profissao      = $dados->getProfissao();
        $estadoCivil    = $dados->getEstadoCivil();
        $assinouTermo   = $dados->getAssinouTermo();
        //Contato
        $tipo           = $dados->getTipo();
        $contato        = $dados->getDescricao();
        //Endereco
        $logradouro     = $dados->getLogradouro();
        $bairro         = $dados->getBairro();
        $cidade         = $dados->getCidade();
        
        if (empty($id)) {
            $pessoa = new PessoaEntity();
            $voluntario = new VoluntarioEntity();
            $voluntario->setProfissao($profissao);
            $voluntario->setEstadoCivil($estadoCivil);
            $voluntario->setAssinouTermo($assinouTermo);
            $pessoa->setVoluntario($voluntario);
            $contato = new ContatoEntity();
            $contato->setTipo($tipo);
            $contato->setDescricao($contato);
            $pessoa->setContato($contato);
            $endereco = new EnderecoEntity();
            $endereco->setLogradouro($logradouro);
            $endereco->setBairro($bairro);
            $endereco->setCidade($cidade);
            $pessoa->setEndereco($endereco);
            $this->em->persist($pessoa);
        } else {
            $pessoa = $this->em->getReference('\PNSL\Social\Entity\PessoaEntity', $id);
            $pessoa->setNome($nome);
            $pessoa->setGenero($genero);
            $pessoa->setDataNascimento($dataNascimento);
            $pessoa->setNumRG($numRG);
            $pessoa->setNumCPF($numCPF);
            $pessoa->setNaturalidade($naturalidade);
            $pessoa->setUsuario($usuario);
            $voluntario = $pessoa->getVoluntario();
            $voluntario->setProfissao($profissao);
            $voluntario->setEstadoCivil($estadoCivil);
            $voluntario->setAssinouTermo($assinouTermo);
            $contato = $pessoa->getContato();
            $contato->setTipo($tipo);
            $contato->setDescricao($contato);
            $endereco = $pessoa->getEndereco();
            $endereco->setLogradouro($logradouro);
            $endereco->setBairro($bairro);
            $endereco->setCidade($cidade);
            $pessoa->setEndereco($endereco);
        }
        return $this->em->flush();
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