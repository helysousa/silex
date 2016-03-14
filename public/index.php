<?php
/**
 * Created by PhpStorm.
 * User: Hely
 * Date: 3/13/2016
 * Time: 11:20 PM
 */

use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/../bootstrap.php';

// ====================================
// dados para teste da rota /cliente
// metodologia adotada: KISS
// ====================================
$dados = array(['nome'=>'Mariana Silva', 'email'=>'mariana@jmail.com','cpfcnpj'=>'000.000.001.01'],
    ['nome'=>'José Soares', 'email'=>'jsoares@haltmail.com','cpfcnpj'=>'000.000.002.02'],
    ['nome'=>'Juliana Marques', 'email'=>'juliana.marques@empresa.com.br','cpfcnpj'=>'000.000.003.03'],
    ['nome'=>'Casa Popular ME', 'email'=>'contato@casapopular.com.br','cpfcnpj'=>'00.000.001/0001-01'],
);
// =====================================

$response = new Response();

$app->get('/', function() use ($app) {
    return $app->redirect('/clientes');
});

$app->get('/clientes', function () use ($app, $response, $dados) {

    return $app->json($dados);
});

$app->run();