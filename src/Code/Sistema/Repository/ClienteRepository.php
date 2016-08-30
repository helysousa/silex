<?php
/**
 * Created by PhpStorm.
 * User: hely
 * Date: 29/08/16
 * Time: 10:53
 */


namespace Code\Sistema\Repository;

use Code\Sistema\Entity\Cliente as Cliente;
use IMapper;

class ClienteRepository
{

    private $clienteMapper;
    private $app;

    public function __construct($app, $clienteMapper)
    {
        $this->clienteMapper = $clienteMapper;
        $this->app = $app;
    }

    /**
     * Busca um cliente pelo Id
     * @param $clienteId
     * @return Cliente
     */
    public function getById ($clienteId)
   {

       $sql = 'select * from clientes where id = ?';

       $result = $this->app['db']->fetchAssoc($sql,[$clienteId]);

       return $this->clienteMapper->mapArrayToOneObject($result);
   }

    /**
     * Busca todos os clientes
     * @return array of Cliente
     */
    public function fetchAll()
    {
        $clientes = array();

        $sql = 'select * from clientes';

        $dados = $this->app['db']->fetchAll($sql,[]);

        $clientes = $this->clienteMapper->mapArrayToMultipleObjects($dados);

    	return $clientes;
    }

    // retorna a quantidade de clientes cadastrados
    /**
     * @param $app
     * @return mixed
     */
    public function count($app)
    {
        $sql = 'select count(*) as qtd from clientes';

        $qtd = $app['db']->fetchAssoc($sql,[])['qtd'];

        return $qtd;
    }

    /**
     * Grava um cliente no banco de dados
     * @param Cliente $cliente
     * @return array
     */
    public function insert(Cliente $cliente)
    {

        $this->app['db']->insert('clientes', $this->clienteMapper->mapObjectToArray($cliente));

    }


}