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
    use Code\Sistema\Repository\ClienteRepository;

    class ClienteService
    {

        private $cliente;
        private $clienteMapper;
        private $clienteRepository;
        private $app;

        // reduzir acoplamento entre classes - injeção de dependências
        public function __construct($app, Cliente $cliente, ClienteMapper $clienteMapper, ClienteRepository $clienteRepository)
        {
            $this->app = $app;
            $this->cliente = $cliente;
            $this->clienteMapper = $clienteMapper;
            $this->clienteRepository = $clienteRepository;
        }

        // insere um novo cliente
        public function insert(array $data)
        {
            $this->cliente->setId($data['id']);
            $this->cliente->setNome($data['nome']);
            $this->cliente->setEmail($data['email']);

            $result = $this->clienteRepository->insert($this->cliente);

            return $result;
        }

        // busca um cliente com id específico
        public function getById(integer $Id)
        {
            return $this->clienteRepository->getById($this->app, $this->clienteMapper);

        }


        // retorna todos os clientes
        public function fetchAll($app) {

            return $this->clienteRepository->fetchAll($app);

        }

        public function count($app) 
        {
            return $this->clienteRepository->count($app);
        }
    }
}