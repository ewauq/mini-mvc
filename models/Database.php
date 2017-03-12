<?php

namespace App\Models;

use App\Core\Debugger;

// http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers
class Database
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $port;
    private $timeout;
    private $dbh;

    public function __construct($conf)
    {
        $this->host     = $conf['host'];
        $this->database = $conf['database'];
        $this->user     = $conf['user'];
        $this->password = $conf['password'];
        $this->port     = $conf['port'];
        $this->timeout  = $conf['timeout'];
    }

    public function query($query, array $val = array())
    {
        Debugger::send(array(
            "message"      => $query,
            "type"         => Debugger::PDO_QUERY
        ));

        try
        {
            $dsn = 'mysql:host='       . $this->host .
                   ';dbname='          . $this->database .
                   ';port='            . $this->port .
                   ';connect_timeout=' . $this->timeout;

            $this->dbh = new \PDO($dsn, $this->user, $this->password);
            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $this->dbh->exec('SET NAMES utf8');

            $sth = $this->dbh->prepare($query, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $sth->execute($val);

            $results = $sth->fetchAll(\PDO::FETCH_ASSOC);

            return $results;
        }

        catch (\PDOException $e)
        {
            Debugger::send(array(
                "message"      => $e->getMessage(),
                "type"         => Debugger::PDO_EXCEPTION
            ));
        }

        catch(\Exception $e)
        {
            Debugger::send(array(
                "message"      => $e->getMessage(),
                "type"         => Debugger::EXCEPTION,
                "__CLASS__"    => __CLASS__,
                "__FUNCTION__" => __FUNCTION__
            ));
        }
    }

}

?>
