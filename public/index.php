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
$dadosDoCliente = array('id' => 1, 'nome' => 'Mariana Silva', 'email' => 'mariana@jmail.com');
// =====================================

// ====================================
// dados para teste da rota /produto
// metodologia adotada: KISS
// ====================================
$dadosDoProduto = array('codigo' => '00001-9', 'descricao' => 'Margarina em po sem gluten', 'unidade' => 'UN', 'preco' => 3.99);
// =====================================



$response = new Response();


// Service container

$app['clienteService'] = function () {

    return new ClienteService(new Cliente(), new clienteMapper());
};

$app['produtoService'] = function () {
    return new ProdutoService(new Produto(), new ProdutoMapper());
};


// home
$app->get('/', function () use ($app) {

	$sql = 'select count(*) qtd from clientes';
	$result = $app['db']->fetchAssoc($sql,[]);

	$qtdClientes = $result['qtd'];

	$sql = 'select count(*) qtd from produtos';
	$result = $app['db']->fetchAssoc($sql,[]);

	$qtdProdutos = $result['qtd'];

    return $app['twig']->render('index.twig',['qtdClientes' =>	$qtdClientes, 'qtdProdutos' => $qtdProdutos]);

})->bind("index");

// ============================
// CLIENTES
// ============================

// listar clientes

$app->get('/clientes', function () use ($app) {

	$clientes = $app['clienteService']->fetchAll();

	return $app['twig']->render('clientes.twig',['clientes' =>$clientes]);

})->bind("clientes");

// Inserir clientes

$app->get('/cliente', function () use ($app, $response, $dadosDoCliente) {

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

$app->get('/produto', function () use ($app, $response, $dadosDoProduto)
{
    return $app->json($app['produtoService']->insert($dadosDoProduto));
})->bind("IncluirProduto");

// Buscar um produto pelo código

$app->get('/produto/{codigo}', function ($codigo) use ($app) {

	$produto = $app['produtoService']->getByCodigo($app,$codigo);

	return $app['twig']->render('produto.show.twig',['produto' => $produto]);
})->bind("produto.show");

$app->run();