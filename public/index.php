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
use Code\Sistema\Entity\Produto;
use Code\Sistema\Mapper\ProdutoMapper;
use Code\Sistema\Service\ProdutoService;

require_once __DIR__ . '/../bootstrap.php';

// ====================================
// dados para teste da rota /cliente
// metodologia adotada: KISS
// ====================================
$dados = array('nome' => 'Mariana Silva', 'email' => 'mariana@jmail.com');
// =====================================

// ====================================
// dados para teste da rota /produto
// metodologia adotada: KISS
// ====================================
$dadosDoProduto = array('codigo' => '00001-9', 'descricao' => 'Margarina em po sem gluten', 'nome' => 'Margarina sem gluten', 'preco' => 3.99);
// =====================================



$response = new Response();

$app['clienteService'] = function () {

    return new ClienteService(new Cliente(), new clienteMapper());
};

$app['produtoService'] = function () {
    return new ProdutoService(new Produto(), new ProdutoMapper());
};

// home
$app->get('/', function () use ($app) {
    return $app->redirect('/produtos');
});

// listar clientes
$app->get('/clientes', function () use ($app, $response, $dados) {

    return $app->json($app['clienteService']->insert($dados));
});

// listar produtos
$app->get('/produtos', function () use ($app, $response, $dadosDoProduto)
{
    return $app->json($app['produtoService']->insert($dadosDoProduto));
});

$app->run();