<?php


namespace Model;

use PDO;

class DBConnection
{
    public string $dsn;
    public string $user;
    public string $password;

    public function __construct(string $dsn,
                                string $user,
                                string $password)
    {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
    }

    public function connect(): PDO
    {
        return new PDO($this->dsn,$this->user,$this->password);
    }
}