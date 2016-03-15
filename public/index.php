<?php
/**
 * Created by PhpStorm.
 * User: Hely
 * Date: 3/13/2016
 * Time: 11:20 PM
 */

use Symfony\Component\HttpFoundation\Response;
use Code\Sistema\Service\ClienteService;
use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;

require_once __DIR__ . '/../bootstrap.php';

// ====================================
// dados para teste da rota /cliente
// metodologia adotada: KISS
// ====================================
$dados = array('nome' => 'Mariana Silva', 'email' => 'mariana@jmail.com');
// =====================================

$response = new Response();

$app['clienteService'] = function () {

    return new ClienteService(new Cliente(), new clienteMapper());
};

$app->get('/', function () use ($app) {
    return $app->redirect('/clientes');
});

$app->get('/clientes', function () use ($app, $response, $dados) {

    return $app->json($app['clienteService']->insert($dados));
});

$app->run();