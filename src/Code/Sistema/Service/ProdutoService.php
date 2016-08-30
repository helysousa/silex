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
use Code\Sistema\Repository\ProdutoRepository;

class ProdutoService
{

    private $produto;
    private $produtoMapper;
    private $produtoRepository;
    private $app;

    // reduzir acoplamento entre classes
    public function __construct($app, Produto $produto, ProdutoMapper $produtoMapper, ProdutoRepository $produtoRepository)
    {
        $this->app = $app;
        $this->produto = $produto;
        $this->produtoMapper = $produtoMapper;
        $this->produtoRepository = $produtoRepository;
    }

    public function getById($produtoId)
    {
        return $this->produtoRepository->findById($produtoId);
    }

    public function getByCodigo($codigo)
    {
        return $this->produtoRepository->findByCodigo($codigo);
    }

    public function insert (array $data)
    {
        $this->produto->setCodigo($data['codigo']);
        $this->produto->setDescricao($data['descricao']);
        $this->produto->setUnidade($data['unidade']);
        $this->produto->setPreco($data['preco']);

        return $this->produtoRepository->insert($this->produto);

    }

    public function fetchAll()
    {
        return $this->produtoRepository->fetchAll();
    }

    public function count()
    {
        return $this->produtoRepository->count();
    }
}