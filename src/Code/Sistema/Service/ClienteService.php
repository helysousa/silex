<?php
/**
 * Created by PhpStorm.
 * User: Hely
 * Date: 3/14/2016
 * Time: 7:13 AM
 */

namespace Code\Sistema\Service {

    use Code\Sistema\Entity\Cliente;
    use Code\Sistema\Mapper\ClienteMapper;

    class ClienteService
    {

        private $cliente;
        private $clienteMapper;

        // reduzir acoplamento entre classes
        public function __construct(Cliente $cliente, ClienteMapper $clienteMapper)
        {
            $this->cliente = $cliente;
            $this->clienteMapper = $clienteMapper;
        }

        // insere um novo cliente
        public function insert(array $data)
        {
            $this->cliente->setId($data['id']);
            $this->cliente->setNome($data['nome']);
            $this->cliente->setEmail($data['email']);

            $result = $this->clienteMapper->insert($this->cliente);

            return $result;
        }

        // busca um cliente com id específico
        public function getById(integer $Id) {

        }


        // retorna todos os clientes
        public function fetchAll() {

            return $this->clienteMapper->fetchAll();

        }
    }
}