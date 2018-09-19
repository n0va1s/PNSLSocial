<?php
namespace PNSL\Social\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;

class RelatorioController implements ControllerProviderInterface
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
            '/anual/html', function () use ($app) {
                $resultado['tipo'] = $app['acao_service']->consolidarTipo();
                $resultado['turno'] = $app['acao_service']->consolidarTurno();
                $resultado['publico_alvo'] = $app['acao_service']->consolidarPublicoAlvo();
                $resultado['faixa_etaria'] = $app['acao_service']->consolidarFaixaEtaria();
                $resultado['dia_semana'] = $app['acao_service']->consolidarDiaSemana();
                $resultado['idade'] = $app['pessoa_service']->consolidarIdade();
                $resultado['estado_civil'] = $app['pessoa_service']->consolidarEstadoCivil();
                $resultado['parentesco'] = $app['pessoa_service']->consolidarParentesco();
                $resultado['sexo'] = $app['pessoa_service']->consolidarSexo();
                $resultado['tipo_pessoa'] = $app['pessoa_service']->consolidarTipoPessoa();
                $resultado['uf'] = $app['pessoa_service']->consolidarUF();
                return $app['twig']->render(
                    'relatorioPrestacaoConta.twig',
                    array('resultado'=>$resultado), 
                    new Response('Ok', 200)
                );
            }
        )->bind('relatorioPrestacaoContaHTML');

        $ctrl->get(
            '/anual/json', function () use ($app) {
                $dados = $app['relatorio_service']->relatorioAnual();
                if ($dados) {
                    $app->json(
                        $dados, 201, ['Content-Type' => 'application/json']
                    );
                } else {
                    return $app->abort(
                        404, 
                        "Ops... não há dados para o relatório"
                    );
                }                
            }
        )->bind('relatorioPrestacaoContaJSON');
        
        return $ctrl;
    }
}