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

        $app['email_service'] = function () {
            //return new EmailService($this->em);
        };

        $ctrl->get(
            '/nosso-impacto', function () use ($app) {
                return $app['twig']->render(
                    'impacto.twig',
                    array(), 
                    new Response('Ok', 200)
                );
            }
        )->bind('impacto');

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