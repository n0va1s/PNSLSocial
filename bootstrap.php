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
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Symfony\Component\HttpFoundation\Response;


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

$app = new \Silex\Application();
$app['debug'] = $file_config['log.enabled'];

$app->register(
    new Silex\Provider\MonologServiceProvider(),
    array('monolog.logfile' => 'php://stderr')
);
//$app['monolog']->debug('Monolog configurado');
$app->register(
    new Silex\Provider\TwigServiceProvider(), 
    array(
        'twig.path' => __DIR__.'/web/view',
        //'twig.options' => array('cache' => __DIR__.'/web/cache'),
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

//Mail
$app->register(new Silex\Provider\SwiftmailerServiceProvider());
$app['swiftmailer.options'] = array(
    'host' => $file_config['mail.host'],
    'port' => $file_config['mail.port'],
    'username' => $file_config['mail.username'],
    'password' => $file_config['mail.password'],
    'encryption' => $file_config['mail.encryption'],
    'auth_mode' => $file_config['mail.auth_mode']
);
//Para nao guardar os emails na fila
$app['swiftmailer.use_spool'] = false;

//Quando se usa um formulario de login deve-se usar SessionServiceProvider
$app->register(new Silex\Provider\SessionServiceProvider());
//Seguranca
$app['security.salt'] = $file_config['sec.salt'];
$app->register(new Silex\Provider\SecurityServiceProvider());
$app['security.firewalls'] = array(
    'admin' => array(
        'pattern' => '^/admin',
        'form' => array('login_path' => '/login', 'check_path' => '/admin/login_check'),
        'logout' => array('logout_path' => '/admin/logout', 'invalidate_session' => true),
        'users' => function () use ($em) {
            return new UserProvider($em);
        },
    ),
);
$app->boot();

//Menu
$app->get(
    '/', function () use ($app) {
        return $app['twig']->render('inicio.twig');
    }
)->bind('index');

$app->get(
    '/login', function (Request $request) use ($app) {
        return $app['twig']->render(
            'login.twig', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
            )
        );
    }
)->bind('login');

//Rota padrao apos o login
$app->get(
    '/admin/menu', function () use ($app) {
        return $app['twig']->render(
            'areaRestrita.twig',
            array('user'=>$user), 
            new Response('Ok', 200)
        );
    }
)->bind('menu');

//Area restrita
$app->mount(
    '/admin/relatorio', 
    new PNSL\Social\Controller\RelatorioController($em)
);
$app->mount(
    '/admin/atendimento', 
    new PNSL\Social\Controller\AtendimentoController($em)
);
$app->mount(
    '/admin/frequencia', 
    new PNSL\Social\Controller\FrequenciaController($em)
);
$app->mount(
    '/admin/acao', 
    new PNSL\Social\Controller\AcaoController($em)
);
$app->mount(
    '/admin/voluntario', 
    new PNSL\Social\Controller\VoluntarioController($em)
);
$app->mount(
    '/admin/usuario', 
    new PNSL\Social\Controller\UsuarioController($em)
);
$app->mount(
    '/admin/configuracao', 
    new PNSL\Social\Controller\TipoController($em)
);

//Area publica
$app->mount(
    '/site', 
    new PNSL\Social\Controller\SiteController($em)
);