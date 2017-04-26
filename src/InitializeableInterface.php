<?php

namespace Juhara\Queue;

/**
 * interface for object that should be initialized/finalized
 */
interface InitializableInterface {
    /**
     * Do something to initialize object
     */
    public function initialize();

    /**
     * Do something here to finalize object
     * for example when detroying object
     */
    public function finalize();

}