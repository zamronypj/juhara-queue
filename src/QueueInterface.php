<?php

namespace Juhara\Queue;

use Juhara\Queue\QueueDataInterface as QueueData;

interface QueueInterface {
    /**
     * Do something to initialize queue
     */
    public function initialize();

    /**
     * Do something here to finalize queue
     * for example when detroying queue
     */
    public function finalize();


    /**
     * Push data to queue and return id of
     * inserted queue item
     * @param QueueDataInterface $data
     * @return string
     */
    public function push(QueueData $data);

    /**
     * pop data from queue and return it
     * @return QueueDataInterface
     */
    public function pop();
}