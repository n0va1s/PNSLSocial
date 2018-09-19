<?php
namespace PNSL\Social\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;

class SiteController implements ControllerProviderInterface
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function connect(Application $app)
    {
        $ctrl = $app['controllers_factory'];

        $ctrl->get(
            '/area-restrita', function () use ($app) {
                return $app['twig']->render(
                    'areaRestrita.twig',
                    array(), 
                    new Response('Ok', 200)
                );
            }
        )->bind('areaRestrita');

        $ctrl->get(
            '/nosso-impacto', function () use ($app) {
                $acoes = $app['acao_service']->fetchAll();
                $resultado['acao'] = $app['acao_service']->consolidarAcao();
                $resultado['turma'] = $app['acao_service']->consolidarTurma();
                $resultado['atendimento'] = $app['acao_service']->consolidarAtendimento();
                $resultado['pessoa'] = $app['pessoa_service']->consolidarPessoa();
                return $app['twig']->render(
                    'nossoImpacto.twig',
                    array('resultado'=>$resultado,
                    'acoes'=>$acoes), 
                    new Response('Ok', 200)
                );
            }
        )->bind('nossoImpacto');

        $ctrl->get(
            '/contato', function () use ($app) {
                return $app['twig']->render(
                    'contato.twig',
                    array(), 
                    new Response('Ok', 200)
                );
            }
        )->bind('contato');

        return $ctrl;
    }
}