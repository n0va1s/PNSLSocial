<?php
namespace PNSL\Social\Controller;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;

class SiteController implements ControllerProviderInterface
{
    private $em;
    private $file_config;    
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $env = getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production';
        $ini_config = parse_ini_file(__DIR__.'../../../../../config.ini', true);
        $this->file_config = $ini_config[$env];
    }

    public function connect(Application $app)
    {
        $ctrl = $app['controllers_factory'];
        
        $ctrl->get(
            '/nosso-impacto', function () use ($app) {
                $acoes = $app['acao_service']->fetchAll();
                $resultado['acao'] = $app['acao_service']->consolidarAcao();
                $resultado['turma'] = $app['acao_service']->consolidarTurma();
                $resultado['atendimento'] = $app['acao_service']->consolidarAtendimento();
                $resultado['pessoa'] = $app['pessoa_service']->consolidarPessoa();
                return $app['twig']->render(
                    'nossoImpacto.twig',
                    array('resultado'=>$resultado,
                    'acoes'=>$acoes), 
                    new Response('Ok', 200)
                );
            }
        )->bind('nossoImpacto');

        $ctrl->get(
            '/contato', function () use ($app) {
                return $app['twig']->render(
                    'contato.twig',
                    array(), 
                    new Response('Ok', 200)
                );
            }
        )->bind('contato');

        $ctrl->post(
            '/contato/enviar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                //so envia email se estiver configurado no config.ini
                if (isset($this->file_config['mail.enabled'])) {
                    $emailValido = filter_var(
                        $dados['email'], FILTER_VALIDATE_EMAIL
                    );
                    if ($emailValido) {
                        $message = (new \Swift_Message())
                        ->setCharset('utf-8')
                        ->setSubject('[CONTATO] Site '.$dados['nome'])
                        ->setFrom(array($dados['email']=>$dados['nome']))
                        ->setTo(array($this->file_config['mail.username']))
                        ->setBody(
                            $dados['mensagem'].' - Celular: '.$dados['celular']
                        );
                        $app['mailer']->send($message);
                    }
                }
                return $app['twig']->render(
                    'contato.twig',
                    array('mensagem'=>'Mensagem enviada. Obrigado!'), 
                    new Response('Ok', 200)
                );
            }
        )->bind('email');

        return $ctrl;
    }
}