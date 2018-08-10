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
                $frequencia_id = $app['frequencia_service']->save($dados);
                if ($frequencia_id > 0) {
                    return new Response(
                        $app->json(['resultado'=>"Frequência cadastrada com sucesso!"], 201)
                    );
                } else {
                    return $app->abort(
                        404, "Ops... não foi possível cadastrar a frequência"
                    ); 
                }
            }
        )->bind('frequenciaSalvar');

        $ctrl->get(
            '/listar', function ($dominio) use ($app) {
                $registros = $app['frequencia_service']->fetchAll();
                if ($registros) {
                    return new Response(
                        $app->json(
                            $registros, 201, ['Content-Type' => 'application/json']
                        )
                    );
                } else {
                    return $app->abort(
                        404, 
                        "Ops... nenhuma frequência cadastrada"
                    );
                }             
            }
        )->bind('frequenciaListar');

        $ctrl->delete(
            '/excluir/{id}', function ($id) use ($app) {
                if ($id) {
                    $excluiu = $app['frequencia_service']->delete($id);
                    return new Response(
                        $app->json(
                            $excluiu, 201, ['Content-Type' => 'application/json']
                        )
                    );
                } else {
                    return $app->abort(
                        404, 
                        "A frequência que vc escolheu não existe. Tente novamente."
                    ); 
                }
            }
        )->bind('frequenciaExcluir')->assert('id', '\d+');
        
        return $ctrl;
    }
}