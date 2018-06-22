<?php
namespace PNSL\Social\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use PNSL\Social\Service\PessoaService;
use PNSL\Social\Service\ResponsavelService;

class ResponsavelController implements ControllerProviderInterface
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
        $app['responsavel_service'] = function () {
            return new ResponsavelService($this->em);
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
                    'cadastroResponsavel.twig',
                    array(), 
                    new Response('Ok', 200)
                );
            }
        )->bind('responsavelCadastrar');

        $ctrl->post(
            '/salvar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                $pessoa_id = $app['pessoa_service']->save($dados);
                $responsavel_id = $app['responsavel_service']->save($pessoa_id, $dados);
                if ($responsavel_id > 0) {
                    return new Response(
                        $app->json(['resultado'=>'Responsável cadastrado com sucesso!'], 201)
                    );
                } else {
                    return $app->abort(
                        404, "Ops... não foi possível cadastrar o responsável"
                    ); 
                }
            }
        )->bind('responsavelSalvar');

        $ctrl->get(
            '/listar', function () use ($app) {
                $responsavels = $app['responsavel_service']->fetchAll();
                if ($responsavels) {
                    return new Response(
                        $app->json(
                            $responsavels, 201, ['Content-Type' => 'application/json']
                        )
                    );
                } else {
                    return $app->abort(
                        404, 
                        "Ops... não foi possível cadastrar o responsavel"
                    );
                }             
            }
        )->bind('responsavelListar');

        $ctrl->delete(
            '/excluir/{id}', function ($id) use ($app) {
                if ($id) {
                    $excluiu = $app['responsavel_service']->delete($id);
                    return new Response(
                        $app->json(
                            $excluiu, 201, ['Content-Type' => 'application/json']
                        )
                    );
                } else {
                    return $app->abort(
                        404, 
                        "O responsável que vc escolheu não existe. Tente novamente."
                    ); 
                }
            }
        )->bind('responsavelExcluir')->assert('id', '\d+');
        
        return $ctrl;
    }
}