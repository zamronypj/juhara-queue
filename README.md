juhara-queue
------------

PHP library for simple queue management

Requirement
-----------


Installation
------------

Using Composer

Add entry to `composer.json`

```json

    {
        "require" : {
            "Juhara/Queue" : "^0.1"
        }

    }

```

Usage
-----

`producer.php` adds long-running task to background queue.

```php

    <?php
    namespace App\Producer;

    use Juhara\Queue\KeyValueData;
    use Juhara\Queue\Db\MySQLBackedQueue;
    use Juhara\Queue\Db\DbConfig;

    $dbConfig = new DbConfig('localhost', 'yourusename', 'yourpassword', 'yourdb', 'yourtable');
    $queue = new MySQLBackedQueue($dbConfig);
    $queue->initialize();

    $data = new KeyValueData();
    $data->set('yourownData', 'hello world');
    $queue->push($data);

```

`consumer.php` script execute endlessly in background and retrieve data from queue if available.

```php

    <?php
    namespace App\Consumer;

    use Juhara\Queue\Db\MySQLBackedQueue;
    use Juhara\Queue\Db\DbConfig;

    $dbConfig = new DbConfig('localhost', 'yourusename', 'yourpassword', 'yourdb', 'yourtable');
    $queue = new MySQLBackedQueue($dbConfig);
    $queue->initialize();

    while (true) {
        $data = $queue->pop();
        if ($data) {
            //do something with queued data
        }
    }

```

Have fun