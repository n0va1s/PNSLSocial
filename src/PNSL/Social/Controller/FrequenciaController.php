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
                $acoes = $app['acao_service']->fetchAll();
                return $app['twig']->render(
                    'cadastroFrequencia.twig',
                    array('acoes'=>$acoes),
                    new Response('Ok', 200)
                );
            }
        )->bind('frequenciaCadastrar');
        //Chamado via JQuery no cadastro de acoes
        $ctrl->post(
            '/turma', function (Request $req) use ($app) {
                $id = $req->request->get('acao');
                if ($id) {
                    $acoes = $app['acao_service']->findByTipo('Grupo');
                    $acao = $app['acao_service']->findById($id);
                    $turma = $app['acao_service']->findTurmaByAcao($id);
                    return $app['twig']->render(
                        'cadastroFrequencia.twig',
                        array('acoes'=>$acoes,
                        'turma'=>$turma,
                        'acao'=>$acao),
                        new Response('Ok', 200)
                    );
                } else {
                    return $app->abort(
                        500, 
                        "Não sei que ação vc escolheu."
                    );
                }
                
            }
        )->bind('frequenciaObterTurma');

        $ctrl->post(
            '/salvar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                //Organizei os dados da frequecia em um array com
                //turma (acao + aluno) e data
                foreach ($dados['turma'] as $turma) {
                    $presenca['turma']  = $turma;
                    foreach ($dados['dataFrequencia'] as $data) {
                        $presenca['data'] = $data;
                    }
                    $frequencia[] = $presenca;
                }
                $frequencia = $app['frequencia_service']->save($frequencia);
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

        $ctrl->post(
            '/pesquisar', function (Request $req) use ($app) {
                $id = $req->request->get('acao');
                if ($id) {
                    $acao = $app['acao_service']->findById($id);
                    if ($acao) {
                        $acoes = $app['acao_service']->fetchAll();
                        $turma = $app['frequencia_service']->fetchAll();
                        return $app['twig']->render(
                            'cadastroFrequencia.twig',
                            array('acoes'=>$acoes,
                            'acao'=>$acao,
                            'turma'=>$turma), 
                            new Response('Ok', 200)
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
                        "Não sei que ação vc escolheu."
                    );
                }
            }
        )->bind('frequenciaPesquisar');

        $ctrl->get(
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
            '/evadir/{id}', function ($id) use ($app) {
                if ($id) {
                    //$acao = $app['acao_service']->evadirTurma($id);
                    $evadiu = $app['frequencia_service']->evadir($id);
                    if ($evadiu) {
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
        )->bind('frequenciaEvadir')->assert('id', '\d+');

        $ctrl->get(
            '/certificar/{id}', function ($id) use ($app) {
                if ($id) {
                    $matricula = $app['frequencia_service']->findByTurma($id);
                    if ($matricula) {
                        return $app['twig']->render(
                            'certificadoParticipacao.twig',
                            array('matricula'=>$matricula), 
                            new Response('OK', 200)
                        );
                    } else {
                        return $app->abort(
                            500, 
                            "Não consegui gerar o certificado de participação"
                        );
                    }
                } else {
                    return $app->abort(
                        500, 
                        "A frequência que vc escolheu não existe. Tente novamente."
                    ); 
                }
            }
        )->bind('frequenciaCertificar')->assert('id', '\d+');
        
        return $ctrl;
    }
}