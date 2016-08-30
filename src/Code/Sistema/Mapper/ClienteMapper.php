<?php
/**
 * Created by PhpStorm.
 * User: Hely
 * Date: 3/14/2016
 * Time: 6:58 AM
 */


namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Cliente as Cliente;
use Code\Sistema\Interfaces\IMapper as IMapper;

class ClienteMapper implements IMapper
{

    // mapeamento relacional => objeto
    public function mapArrayToOneObject (array $row)
    {
        $cliente = new Cliente();

        $cliente->setId($row['id']);
        $cliente->setNome($row['nome']);
        $cliente->setEmail($row['email']);

        return $cliente;
    }

    // mapeamento array relacional => array objetos
    /**
     * @param array $lista
     * @return array
     */
    public function mapArrayToMultipleObjects (array $lista)
    {
        $clientes = array();

        foreach ($lista as $row)
        {
            $clientes[] = $this->mapArrayToOneObject($row);
        }

        return $clientes;
    }

    /**
     * mapeamento um cliente para um array
     * @param $instance of Cliente
     * @return array
     */
    public function mapObjectToArray($instance)
    {
        $result = array(
                        'id' => $instance->getId(),
                        'nome' => $instance->getNome(),
                        'email' => $instance->getEmail()
        );

        return $result;
    }
}
