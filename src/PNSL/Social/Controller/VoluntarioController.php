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
                return $app['twig']->render(
                    'cadastroVoluntario.twig',
                    array(), 
                    new Response('Ok', 200)
                );
            }
        )->bind('voluntarioCadastrar');

        $ctrl->post(
            '/salvar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                $pessoa_id = $app['pessoa_service']->save($dados);
                $voluntario_id = $app['voluntario_service']->save($pessoa_id, $dados);
                if ($voluntario_id > 0) {
                    return new Response(
                        $app->json('Voluntário cadastrado com sucesso!', 201)
                    );
                } else {
                    return $app->abort(
                        404, "Ops... não foi possível cadastrar o voluntário"
                    ); 
                }
            }
        )->bind('voluntarioSalvar');

        $ctrl->get(
            '/listar', function () use ($app) {
                $voluntarios = $app['voluntario_service']->findAll();
                if ($voluntarios) {
                    return new Response(
                        $app->json(
                            $voluntarios, 201, ['Content-Type' => 'application/json']
                        )
                    );
                } else {
                    return $app->abort(
                        404, 
                        "Ops... não foi possível cadastrar o voluntário"
                    );
                }             
            }
        )->bind('voluntarioListar');

        $ctrl->delete(
            '/excluir/{id}', function ($id) use ($app) {
                $voluntario = $app['voluntario_service']->findById($id);
                if ($voluntario) {
                    $excluiu = $app['voluntario_service']->delete(
                        $voluntario->getPessoa()->getId()
                    );
                    return new Response(
                        $app->json(
                            $excluiu, 201, ['Content-Type' => 'application/json']
                        )
                    );
                } else {
                    return $app->abort(
                        404, 
                        "O voluntário que vc escolheu não existe. Tente novamente."
                    ); 
                }
            }
        )->bind('voluntarioExcluir')->assert('id', '\d+');
        
        return $ctrl;
    }
}