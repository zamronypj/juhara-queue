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
            ...
            "Juhara\Queue" : "^0.1"
            ...
        }

    }

```

Usage
-----

`producer.php`

```php

    <?php

    use Juhara\Queue\KeyValueData;
    use Juhara\Queue\Db\MySQLBackedQueue;
    use Juhara\Queue\Db\DbConfig;

    $dbConfig = new DbConfig('localhost', 'yourusename', 'youspassword', 'yourdb', 'yourtable');
    $queue = new MySQLBackedQueue($dbConfig);
    $queue->initialize();

    $data = new KeyValueData();
    $data->set('yourownData', 'hello world');
    $queue->push($data);

```

`consumer.php`

```php

    <?php

    use Juhara\Queue\Db\MySQLBackedQueue;
    use Juhara\Queue\Db\DbConfig;

    $dbConfig = new DbConfig('localhost', 'yourusename', 'youspassword', 'yourdb', 'yourtable');
    $queue = new MySQLBackedQueue($dbConfig);

    while ($data = $queue->pop()) {
        //do something with queued data
    }

```

Have fun