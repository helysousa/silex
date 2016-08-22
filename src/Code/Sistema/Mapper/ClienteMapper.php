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

    public function fetchAll()
    {
        $dados[0]['id'] = 0;
    	$dados[0]['nome'] = 'Cliente XPTO';
    	$dados[0]['email'] = 'clientexpto@gmail.com';

        $dados[1]['id'] = 1;
    	$dados[1]['nome'] = 'Cliente Y';
    	$dados[1]['email'] = 'clientey@gmail.com';

    	return $dados;
    }

    public function getById(integer $Id) {

        $clientes = $this->fetchAll();

        return $clientes[$id];
    }
}
