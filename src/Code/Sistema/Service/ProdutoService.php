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

    public function __construct(Produto $produto, ProdutoMapper $produtoMapper)
    {
        $this->produto = $produto;
        $this->produtoMapper = $produtoMapper;
    }

    public function insert (array $data)
    {
        $this->produto->setCodigo($data['codigo']);
        $this->produto->setDescricao($data['descricao']);
        $this->produto->setNome($data['nome']);
        $this->produto->setPreco($data['preco']);

        return $this->produtoMapper->insert($this->produto);

    }
}