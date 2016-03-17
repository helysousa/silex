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
            'nome' => $produto->getNome(), 'preco' => $produto->getPreco()
        );
    }
}