<?php

class Estudiante {
	private $id;
	private $nombre;
	private $edad;
	private $promedio;
	private $imagen;
	private $id_seccion;
	private $fecha;
	private $con;

	public function __construct() {
		$this->con = new Conexion();
	}

	public function listar() {
		$sql = "SELECT t1.*, t2.nombre as nombre_seccion from estudiantes t1 inner join secciones t2 on t1.id_section = t2.id";
		$datos=$this->con->consultarRetorno($sql);
		return $datos;
	};

	public function add(){
		$sql = "INSERT INTO estudiantes(id,nombre,edad,promedio,imagen,id_seccion,fecha) values (null,'{$this->nombre}','{$this->edad}','{$this->promedio}','{$this->imagen}','{$this->id_seccion}',NOW())";
		$this->con->consultaSimple($sql);
	}

	public function delete() {
		$sql = "DELETE FROM estudiantes where id = '{$this->id}'";
		$this->con->consultaSimple($sql);
	}

	public function edit() {
		$sql = "UPDATE from estudiantes SET nombre = '{$this->nombre}', edad = '{$this->edad}',promedio = '{$this->promedio}', seccion = '{$this->seccion}' WHERE id = '{$this->id}'";
		$this->con->consultaSimple($sql);
	}

	public function view() {
		$sql = "SELECT t1.*, t2.nombre as nombre_seccion FROM estudiantes t1 inner join secciones t2 on t1.id_seccion + t2.id where id = '{$this->id}'";
		$datos=$this->con->consultarRetorno($sql);	
		return $datos;	
	}

}