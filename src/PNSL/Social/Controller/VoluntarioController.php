<?php
namespace PNSL\Social\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use PNSL\Social\Service\PessoaService;
use PNSL\Social\Service\VoluntarioService;

class VoluntarioController implements ControllerProviderInterface
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
        $app['pessoa_service'] = function () {
            return new PessoaService($this->em);
        };
        $app['voluntario_service'] = function () {
            return new VoluntarioService($this->em);
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
                $estados_civis = $app['tipo_service']->findByGrupo('CIV');
                $tipos_telefone = $app['tipo_service']->findByGrupo('FON');
                $voluntarios = $app['voluntario_service']->fetchAll();
                return $app['twig']->render(
                    'cadastroVoluntario.twig',
                    array('estados_civis'=>$estados_civis, 
                    'tipos_telefone'=>$tipos_telefone,
                    'voluntarios'=>$voluntarios), 
                    new Response('OK', 200)
                );
            }
        )->bind('voluntarioCadastrar');

        $ctrl->post(
            '/salvar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                $pessoa = $app['pessoa_service']->save($dados);
                $voluntario = $app['voluntario_service']->save($pessoa, $dados);
                if ($voluntario) {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('voluntarioCadastrar')
                    );
                } else {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('voluntarioCadastrar')
                    );
                }
            }
        )->bind('voluntarioSalvar');

        $ctrl->get(
            '/editar/{id}', function ($id) use ($app) {
                if ($id) {
                    $estados_civis = $app['tipo_service']->findByGrupo('CIV');
                    $tipos_telefone = $app['tipo_service']->findByGrupo('FON');
                    $voluntario = $app['voluntario_service']->findById($id);                    
                    if ($voluntario) {                        
                        return $app['twig']->render(
                            'cadastroVoluntario.twig',
                            array('estados_civis'=>$estados_civis, 
                            'tipos_telefone'=>$tipos_telefone,
                            'voluntario'=>$voluntario), 
                            new Response('OK', 200)
                        );
                    } else {
                        return $app->redirect(
                            $app['url_generator']
                            ->generate('voluntarioCadastrar')
                        );
                    }
                } else {
                    return $app->abort(
                        500, 
                        "Não encontrei o voluntário para excluir"
                    ); 
                }
            }
        )->bind('voluntarioEditar')->assert('id', '\d+');

        $ctrl->get(
            '/excluir/{id}', function ($id) use ($app) {
                if ($id) {
                    $excluiu = $app['voluntario_service']->delete($id);
                    if ($excluiu) {                        
                        return $app->redirect(
                            $app['url_generator']
                            ->generate('voluntarioCadastrar')
                        );
                    } else {
                        return $app->redirect(
                            $app['url_generator']
                            ->generate('voluntarioCadastrar')
                        );
                    }
                } else {
                    return $app->abort(
                        500, 
                        "Não encontrei o voluntário para excluir"
                    ); 
                }
            }
        )->bind('voluntarioExcluir')->assert('id', '\d+');
        
        return $ctrl;
    }
}