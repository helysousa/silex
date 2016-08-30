<?php
/**
 * Created by PhpStorm.
 * User: Hely
 * Date: 3/16/2016
 * Time: 7:37 AM
 */

namespace Code\Sistema\Mapper;

use Code\Sistema\Interfaces\IMapper;

class ProdutoMapper implements IMapper
{
    /**
     * mapeamento de um array para um array de produtos
     * @param array $lista
     * @return array of produtos
     */
    public function mapArrayToMultipleObjects(array $lista)
    {
        $produtos = array();

        foreach ($lista as $row)
        {
            $produtos[] = $this->mapArrayToOneObject($row);
        }

        return $produtos;
    }

    /**
     * mapeamento de um array para um produto
     * @param array $row
     * @return instance of produto
     */
    public function mapArrayToOneObject(array $row)
    {
        $produto = new Produto();

        $produto->setCodigo($row['codigo']);
        $produto->setDescricao($row['descricao']);
        $produto->setPreco($row['preco']);
        $produto->setUnidade($row['unidade']);

        return $produto;
    }

    /**
     * mapeamento de um proeuto para um array
     * @param $instance of produto
     * @return array
     */
    public function mapObjectToArray($instance)
    {
        $result = array(
            'codigo' => $instance->getCodigo(),
            'descricao' => $instance->getDescricao(),
            'preco' => $instance->getPreco(),
            'unidade' => $instance->getUnidade()
        );

        return $result;
    }

}