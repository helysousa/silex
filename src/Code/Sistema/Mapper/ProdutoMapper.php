<?php
/**
 * Created by PhpStorm.
 * User: Hely
 * Date: 3/16/2016
 * Time: 7:37 AM
 */

namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Produto;

class ProdutoMapper
{
    // insere novo produto
    public function insert(Produto $produto)
    {
        return array(
            'codigo' => $produto->getCodigo(), 'descricao'=>$produto->getDescricao(),
            'unidade' => $produto->getUnidade(), 'preco' => $produto->getPreco()
        );
    }

    // busca produto pelo Id
    public function findById($app, $produtoId)
    {
        $sql = 'select * from produtos where id = ?';
        $dados = $app['db']->fetchAssoc($sql,[$produtoId]);

        return $dados;
    }

    // busca produto pelo código
    public function findBycodigo($app, $codigo)
    {
        $sql = 'select * from produtos where codigo = ?';
        $dados = $app['db']->fetchAssoc($sql,[$codigo]);

        return $dados;
    }

    // retorna todos os produtos cadastrados
    public function fetchAll($app) {

	   	$sql = 'select * from produtos';
        $dados= $app['db']->fetchAll($sql,[]);

    	return $dados;
    }

    // retorna a quantidade de produtos cadastrados
    public function count($app)
    {
        $sql = 'select count(*) as qtd from produtos';
        $qtd = $app['db']->fetchAssoc($sql,[])['qtd'];

        return $qtd;
    }
}