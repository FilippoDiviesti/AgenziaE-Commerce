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


    public function registrazione(string $email, string $password){
        if(isset($this->connection)){
        $esecuzioneQuery = $this->connection->prepare("INSERT INTO `utenti`(`email`, `password`, `ruolo`) VALUES (:email, :password, 1)");
        return $esecuzioneQuery->execute([':email' => $email, ':password' => $password]);
        }
        else
            echo 'connesione scaduta';
    }
}
?>
