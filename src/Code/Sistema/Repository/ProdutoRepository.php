<?php
/**
 * Created by PhpStorm.
 * User: hely
 * Date: 30/08/16
 * Time: 10:58
 */

namespace Code\Sistema\Repository;

class ProdutoRepository
{

    private $produtoMapper;
    private $app;

    // busca produto pelo Id

    public function __construct($app, $produtoMapper)
    {
        $this->produtoMapper = $produtoMapper;
        $this->app = $app;
    }
    // insere novo produto
    public function insert(Produto $produto)
    {
        return array(
            'codigo' => $produto->getCodigo(),
            'descricao'=>$produto->getDescricao(),
            'unidade' => $produto->getUnidade(),
            'preco' => $produto->getPreco()
        );
    }
    public function findById($produtoId)
    {
        $sql = 'select * from produtos where id = ?';
        $dados = $this->app['db']->fetchAssoc($sql,[$produtoId]);

        return $dados;
    }

    // busca produto pelo código
    public function findBycodigo($codigo)
    {
        $sql = 'select * from produtos where codigo = ?';
        $dados = $this->app['db']->fetchAssoc($sql,[$codigo]);

        return $dados;
    }

    // retorna todos os produtos cadastrados
    public function fetchAll() {

        $sql = 'select * from produtos';
        $dados= $this->app['db']->fetchAll($sql,[]);

        return $dados;
    }

    // retorna a quantidade de produtos cadastrados
    public function count()
    {
        $sql = 'select count(*) as qtd from produtos';
        $qtd = $this->app['db']->fetchAssoc($sql,[])['qtd'];

        return $qtd;
    }
}