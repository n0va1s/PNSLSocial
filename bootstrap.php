<?php

require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\EventManager as EventManager;
use Doctrine\ORM\Events;
use Doctrine\ORM\Configuration;
use Doctrine\Common\Cache\ArrayCache as Cache;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\ClassLoader;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use PNSL\Social\Provider\UserProvider;

//Buscar as variaveis do arquivo de configuracao
$env = getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production';
$ini_config = parse_ini_file(__DIR__.'/config.ini', true);
$file_config = $ini_config[$env];

$cache = new Doctrine\Common\Cache\ArrayCache;
$annotationReader = new Doctrine\Common\Annotations\AnnotationReader;

$cachedAnnotationReader = new Doctrine\Common\Annotations\CachedReader($annotationReader, $cache);

$annotationDriver = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
    $cachedAnnotationReader, // our cached annotation reader
    array(__DIR__ . DIRECTORY_SEPARATOR . 'src')
);

$driverChain = new Doctrine\ORM\Mapping\Driver\DriverChain();
$driverChain->addDriver($annotationDriver, 'PNSL');

$config = new Doctrine\ORM\Configuration;
$config->setProxyDir('/tmp');
$config->setProxyNamespace('Proxy');
$config->setAutoGenerateProxyClasses(true); // this can be based on production config.
// register metadata driver
$config->setMetadataDriverImpl($driverChain);
// use our allready initialized cache driver
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

AnnotationRegistry::registerFile(__DIR__. DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' . DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Driver' . DIRECTORY_SEPARATOR . 'DoctrineAnnotations.php');
$evm = new Doctrine\Common\EventManager();
$em = EntityManager::create(
    array(
        'driver'    => $file_config['db.driver'],
        'host'      => $file_config['db.host'],
        'port'      => $file_config['db.port'],
        'user'      => $file_config['db.user'],
        'password'  => $file_config['db.password'],
        'dbname'    => $file_config['db.name'],
        'charset'   => 'utf8',
    ),
    $config,
    $evm
);

/*
ini_set('display_errors', 1);
error_reporting(-1);
ErrorHandler::register();
if ('cli' !== php_sapi_name()) {
    ExceptionHandler::register();
}
*/

$app = new \Silex\Application();
$app['debug'] = $file_config['log.enabled'];

$app->register(
    new Silex\Provider\TwigServiceProvider(), 
    array(
        'twig.path' => __DIR__.'/web/view',
        'twig.options' => array('cache' => __DIR__.'/web/cache'),
    )
);

$app->register(
    new Silex\Provider\AssetServiceProvider(), 
    array(
        'assets.version' => 'v1',
        'assets.version_format' => '%s?version=%s',
        'assets.named_packages' => array(
            'css' => array('version' => 'css2', 'base_path' => $file_config['path.css']),
            'img' => array('base_path' => $file_config['path.img']),
            'js' => array('base_path' => $file_config['path.js']),
            'file' => array('base_path' => $file_config['path.file']),
        ),
    )
);

$app->register(
    new Silex\Provider\SwiftmailerServiceProvider(), 
    array(
        'swiftmailer.options' => array(
            'host'       => $file_config['mail.host'],
            'port'       => $file_config['mail.port'],
            'username'   => $file_config['mail.username'],
            'password'   => $file_config['mail.password'],
            'encryption' => $file_config['mail.encryption'],
            'auth_mode'  => $file_config['mail.auth_mode'],
        )
    )
);

//Para nao guardar os emails na fila
$app['swiftmailer.use_spool'] = false;

$app->register(new Silex\Provider\SessionServiceProvider());

$app->register(
    new Silex\Provider\SecurityServiceProvider(), 
    array(
        'security.firewalls' => array(
            'login' => array(
                'pattern' => '^/login$',
            ),
            'restrito' => array(
                'pattern' => '^/restrito/*.*$',
                'form' => array(
                    'login_path' => '/login', 
                    'check_path' => '/restrito/autenticacao'
                ),
                'logout' => array(
                    'logout_path' => '/restrito/logout', 
                    'invalidate_session' => true
                ),
                'users' => function () use ($em) {
                    return new UserProvider($em);
                },
            ),
            'publico' => array(
                'anonymous' => true,
            ),
        ),
        'security.role_hierarchy' => array(
            'ROLE_ADMIN' => array('ROLE_USER', 'ROLE_ALLOWED_TO_SWITCH')
        ),
        'security.access_rules' => array(
            array('^/restrito/*.*$', 'ROLE_ADMIN'),
            // array('^/restrito/*.*$', 'ROLE_ADMIN', 'https'),
            array('^.*$', 'ROLE_USER'),
        )
    )
);

$app['security.default_encoder'] = function ($app) {
    return $app['security.encoder.pbkdf2'];
};

$app->boot();

// Para tratar os erros comuns da aplicacao
// $app->error(function (\Exception $e, Request $request, $code) use ($app) {
//     if ($app['debug']) {
//         return;
//     }
//     switch ($code) {
//         case 404:
//             $message = 'Ops... essa página não existe';
//             break;
//         default:
//             $message = 'Hum... estamos passando por problemas técnicos. Tente mais tarde.';
//     }
//     return new Response($message);
// });

//Menu
$app->get(
    '/', function () use ($app) {
        return $app['twig']->render('inicio.twig');
    }
)->bind('index');

$app->get(
    '/login', function(Request $request) use ($app) {
        return $app['twig']->render(
            'login.twig', array(
                'error'         => $app['security.last_error']($request),
                'last_username' => $app['session']->get('_security.last_username'),
            )
        );
    }
)->bind('login');

$app->post(
    '/restrito/autenticacao', function(Request $req) use ($app) {
        $dados = $req->request->all();
echo "<pre>";
print_r($dados);
echo "</pre>";
exit;        
        return $app['twig']->render(
            'areaRestrita.twig', array()
        );
    }
)->bind('autenticacao');
//Area restrita
$app->mount('/restrito/relatorio', new PNSL\Social\Controller\RelatorioController($em));
$app->mount('/restrito/atendimento', new PNSL\Social\Controller\AtendimentoController($em));
$app->mount('/restrito/frequencia', new PNSL\Social\Controller\FrequenciaController($em));
$app->mount('/restrito/acao', new PNSL\Social\Controller\AcaoController($em));
$app->mount('/restrito/voluntario', new PNSL\Social\Controller\VoluntarioController($em));
$app->mount('/restrito/usuario', new PNSL\Social\Controller\UsuarioController($em));
$app->mount('/restrito/configuracao', new PNSL\Social\Controller\TipoController($em));
//Area publica
$app->mount('/site', new PNSL\Social\Controller\SiteController($em));
