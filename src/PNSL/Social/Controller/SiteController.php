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

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
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

        $ctrl->get(
            '/contato/enviar', function (Request $req) use ($app) {
                $dados = $req->request->all();
                //so envia email se estiver configurado no config.ini
                if (isset($file_config['mail.enabled'])) {
                    $validator = new EmailValidator();
                    if ($validator->isValid($dados['email'], new RFCValidation())) {
                        $message = (new \Swift_Message())->setCharset('utf-8');
                        $message->setSubject('[Contato] '.$dados['nome']);
                        $message->setFrom(
                            [$dados['email'] => 'casasaojose.net']
                        );
                        $message->setTo(['contato@casasaojose.net']);
                        $message->setBody(
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