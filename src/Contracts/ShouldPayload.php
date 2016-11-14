<?php

namespace Cxbyte\ZmqDriver\Contracts;

/**
 * Interface ShouldPayload
 *
 * @category Laravel
 *
 * @package Cxbyte\ZmqDriver
 *
 * @author Andrey Petrov <cxbyte@mail.ru>
 *
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 * @link https://github.com/cxbyte/zmqdriver
 */
interface ShouldPayload
{
    /**
     * Payload data
     *
     * @return mixed payload data
     */
    public function broadcastWith();
}