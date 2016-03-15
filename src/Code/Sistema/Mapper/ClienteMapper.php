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
            'nome' => $cliente->getNome(), 'email'=>$cliente->getEmail()
        );
    }
}