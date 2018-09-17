<?php
namespace PNSL\Social\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use PNSL\Social\Service\AtendimentoService;

class AtendimentoController implements ControllerProviderInterface
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
        $app['atendimento_service'] = function () {
            return new AtendimentoService($this->em);
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
                $acoes = $app['acao_service']->findByTipo('Individual');
                $usuarios = $app['pessoa_service']->findUsuarios();
                $atendimentos = $app['atendimento_service']->fetchAll();
// echo "<pre>";
// print_r($atendimentos[0]);
// echo "</pre>";
// exit;
                return $app['twig']->render(
                    'cadastroAtendimento.twig',
                    array('acoes'=>$acoes,
                    'usuarios'=>$usuarios,
                    'atendimentos'=>$atendimentos), 
                    new Response('Ok', 200)
                );
            }
        )->bind('atendimentoCadastrar');

        $ctrl->post(
            '/salvar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                $atendimento = $app['atendimento_service']->save($dados);
                if ($atendimento) {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('atendimentoCadastrar')
                    );
                } else {
                    return $app->abort(
                        500, "Ops... não foi possível cadastrar a atendimento"
                    ); 
                }
            }
        )->bind('atendimentoSalvar');

        $ctrl->get(
            '/editar/{id}', function ($id) use ($app) {
                if ($id) {
                    $atendimento = $app['atendimento_service']->findById($id);
                    if ($atendimento) {
                        $acoes = $app['acao_service']->findByTipo('Individual');
                        $usuarios = $app['pessoa_service']->findUsuarios();
                        $atendimentos = $app['atendimento_service']->fetchAll();
                        return $app['twig']->render(
                            'cadastroAtendimento.twig',
                            array('acoes'=>$acoes,
                            'usuarios'=>$usuarios,
                            'atendimentos'=>$atendimentos,
                            'atendimento'=>$atendimento), 
                            new Response('Ok', 200)
                        );
                    } else {
                        return $app->redirect(
                            $app['url_generator']
                            ->generate('atendimentoCadastrar')
                        );
                    }
                    
                } else {
                    return $app->abort(
                        500, 
                        "O atendimento que vc escolheu não existe. Tente novamente."
                    ); 
                }
            }
        )->bind('atendimentoEditar')->assert('id', '\d+');

        $ctrl->get(
            '/excluir/{id}', function ($id) use ($app) {
                if ($id) {
                    $excluiu = $app['atendimento_service']->delete($id);
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('atendimentoCadastrar')
                    );
                } else {
                    return $app->abort(
                        500, 
                        "A atendimento que vc escolheu não existe. Tente novamente."
                    ); 
                }
            }
        )->bind('atendimentoExcluir')->assert('id', '\d+');

        $ctrl->get(
            '/certificar/{id}', function ($id) use ($app) {
                if ($id) {
                    $atendimento = $app['atendimento_service']->findById($id);
                    if ($atendimento) {
                        return $app['twig']->render(
                            'certificadoComparecimento.twig',
                            array('atendimento'=>$atendimento), 
                            new Response('OK', 200)
                        );
                    } else {
                        return $app->redirect(
                            $app['url_generator']
                            ->generate('atendimentoCadastrar')
                        );
                    }
                } else {
                    return $app->abort(
                        500, 
                        "Não consegui gerar o certificado"
                    ); 
                }
            }
        )->bind('atendimentoCertificar')->assert('id', '\d+');
        
        return $ctrl;
    }
}