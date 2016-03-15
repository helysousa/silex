<?php
/**
 * Created by PhpStorm.
 * User: Hely
 * Date: 3/14/2016
 * Time: 6:53 AM
 */

namespace Code\Sistema\Entity {


    class Cliente
    {
        private $nome;
        private $email;

        /**
         * @return mixed
         */
        public function getNome()
        {
            return $this->nome;
        }

        /**
         * @param mixed $nome
         */
        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

    }
}