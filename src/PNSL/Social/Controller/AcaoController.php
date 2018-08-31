<?php
namespace PNSL\Social\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use PNSL\Social\Service\AcaoService;
use PNSL\Social\Service\VoluntarioService;
use PNSL\Social\Service\TipoService;

class AcaoController implements ControllerProviderInterface
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
        $app['acao_service'] = function () {
            return new AcaoService($this->em);
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
                $tipos_acao = $app['tipo_service']->findByGrupo('TPÀ');
                $turnos = $app['tipo_service']->findByGrupo('TRN');
                $voluntarios = $app['voluntario_service']->fetchAll();
                $usuarios = $app['pessoa_service']->fetchAll();
                return $app['twig']->render(
                    'cadastroAcao.twig',
                    array('tipos_acao'=>$tipos_acao,
                    'turnos'=>$turnos,
                    'voluntarios'=>$voluntarios,
                    'usuarios'=>$usuarios), 
                    new Response('OK', 200)
                );
            }
        )->bind('acaoCadastrar');

        $ctrl->post(
            '/salvar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                $acao = $app['acao_service']->save($dados);
                if ($acao) {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('acaoCadastrar')
                    );
                } else {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('acaoCadastrar')
                    ); 
                }
            }
        )->bind('acaoSalvar');

        $ctrl->post(
            '/usuario', function (Request $req) use ($app) {
                $voluntario = $req->request->all();
                $adicionou = $app['acao_service']->addVoluntario($dados);
                if ($adicionou) {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('acaoCadastrar')
                    );
                } else {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('acaoCadastrar')
                    ); 
                }
            }
        )->bind('acaoAdicionarUsuario');

        $ctrl->delete(
            '/excluir/{id}', function ($id) use ($app) {
                if ($id) {
                    $excluiu = $app['acao_service']->delete($id);
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('acaoCadastrar')
                    ); 
                } else {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('acaoCadastrar')
                    ); 
                }
            }
        )->bind('acaoExcluir')->assert('id', '\d+');
        
        return $ctrl;
    }
}