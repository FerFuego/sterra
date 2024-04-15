<?php
/**
 * Configuracion class
 * crea la conexion a la base de datos
 */
class Configuracion {

    public $id;
    public $logo;
    public $banner;
    public $telefono;
    public $email;
    public $direccion;
    public $atencion;
    public $whatsapp;
    public $facebook;
    public $instagram;
    public $twitter;
    public $aumento_1;
    public $minimo;
    public $descuentos;
    public $show_prices;
    protected $obj;

    
	function __construct() {	

		$this->obj = new sQuery();
        $result = $this->obj->executeQuery("SELECT * FROM configuracion WHERE id='1'");
        $row = mysqli_fetch_assoc($result);

        $this->id = $row['id'];
        $this->logo = $row['logo'];
        $this->banner = $row['banner'];
        $this->telefono = $row['telefono'];
        $this->email = $row['email'];
        $this->direccion = $row['direccion'];
        $this->atencion = $row['atencion'];
        $this->whatsapp = $row['whatsapp'];
        $this->facebook = $row['facebook'];
        $this->instagram = $row['instagram'];
        $this->twitter = $row['twitter'];
        $this->aumento_1 = $row['aumento_1'];
        $this->minimo = $row['minimo'];
        $this->descuentos = $row['descuentos'];
        $this->show_prices = $row['show_prices'];
	}

    public function update() {
        $this->obj = new sQuery();
        $this->obj->executeQuery("UPDATE configuracion SET id = '$this->id', logo = '$this->logo', banner = '$this->banner', telefono = '$this->telefono', email = '$this->email', direccion = '$this->direccion', atencion = '$this->atencion', whatsapp = '$this->whatsapp', facebook = '$this->facebook', instagram = '$this->instagram', twitter = '$this->twitter', aumento_1 = '$this->aumento_1', minimo = '$this->minimo', descuentos = '$this->descuentos', show_prices = $this->show_prices  WHERE (id = '1')");
    }

    public function getLogo(){
        return $this->logo;
    }

    public function showPrices(){
        return $this->show_prices;
    }

    public function getAumento(){
        return $this->aumento_1;
    }

    public function getMinimo(){
        return $this->minimo;
    }

    public function getDescuentos(){
        return $this->descuentos;
    }
    
    public function closeConnection(){
        @$this->obj->Clean();
		$this->obj->Close();
	}	
}
?>