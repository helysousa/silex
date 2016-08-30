<?php
/**
 * Created by PhpStorm.
 * User: hely
 * Date: 30/08/16
 * Time: 07:26
 */
namespace Code\Sistema\Interfaces;

interface IMapper
{
    public function mapArrayToMultipleObjects (array $lista);

    public function mapArrayToOneObject (array $row);

    public function mapObjectToArray ($instance);
}