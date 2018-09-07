<?php
namespace PNSL\Social\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use PNSL\Social\Service\FrequenciaService;

class FrequenciaController implements ControllerProviderInterface
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
        $app['frequencia_service'] = function () {
            return new FrequenciaService($this->em);
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
                return $app['twig']->render(
                    'cadastroFrequencia.twig',
                    array(), 
                    new Response('Ok', 200)
                );
            }
        )->bind('frequenciaCadastrar');

        $ctrl->post(
            '/salvar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                $frequencia = $app['frequencia_service']->save($dados);
                if ($frequencia) {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('frequenciaCadastrar')
                    );
                } else {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('frequenciaCadastrar')
                    ); 
                }
            }
        )->bind('frequenciaSalvar');

        $ctrl->get(
            '/listar', function ($dominio) use ($app) {
                $frequencias = $app['frequencia_service']->fetchAll();
                if ($frequencias) {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('frequenciaCadastrar')
                    );
                } else {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('frequenciaCadastrar')
                    ); 
                }             
            }
        )->bind('frequenciaListar');

        $ctrl->delete(
            '/excluir/{id}', function ($id) use ($app) {
                if ($id) {
                    $excluiu = $app['frequencia_service']->delete($id);
                    if ($excluiu) {
                        return $app->redirect(
                            $app['url_generator']
                            ->generate('frequenciaCadastrar')
                        );
                    } else {
                        return $app->redirect(
                            $app['url_generator']
                            ->generate('frequenciaCadastrar')
                        ); 
                    }
                } else {
                    return $app->abort(
                        500, 
                        "A frequência que vc escolheu não existe. Tente novamente."
                    ); 
                }
            }
        )->bind('frequenciaExcluir')->assert('id', '\d+');

        $ctrl->get(
            '/certificar/{acao}/{usuario}', function ($acao, $usuario) use ($app) {
                if ($id) {
                    $acao = $app['acao_service']->findById($acao);
                    $usuario = $app['pessoa_service']->findById($usuario);
                    if ($acao) {
                        return $app['twig']->render(
                            'certificadoParticipacao.twig',
                            array('acao'=>$acao,
                            'usuario'=>$usuario), 
                            new Response('OK', 200)
                        );
                    } else {
                        return $app->redirect(
                            $app['url_generator']
                            ->generate('acaoCadastrar')
                        );
                    }
                } else {
                    return $app->abort(
                        500, 
                        "Não encontei o certificado para emitir"
                    ); 
                }
            }
        )->bind('frequenciaCertificar')->assert('id', '\d+');
        
        return $ctrl;
    }
}