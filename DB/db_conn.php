<?php

require 'config.php';

class Essecuelle{

    private $connection;
    private $accedi;

    public function __construct()
    {
        $this->accedi = new Credenziali();
        $this->connection = $this->connessione();
    }

    private function connessione(){
        $mysqlconn = "mysql:host=" . $this->accedi->gethostname() . ";dbname=" . $this->accedi->getDatabase() . ";charset=UTF8";
        try {
        $pdo = new PDO($mysqlconn, $this->accedi->getUsername(), $this->accedi->getPassword());
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        echo $e->getMessage();
        }
        return $pdo;
    }


    public function eseguiQuery(string $query){
        if(isset($this->connection))
        {
            try{
                $esecuzioneQuery = $this->connection->prepare(query: $query)->execute();
                $risultato = $esecuzioneQuery->fetch(PDO::FETCH_ASSOC);
                return $risultato;
            }catch (Exception $e){
                return 0;
            }

        }
        else
            echo 'connesione scaduta';
    }


    public function eseguiQueryNoRis(string $query, $params){
        if(isset($this->connection)){
            try{
                $this->connection->prepare(query: $query)->execute($params);
                return 1;
            }catch (Exception $e){
                return 0;
            }
        }
        else
            echo 'connesione scaduta';
    }
}
?>
