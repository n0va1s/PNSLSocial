<?php
namespace PNSL\Social\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;

class RelatorioController implements ControllerProviderInterface
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function connect(Application $app)
    {
        //if ($app['security.authorization_checker']->isGranted('ROLE_ADMIN')) {
        $ctrl = $app['controllers_factory'];
        
        $ctrl->before(
            function (Request $request) {
                if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
                    $data = json_decode($request->getContent(), true);
                    $request->request->replace(
                        is_array($data) ? $data : array()
                    );
                }
            }
        );

        $ctrl->get(
            '/anual/html', function () use ($app) {
                return $app['twig']->render(
                    'relatorioPrestacaoConta.twig',
                    array(), 
                    new Response('Ok', 200)
                );
            }
        )->bind('relatorioPrestacaoContaHTML');

        $ctrl->get(
            '/anual/json', function () use ($app) {
                $dados = $app['relatorio_service']->relatorioAnual();
                if ($dados) {
                    $app->json(
                        $dados, 201, ['Content-Type' => 'application/json']
                    );
                } else {
                    return $app->abort(
                        404, 
                        "Ops... não há dados para o relatório"
                    );
                }                
            }
        )->bind('relatorioPrestacaoContaJSON');
        
        return $ctrl;
    }
}