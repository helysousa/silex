<?php
/**
 * Created by PhpStorm.
 * User: Hely
 * Date: 3/16/2016
 * Time: 7:44 AM
 */

namespace Code\Sistema\Service;

use Code\Sistema\Entity\Produto;
use Code\Sistema\Mapper\ProdutoMapper;

class ProdutoService
{

    private $produto;
    private $produtoMapper;

    // reduzir acoplamento entre classes
    public function __construct(Produto $produto, ProdutoMapper $produtoMapper)
    {
        $this->produto = $produto;
        $this->produtoMapper = $produtoMapper;
    }

    public function getById($app, $produtoId)
    {
        return $this->produtoMapper->findById($app, $produtoId);
    }

    public function getByCodigo($app, $codigo)
    {
        return $this->produtoMapper->findByCodigo($app, $codigo);
    }

    public function insert (array $data)
    {
        $this->produto->setCodigo($data['codigo']);
        $this->produto->setDescricao($data['descricao']);
        $this->produto->setUnidade($data['unidade']);
        $this->produto->setPreco($data['preco']);

        return $this->produtoMapper->insert($this->produto);

    }

    public function fetchAll($app)
    {
        return $this->produtoMapper->fetchAll($app);
    }
}