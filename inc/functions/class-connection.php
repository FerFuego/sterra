<?php
/**
 * Connection class
 * crea la conexion a la base de datos con reutilización de conexión por petición
 */
class Connection {

    public $conn;
    private static $sharedConn = null;
    
	function __construct() {

        if (self::$sharedConn !== null && self::$sharedConn instanceof mysqli && @self::$sharedConn->ping()) {
            $this->conn = self::$sharedConn;
            return;
        }

		$con['server'] = getenv('SERVER');
		$con['base']   = getenv('BASE');
		$con['user']   = getenv('USER');
		$con['pass']   = getenv('PASS');

		$result = @new mysqli($con['server'], $con['user'], $con['pass'], $con['base']);
        
        if ($result && !$result->connect_errno) {	
			$result->query("SET NAMES 'utf8'");		
			$this->conn = $result;
            self::$sharedConn = $result;
		}
	}

    // devuelve la conexion
    function getConnection() {
		return $this->conn;
    }
    
    // cierra la conexion
    function Close() {
		// Se mantiene abierta para reutilizar durante la petición HTTP
	}	
}
?>