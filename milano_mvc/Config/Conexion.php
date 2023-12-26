<?php
class Conexion {
    private $conect;
    
    public function __construct()
    {
        $host = 'magallanes.inf.unap.cl';
        $port = '5432';
        $dbname = 'brojas';
        $user = 'brojas';
        $password = 'Gt95x5cDq1';

        $pdo = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";
        try {
            $this->conect = new PDO($pdo);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }

    public function conect()
    {
        return $this->conect;
    }

    public function comprobarConexion()
    {
        try {
            if ($this->conect !== null) {
                $stmt = $this->conect->query("SELECT 1");
                $stmt->fetch(PDO::FETCH_ASSOC);
                echo "La conexión a PostgreSQL fue exitosa.";
            } else {
                echo "La conexión no está disponible.";
            }
        } catch (PDOException $e) {
            echo "Error al comprobar la conexión: " . $e->getMessage();
        }
    }
}

$conexion = new Conexion();
?>
