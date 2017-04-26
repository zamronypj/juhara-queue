<?php

namespace Juhara\Queue;

use Juhara\Queue\QueueInterface as Queue;

abstract class BaseQueue implements Queue {
    /**
     * Push data to queue
     * @param QueueDataInterface $data
     */
    abstract public function push(QueueData $data);

    /**
     * pop data from queue and return it
     * @return QueueDataInterface
     */
    abstract public function pop();
}