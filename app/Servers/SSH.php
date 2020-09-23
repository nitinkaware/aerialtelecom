<?php

namespace App\Servers;

class SSH
{
    protected $ip = null;

    protected $port = null;

    protected $username = null;

    protected $password = null;

    protected $connection = null;

    public function __construct($ip, $port, $username, $password)
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;

        $this->connect();
    }

    public function connect()
    {
        $this->connection = ssh2_connect($this->ip, $this->port);

        ssh2_auth_password($this->connection, $this->username, $this->password);

        return $this;
    }

    public function run(string $command)
    {
        $stream = ssh2_exec($this->connection, $command);

        stream_set_blocking($stream, true);

        return stream_get_contents(ssh2_fetch_stream($stream, SSH2_STREAM_STDIO));
    }

    public function diskUsages()
    {
        return $this->run('df -h');
    }

    public function files($path)
    {
        return $this->run("cd $path && ls -la");
    }

    public function restartNginx($path)
    {
        return $this->run('systemctl status nginx');
    }
}
