<?php
namespace PNSL\Social\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use PNSL\Social\Service\PessoaService;
use PNSL\Social\Service\ResponsavelService;
use PNSL\Social\Service\EscolaService;

class UsuarioController implements ControllerProviderInterface
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

        $app['escola_service'] = function () {
            return new EscolaService($this->em);
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
                $tipos_pessoa = $app['tipo_service']->findByGrupo('PES');
                $sexos = $app['tipo_service']->findByGrupo('SEX');
                $estados_civis = $app['tipo_service']->findByGrupo('CIV');
                $tipos_telefone = $app['tipo_service']->findByGrupo('FON');
                $parentescos = $app['tipo_service']->findByGrupo('PRT');
                $turnos = $app['tipo_service']->findByGrupo('TRN');
                $graus = $app['tipo_service']->findByGrupo('GRA');
                $ufs = $app['tipo_service']->findByGrupo('UF');
                $tipos_renda_familiar = $app['tipo_service']->findByGrupo('RND');
                $tipos_registro = $app['tipo_service']->findByGrupo('REG');
                $tipos_origem = $app['tipo_service']->findByGrupo('ORG');
                $usuarios = $app['pessoa_service']->fetchAll();
                return $app['twig']->render(
                    'cadastroUsuario.twig',
                    array('tipos_pessoa'=>$tipos_pessoa,
                    'sexos'=>$sexos,
                    'estados_civis'=>$estados_civis, 
                    'tipos_telefone'=>$tipos_telefone,
                    'parentescos'=>$parentescos,
                    'turnos'=>$turnos,
                    'graus'=>$graus,
                    'ufs'=>$ufs,
                    'tipos_renda_familiar'=>$tipos_renda_familiar,
                    'tipos_registro'=>$tipos_registro,
                    'tipos_origem'=>$tipos_origem,
                    'usuarios'=>$usuarios), 
                    new Response('OK', 200)
                );
            }
        )->bind('usuarioCadastrar');

        $ctrl->post(
            '/salvar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                $pessoa = $app['pessoa_service']->save($dados);
                $escola = $app['escola_service']->save($pessoa, $dados);
                if ($pessoa) {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('usuarioCadastrar')
                    );
                } else {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('usuarioCadastrar')
                    );
                }
            }
        )->bind('usuarioSalvar');

        $ctrl->get(
            '/editar/{id}', function ($id) use ($app) {
                if ($id) {
                    $usuario = $app['pessoa_service']->findById($id);
                    if ($usuario) {                        
                        $tipos_pessoa = $app['tipo_service']->findByGrupo('PES');
                        $sexos = $app['tipo_service']->findByGrupo('SEX');
                        $estados_civis = $app['tipo_service']->findByGrupo('CIV');
                        $tipos_telefone = $app['tipo_service']->findByGrupo('FON');
                        $parentescos = $app['tipo_service']->findByGrupo('PRT');
                        $turnos = $app['tipo_service']->findByGrupo('TRN');
                        $graus = $app['tipo_service']->findByGrupo('GRA');
                        $ufs = $app['tipo_service']->findByGrupo('UF');
                        $tipos_renda_familiar = $app['tipo_service']->findByGrupo('RND');
                        $tipos_registro = $app['tipo_service']->findByGrupo('RND');
                        $tipos_origem = $app['tipo_service']->findByGrupo('ORG');
                        $usuarios = $app['pessoa_service']->fetchAll();
                        return $app['twig']->render(
                            'cadastroUsuario.twig',
                            array('tipos_pessoa'=>$tipos_pessoa,
                            'sexos'=>$sexos,
                            'estados_civis'=>$estados_civis, 
                            'tipos_telefone'=>$tipos_telefone,
                            'parentescos'=>$parentescos,
                            'turnos'=>$turnos,
                            'graus'=>$graus,
                            'ufs'=>$ufs,
                            'tipos_renda_familiar'=>$tipos_renda_familiar,
                            'tipos_registro'=>$tipos_registro,
                            'tipos_origem'=>$tipos_origem,
                            'usuario'=>$usuario,
                            'usuarios'=>$usuarios), 
                            new Response('OK', 200)
                        );
                    } else {
                        return $app->redirect(
                            $app['url_generator']
                            ->generate('usuarioCadastrar')
                        );
                    }
                } else {
                    return $app->abort(
                        500, 
                        "Não encontrei o usuário para excluir"
                    ); 
                }
            }
        )->bind('usuarioEditar')->assert('id', '\d+');

        $ctrl->get(
            '/excluir/{id}', function ($id) use ($app) {
                if ($id) {
                    $excluiu = $app['pessoa_service']->delete($id);
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('usuarioCadastrar')
                    );
                } else {
                    return $app->redirect(
                        $app['url_generator']
                        ->generate('usuarioCadastrar')
                    );
                }
            }
        )->bind('usuarioExcluir')->assert('id', '\d+');
        
        return $ctrl;
    }
}