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
                $tipos_pessoa = $app['tipo_service']->findByGrupo('PES');
                $estados_civis = $app['tipo_service']->findByGrupo('CIV');
                $sexos = $app['tipo_service']->findByGrupo('SEX');
                $tipos_telefone = $app['tipo_service']->findByGrupo('FON');
                $ufs = $app['tipo_service']->findByGrupo('UF');
                $tipos_registro = $app['tipo_service']->findByGrupo('REG');
                $voluntarios = $app['voluntario_service']->fetchAll();
                return $app['twig']->render(
                    'cadastroVoluntario.twig',
                    array('tipos_pessoa'=>$tipos_pessoa,
                    'estados_civis'=>$estados_civis, 
                    'sexos'=>$sexos, 
                    'tipos_telefone'=>$tipos_telefone,
                    'ufs'=>$ufs,
                    'tipos_registro'=>$tipos_registro,
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
                    $voluntario = $app['voluntario_service']->findById($id);
                    if ($voluntario) {                        
                        $tipos_pessoa = $app['tipo_service']->findByGrupo('PES');
                        $estados_civis = $app['tipo_service']->findByGrupo('CIV');
                        $sexos = $app['tipo_service']->findByGrupo('SEX');
                        $tipos_telefone = $app['tipo_service']->findByGrupo('FON');
                        $ufs = $app['tipo_service']->findByGrupo('UF');
                        $tipos_registro = $app['tipo_service']->findByGrupo('REG');
                        return $app['twig']->render(
                            'cadastroVoluntario.twig',
                            array('tipos_pessoa'=>$tipos_pessoa,
                            'estados_civis'=>$estados_civis, 
                            'sexos'=>$sexos, 
                            'tipos_telefone'=>$tipos_telefone,
                            'ufs'=>$ufs,
                            'tipos_registro'=>$tipos_registro,
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