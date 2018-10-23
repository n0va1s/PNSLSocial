<?php
namespace PNSL\Social\Controller;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use PNSL\Social\Service\TipoService;

class TipoController implements ControllerProviderInterface
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
        
        $app['tipo_service'] = function () {
            return new TipoService($this->em);
        };
        
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
            '/', function () use ($app) {
                $tipos = $app['tipo_service']->fetchAll();
                return $app['twig']->render(
                    'cadastroTipo.twig',
                    array('tipos'=>$tipos), 
                    new Response('Ok', 200)
                );
            }
        )->bind('tipoCadastrar');

        $ctrl->post(
            '/salvar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                $tipo = $app['tipo_service']->save($dados);
                if ($tipo) {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('tipoCadastrar')
                    );
                } else {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('tipoCadastrar')
                    );
                }
            }
        )->bind('tipoSalvar');

        $ctrl->get(
            '/editar/{id}', function ($id) use ($app) {
                $tipo = $app['tipo_service']->findById($id);
                if ($tipo) {
                    return $app['twig']->render(
                        'cadastroTipo.twig',
                        array('tipos'=>$tipos,
                            'tipo'=>$tipo), 
                        new Response('Ok', 200)
                    );
                } else {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('tipoCadastrar')
                    );
                }
            }
        )->bind('tipoEditar');

        $ctrl->delete(
            '/excluir/{id}', function ($id) use ($app) {
                if ($id) {
                    $excluiu = $app['tipo_service']->delete($id);
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('tipoCadastrar')
                    );
                } else {
                    return $app->abort(
                        500, 
                        "A configuração que vc escolheu não existe. Tente novamente."
                    ); 
                }
            }
        )->bind('tipoExcluir')->assert('id', '\d+');
        
        return $ctrl;
    }
}