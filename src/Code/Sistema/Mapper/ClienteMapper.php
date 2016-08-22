<?php
/**
 * Created by PhpStorm.
 * User: Hely
 * Date: 3/14/2016
 * Time: 6:58 AM
 */

namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Cliente;

class ClienteMapper
{
    public function insert(Cliente $cliente)
    {
        return array(
           'id'=>$cliente->getId(),  'nome' => $cliente->getNome(), 'email'=>$cliente->getEmail()
        );
    }

    public function fetchAll($app)
    {
        
        $sql = 'select * from clientes';

        $dados = $app['db']->fetchAll($sql,[]);

    	return $dados;
    }

    public function getById(integer $Id) {

        $clientes = $this->fetchAll();

        return $clientes[$id];
    }
    // retorna a quantidade de clientes cadastrados
    public function count($app)
    {
        $sql = 'select count(*) as qtd from clientes';
        $qtd = $app['db']->fetchAssoc($sql,[])['qtd'];

        return $qtd;
    }
}
