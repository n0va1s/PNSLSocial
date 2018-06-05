<?php
namespace PNSL\Social\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
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
        $app['voluntario_service'] = function () {
            return new VoluntarioService($this->em);
        };

        $ctrl->get(
            '/', function () use ($app) {
                return $app['twig']->render(
                    'cadastroVoluntario.twig',
                    new Response('Ok', 200)
                );
            }
        )->bind('cadastroVoluntario');

        $ctrl->post(
            '/salvar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                $voluntario = $app['voluntario_service']->save($dados);
                if ($voluntario) {
                    $voluntarios = $app['voluntario_service']->findAll();
                    return $app['twig']->render(
                        'cadastroVoluntario.twig',
                        array('voluntarios'=>$voluntarios, 
                        'mensagem'=>'Voluntário cadastrado!'),
                        new Response('Ok', 200)
                    );
                } else {
                    return $app->abort(
                        404, 
                        "Ops... não foi possível cadastrar o voluntário"
                    ); 
                }
            }
        )->bind('voluntarioSalvar');

        $ctrl->delete(
            '/excluir/{id}', function ($id) use ($app) {
                $voluntario = $app['voluntario_service']->findById($id);
                if ($voluntario) {
                    $excluiu = $app['voluntario_service']->delete(
                        $voluntario->getPessoa()->getId()
                    );
                    $voluntarios = $app['voluntario_service']->findAll();
                    return $app['twig']->render(
                        'cadastroVoluntario.twig', 
                        array('voluntarios'=>$voluntarios,
                        'mensagem'=>'Voluntário excluído!'), 
                        new Response('Ok', 200)
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