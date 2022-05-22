<?php
enum ruolo: int{
    case rappresentante = 1;
    case capoarea = 2;
    case nazionale = 3;
}
require 'config.php';
class Essecuelle{
    private $connection;
    private $accedi;
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
    public function __construct()
    {
        $this->accedi = new Credenziali();
        $this->connection = $this->connessione();
    }
    public function login(string $email, string $password)
    {
        if(isset($this->connection))
        {
            $esecuzioneQuery = $this->connection->prepare('SELECT ruolo FROM utenti WHERE email = :email AND password = :password');
            $esecuzioneQuery->execute([':email' => $email, ':password' => $password]);
            if($esecuzioneQuery->rowCount() == 0){
                return 0;
            }
            else{
                $risultato = $esecuzioneQuery->fetch(PDO::FETCH_ASSOC);
			    return $risultato['ruolo'];
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
