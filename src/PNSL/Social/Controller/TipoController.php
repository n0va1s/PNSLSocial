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
            '/cadastro', function () use ($app) {
                return $app['twig']->render(
                    'cadastroTipo.twig',
                    array('dominio'=>$dominio), 
                    new Response('Ok', 200)
                );
            }
        )->bind('tipoCadastrar');

        $ctrl->post(
            '/salvar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                $tipo_id = $app['tipo_service']->save($dados);
                if ($tipo_id > 0) {
                    return new Response(
                        $app->json(['resultado'=>"Configuração cadastrada com sucesso!"], 201)
                    );
                } else {
                    return $app->abort(
                        404, "Ops... não foi possível cadastrar a configuração"
                    ); 
                }
            }
        )->bind('tipoSalvar');

        $ctrl->get(
            '/listar', function ($dominio) use ($app) {
                $registros = $app['tipo_service']->fetchAll();
                if ($registros) {
                    return new Response(
                        $app->json(
                            $registros, 201, ['Content-Type' => 'application/json']
                        )
                    );
                } else {
                    return $app->abort(
                        404, 
                        "Ops... nenhuma configuração cadastrada"
                    );
                }             
            }
        )->bind('tipoListar');

        $ctrl->delete(
            '/excluir/{id}', function ($id) use ($app) {
                if ($id) {
                    $excluiu = $app['tipo_service']->delete($id);
                    return new Response(
                        $app->json(
                            $excluiu, 201, ['Content-Type' => 'application/json']
                        )
                    );
                } else {
                    return $app->abort(
                        404, 
                        "A configuração que vc escolheu não existe. Tente novamente."
                    ); 
                }
            }
        )->bind('tipoExcluir')->assert('id', '\d+');
        
        return $ctrl;
    }
}