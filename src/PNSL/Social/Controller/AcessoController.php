<?php
namespace PNSL\Social\Controller;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use PNSL\Social\Service\AcessoService;

class AcessoController implements ControllerProviderInterface
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
        
        $app['acesso_service'] = function () {
            return new AcessoService($this->em);
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
                $acessos = $app['acesso_service']->fetchAll();
                $voluntarios = $app['voluntario_service']->listNoAccess();
                $perfis = $app['tipo_service']->findByGrupo('RLE');
                return $app['twig']->render(
                    'cadastroAcesso.twig',
                    array('acessos'=>$acessos,
                    'voluntarios'=>$voluntarios,
                    'perfis'=>$perfis), 
                    new Response('Ok', 200)
                );
            }
        )->bind('acessoCadastrar');

        $ctrl->post(
            '/salvar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                $cripto = $app['security.default_encoder']->encodePassword($dados['password'], $app['security.salt']);
                $dados['password'] = $cripto;
                $acesso = $app['acesso_service']->save($dados);
                if ($acesso) {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('acessoCadastrar')
                    );
                } else {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('acessoCadastrar')
                    );
                }
            }
        )->bind('acessoSalvar');

        $ctrl->get(
            '/editar/{id}', function ($id) use ($app) {
                $acesso = $app['acesso_service']->findById($id);
                if ($acesso) {
                    $voluntarios = $app['voluntario_service']->listNoAccess();
                    $perfis = $app['tipo_service']->findByGrupo('RLE');
                    return $app['twig']->render(
                        'cadastroAcesso.twig',
                        array('acesso'=>$acesso,
                            'voluntarios'=>$voluntarios,
                            'perfis'=>$perfis), 
                        new Response('Ok', 200)
                    );
                } else {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('acessoCadastrar')
                    );
                }
            }
        )->bind('acessoEditar');

        $ctrl->get(
            '/excluir/{id}', function ($id) use ($app) {
                if ($id) {
                    $excluiu = $app['acesso_service']->delete($id);
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('acessoCadastrar')
                    );
                } else {
                    return $app->abort(
                        500, 
                        "A credencial que vc escolheu não existe. Tente novamente."
                    ); 
                }
            }
        )->bind('acessoExcluir')->assert('id', '\d+');
        
        return $ctrl;
    }
}