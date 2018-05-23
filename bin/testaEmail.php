<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../bootstrap.php';

$app->post('/mensagem', function () use ($app) {
    $message = \Swift_Message::newInstance()
        ->setSubject('Assunto')
        ->setFrom(array('jp.pessoal@gmail.com'))
        ->setTo(array('jp.trabalho@gmail.com'))
        ->setBody('Envio de email do pelo site brinquecoin.com');

    $app['mailer']->send($message);

    return new Response('Thank you for your feedback!', 201);
});
