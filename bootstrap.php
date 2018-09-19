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

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/web/view',
    'twig.options' => array('cache' => __DIR__.'/web/cache'),
));

$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1',
    'assets.version_format' => '%s?version=%s',
    'assets.named_packages' => array(
        'css' => array('version' => 'css2', 'base_path' => $file_config['path.css']),
        'img' => array('base_path' => $file_config['path.img']),
        'js' => array('base_path' => $file_config['path.js']),
        'file' => array('base_path' => $file_config['path.file']),
    ),
));

$app->register(new Silex\Provider\SwiftmailerServiceProvider(), array(
    'swiftmailer.options' => array(
        'host'       => $file_config['mail.host'],
        'port'       => $file_config['mail.port'],
        'username'   => $file_config['mail.username'],
        'password'   => $file_config['mail.password'],
        'encryption' => $file_config['mail.encryption'],
        'auth_mode'  => $file_config['mail.auth_mode'],
    )
));

//Para nao guardar os emails na fila
$app['swiftmailer.use_spool'] = false;

$app->register(new Silex\Provider\SessionServiceProvider());
/*
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'login_path' => array(
            'pattern' => '^/login$',
            'anonymous' => true
        ),
        'default' => array(
            'pattern' => '^/.*$',
            'anonymous' => true,
            'form' => array(
                'login_path' => '/login',
                'check_path' => '/login_check',
            ),
            'logout' => array(
                'logout_path' => '/logout',
                'invalidate_session' => false
            ),
            'users' => function ($app) use ($em) {
                return new \n0va1s\QuadroMagico\Provider\UserProvider($em);
            },
        )
    ),
    'security.access_rules' => array(
        array('^/login$', 'IS_AUTHENTICATED_ANONYMOUSLY'),
        array('^/.+$', 'ROLE_ADMIN')
    )
));
*/
//Para tratar os erros comuns da aplicacao
/*
$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }
    switch ($code) {
        case 404:
            $message = 'Ops... essa página não existe';
            break;
        default:
            $message = 'Hum... estamos passando por problemas técnicos. Tente mais tarde.';
    }
    return new Response($message);
});
*/

//Menu
$app->get('/', function () use ($app) {
    return $app['twig']->render('inicio.twig');
})->bind('index');
$app->mount('/relatorio', new PNSL\Social\Controller\RelatorioController($em));
$app->mount('/atendimento', new PNSL\Social\Controller\AtendimentoController($em));
$app->mount('/frequencia', new PNSL\Social\Controller\FrequenciaController($em));
$app->mount('/acao', new PNSL\Social\Controller\AcaoController($em));
$app->mount('/voluntario', new PNSL\Social\Controller\VoluntarioController($em));
$app->mount('/usuario', new PNSL\Social\Controller\UsuarioController($em));
$app->mount('/configuracao', new PNSL\Social\Controller\TipoController($em));
$app->mount('/site', new PNSL\Social\Controller\SiteController($em));
