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
    public function insert(Produto $produto)
    {
        return array(
            'codigo' => $produto->getCodigo(), 'descricao'=>$produto->getDescricao(),
            'unidade' => $produto->getUnidade(), 'preco' => $produto->getPreco()
        );
    }

    public function findById($app, $produtoId)
    {
        $sql = 'select * from produtos where id = ?';
        $dados = $app['db']->fetchAssoc($sql,[$produtoId]);

        return $dados;
    }

    public function findBycodigo($app, $codigo)
    {
        $sql = 'select * from produtos where codigo = ?';
        $dados = $app['db']->fetchAssoc($sql,[$codigo]);

        return $dados;
    }

    public function fetchAll($app) {

	   	$sql = 'select * from produtos';
        $dados= $app['db']->fetchAll($sql,[]);

    	return $dados;
    }
}