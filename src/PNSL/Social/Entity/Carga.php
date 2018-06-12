<?php
namespace PNSL\Social\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PNSL\Social\Entity\TipoContatoEntity;


class Carga implements FixtureInterface
{
    public function load(ObjectManager $manager) {

        $tipoContatoEml = new TipoContatoEntity();
        $tipoContatoEml->setDescricao('Email');

        $manager->persist($tipoContatoEml);

        $tipoContatoEnd = new TipoContatoEntity();
        $tipoContatoEnd->setDescricao('Endereco');
    }
    
}