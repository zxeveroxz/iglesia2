<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registros_model extends CI_Model
{
    public $ID_registros;
    public $CODIGO_registros;
    public $PATERNO_registros;
    public $MATERNO_registros;
    public $NOMBRES_registros;
    public $DNI_registros;
    public $ZONA_registros;
    public $RESIDENCIA_registros;
    public $TIPO_ASIS_registros;
    public $TIPO_DIEZMO_registros;
    public $CARGO_registros;
    public $SEXO_registros;
    public $FECHA_registros;
    public $FECHA_NAC_registros;
    public $DEPARTAMENTO_registros;
    public $DISTRITO_registros;
    public $URBANIZACION_registros;
    public $DIRECCION_registros;
    public $TELEFONO_registros;
    public $MOVIL_registros;
    public $EMAIL_registros;
    public $REFERENCIA_registros;
    public $PROFESION_registros;
    public $OFICIO_registros; 
    
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }
     
     function registros_nombre($CODIGO_registros)
     {
          $sql = "select CONCAT(PATERNO_registros,' ' ,MATERNO_registros,' ',NOMBRES_registros) as datos from tabla_registros where CODIGO_registros = '$CODIGO_registros'";          
          $query = $this->db->query($sql);
            
            if ($query->num_rows() == 1)
            {
               $row = $query->row();            
               return $row->datos;
            } 
          
          return "NO ENCONTRADO";
     }
     
     function registros_id_registros($ID_registros)
     {
          $sql = "select * from tabla_registros where ID_registros = '$ID_registros'";          
          $query = $this->db->query($sql)->result();
          return $query;
     }
     
     function registros_codigo_registros($CODIGO_registros)
     {
          $sql = "select * from tabla_registros where CODIGO_registros = '$CODIGO_registros'";          
          $query = $this->db->query($sql)->result();
          return $query;
     }
     
     function registros_dni_registros($DNI_registros)
     {
          $sql = "select * from tabla_registros where DNI_registros = '$DNI_registros'";          
          $query = $this->db->query($sql)->result();
          return $query;
     }
     
     function registros_zona_registros($ZONA_registros)
     {
          $sql = "select * from tabla_registros where ZONA_registros = '$ZONA_registros'";          
          $query = $this->db->query($sql)->result();
          return $query;
     }
     
     function registros_residencia_registros($RESIDENCIA_registros)
     {
          $sql = "select * from tabla_registros where RESIDENCIA_registros = '$RESIDENCIA_registros' order by PATERNO_registros ASC, MATERNO_registros, NOMBRES_registros ASC";          
          $query = $this->db->query($sql)->result();
          return $query;
     }

     
     //todo 2024
     function save($post){
          $q = $this->db->insert("tabla_registros",$post);
          if($q)
               return $this->db->insert_id();
          else
               return 0;
     }


     function get($ID_registros)
     {          
          $query = $this->db->get_where("tabla_registros",["ID_registros"=>$ID_registros]);
          return $query->row(); 
     }
}
?>