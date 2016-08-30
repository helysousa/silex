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
use Code\Sistema\Repository\ClienteRepository;
use Code\Sistema\Entity\Produto;
use Code\Sistema\Mapper\ProdutoMapper;
use Code\Sistema\Service\ProdutoService;

require_once __DIR__ . '/../bootstrap.php';

$response = new Response();

// Service container

$app['clienteService'] = function ($app) {

    $clienteMapper = new ClienteMapper();

    return new ClienteService($app, new Cliente(), $clienteMapper, new ClienteRepository($app, $clienteMapper));
};

$app['produtoService'] = function ($app) {

    $produtoMapper = new ProdutoMapper();

    return new ProdutoService($app, new Produto(), $produtoMapper, new \Code\Sistema\Repository\ProdutoRepository($app, $produtoMapper));
};

// home
$app->get('/', function () use ($app) {

    $qtdClientes = $app['clienteService']->count($app);
    $qtdProdutos = $app['produtoService']->count($app);;

    return $app['twig']->render('index.twig',['qtdClientes' =>	$qtdClientes, 'qtdProdutos' => $qtdProdutos]);

})->bind("index");

// ============================
// CLIENTES
// ============================

// listar clientes

$app->get('/clientes', function () use ($app) {

    $clientes = $app['clienteService']->fetchAll($app);

    return $app['twig']->render('clientes.twig',['clientes' =>$clientes]);

})->bind("clientes");

// Inserir clientes

$app->get('/cliente', function ($dadosDoCliente) use ($app, $response) {

	$cliente = $app['clienteService']->insert($dadosDoCliente);

	return $app['twig']->render('cliente.new.twig',['cliente' =>$cliente]);

})->bind("IncluirClienteGet");

$app->post('/cliente', function () use ($app, $response) {
	// gravar dados enviados

})->bind("IncluirClientePost");


// ============================
// PRODUTOS
// ============================


// listar produtos

$app->get('/produtos', function () use ($app) {

	$produtos = $app['produtoService']->fetchAll($app);

	return $app['twig']->render('produtos.twig',['produtos' =>$produtos]);
})->bind("produtos");

// Inserir produto

$app->get('/produto', function ($dadosDoProduto) use ($app, $response)
{
    return $app->json($app['produtoService']->insert($dadosDoProduto));
})->bind("IncluirProduto");

// Buscar um produto pelo código

$app->get('/produto/{codigo}', function ($codigo) use ($app) {

	$produto = $app['produtoService']->getByCodigo($codigo);

	return $app['twig']->render('produto.show.twig',['produto' => $produto]);
})->bind("produto.show");

$app->run();