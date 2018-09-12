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
                $publicos_alvo = $app['tipo_service']->findByGrupo('PUB');
                $faixas_etarias = $app['tipo_service']->findByGrupo('ETA');
                $turnos = $app['tipo_service']->findByGrupo('TRN');
                $dias = $app['tipo_service']->findByGrupo('SEM');
                $voluntarios = $app['voluntario_service']->fetchAll();
                $usuarios = $app['pessoa_service']->findUsuarios();
                $acoes = $app['acao_service']->fetchAll();
                return $app['twig']->render(
                    'cadastroAcao.twig',
                    array('tipos_acao'=>$tipos_acao,
                    'publicos_alvo'=>$publicos_alvo,
                    'faixas_etarias'=>$faixas_etarias,
                    'turnos'=>$turnos,
                    'dias'=>$dias,
                    'voluntarios'=>$voluntarios,
                    'usuarios'=>$usuarios,
                    'acoes'=>$acoes), 
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
                $acao = $req->request->get('acao');
                $usuario = $req->request->get('usuario');
                $turma = $app['acao_service']->addTurma($acao, $usuario);
                if ($turma) {
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

        $ctrl->get(
            '/editar/{id}', function ($id) use ($app) {
                if ($id) {
                    $acao = $app['acao_service']->findById($id);
                    if ($acao) {
                        $tipos_acao = $app['tipo_service']->findByGrupo('TPÀ');
                        $publicos_alvo = $app['tipo_service']->findByGrupo('PUB');
                        $faixas_etarias = $app['tipo_service']->findByGrupo('ETA');
                        $turnos = $app['tipo_service']->findByGrupo('TRN');
                        $dias = $app['tipo_service']->findByGrupo('SEM');
                        $voluntarios = $app['voluntario_service']->fetchAll();
                        $usuarios = $app['pessoa_service']->findUsuarios();
                        return $app['twig']->render(
                            'cadastroAcao.twig',
                            array('tipos_acao'=>$tipos_acao,
                            'publicos_alvo'=>$publicos_alvo,
                            'faixas_etarias'=>$faixas_etarias,
                            'turnos'=>$turnos,
                            'dias'=>$dias,
                            'voluntarios'=>$voluntarios,
                            'usuarios'=>$usuarios,
                            'acao'=>$acao), 
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
                        "Não encontrei a ação para excluir"
                    ); 
                }
            }
        )->bind('acaoEditar')->assert('id', '\d+');

        $ctrl->get(
            '/obter/{id}', function ($id) use ($app) {
                if ($id) {
                    $acao = $app['acao_service']->findById($id);
                    if ($acao) {
                        return $app->json(
                            $acao, 201, ['Content-Type' => 'application/json']
                        );
                    } else {
                        return $app->abort(
                            500, 
                            "Não encontrei a ação"
                        );
                    }
                } else {
                    return $app->abort(
                        500, 
                        "Não encontrei a ação"
                    ); 
                }
            }
        )->bind('acaoObter')->assert('id', '\d+');

        $ctrl->get(
            '/certificar/{acao}/{voluntario}', function ($acao, $voluntario) use ($app) {
                if ($acao) {
                    $acao = $app['acao_service']->findByVoluntario($voluntario, $acao);
                    if ($acao) {
                        return $app['twig']->render(
                            'certificadoVoluntario.twig',
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
                        "Não consegui gerar o certificado"
                    ); 
                }
            }
        )->bind('acaoCertificar')->assert('id', '\d+');

        $ctrl->get(
            '/assinar/{acao}/{voluntario}', function ($acao, $voluntario) use ($app) {
                if ($acao) {
                    $acao = $app['acao_service']->findByVoluntario($voluntario, $acao);
                    if ($acao) {
                        return $app['twig']->render(
                            'termoVoluntario.twig',
                            array('acao'=>$acao), 
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
                        "Não consegui gerar o termo"
                    ); 
                }
            }
        )->bind('acaoAssinar')->assert('id', '\d+');

        $ctrl->get(
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