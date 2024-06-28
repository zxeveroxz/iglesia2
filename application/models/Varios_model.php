<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Varios_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function departamentos($idx = null)
    {
        //CODIGO_departamento
        //NOMBRE_departamento
        $this->db->order_by('NOMBRE_departamento','ASC');
        $query = $this->db->get('tabla_departamento'); 
        return $query->result();
    }


    function distritos($idx = null)
    {
        //CODIGO_distrito
        //NOMBRE_distrito
        //DEPARTAMENTO_distrito
        $this->db->order_by('NOMBRE_distrito','ASC');
        $query = $this->db->get('tabla_distrito'); 
        return $query->result();
    }

    function iglesias($idx = null)
    {
        //CODIGO_iglesia
        //NOMBRE_iglesia
        $this->db->order_by('NOMBRE_iglesia','ASC');
        $query = $this->db->get('tabla_iglesias'); 
        return $query->result();
    }

    function cargos($idx = null)
    {
        //CODIGO_cargos
        //NOMBRE_cargos
        //ABREVIATURA_cargos
        $this->db->order_by('NOMBRE_cargos','ASC');
        $query = $this->db->get('tabla_cargos'); 
        return $query->result();
    }

    function zonas($idx = null)
    {
        //CODIGO_zona
        //NOMBRE_zona       
        $this->db->not_like('NOMBRE_zona', 'ZZZ', 'after'); // 'after' asegura que 'ZZZ' está al inicio de la cadena
        $this->db->not_like('NOMBRE_zona', 'WZ:', 'after'); 
        $this->db->not_like('NOMBRE_zona', 'WZ', 'after'); 
        $this->db->not_like('NOMBRE_zona', 'WW', 'after'); 
        $this->db->not_like('NOMBRE_zona', 'WX:', 'after'); 
        $this->db->not_like('NOMBRE_zona', 'W:', 'after'); 
        $this->db->order_by('NOMBRE_zona','ASC');
        $query = $this->db->get('tabla_zonas'); 
        return $query->result();
    }

    function zonaXresidencias($zona)
    {        
        $this->db->select('CODIGO_residencia');
        $this->db->select('ORDEN_residencia');
        $this->db->where('ZONA_residencia',$zona);
        $this->db->order_by('ORDEN_residencia','ASC');
        $query = $this->db->get('tabla_residencias'); 
        return $query->result();
    }

    function estudios($idx = null)
    {
        //CODIGO_estudio
        //NOMBRE_estudio        
        $this->db->order_by('NOMBRE_estudio','ASC');
        $query = $this->db->get('tabla_estudio'); 
        return $query->result();
    }

    function profesiones($idx = null)
    {
        //CODIGO_profesion
        //NOMBRE_profesion        
        $this->db->order_by('NOMBRE_profesion','ASC');
        $query = $this->db->get('tabla_profesion'); 
        return $query->result();
    }

    function oficios($idx = null)
    {
        //CODIGO_oficio
        //NOMBRE_oficio        
        $this->db->order_by('NOMBRE_oficio','ASC');
        $query = $this->db->get('tabla_oficio'); 
        return $query->result();
    }

    function estados_laborales($idx = null)
    {
        //CODIGO_estado_laboral
        //NOMBRE_estado_laboral        
        $this->db->order_by('NOMBRE_estado_laboral','ASC');
        $query = $this->db->get('tabla_estado_laboral'); 
        return $query->result();
    }

    function tipos_empresas($idx = null)
    {
        //CODIGO_tipo_empresa
        //NOMBRE_tipo_empresa        
        $this->db->order_by('NOMBRE_tipo_empresa','ASC');
        $query = $this->db->get('tabla_tipo_empresa'); 
        return $query->result();
    }

    function estados_civiles($idx = null)
    {
        //CODIGO_estado_civil
        //NOMBRE_estado_civil        
        $this->db->order_by('NOMBRE_estado_civil','ASC');
        $query = $this->db->get('tabla_estado_civil'); 
        return $query->result();
    }

    function estados_religiosos($idx = null)
    {
        //CODIGO_estado_religioso
        //NOMBRE_estado_religioso        
        $this->db->order_by('NOMBRE_estado_religioso','ASC');
        $query = $this->db->get('tabla_estado_religioso'); 
        return $query->result();
    }


    function verificarXcodigo($codigo)
    {             
        $query = $this->db->get_where('tabla_registros',['CODIGO_registros'=>$codigo]); 
        if($query->num_rows()==1)        
            return $query->result();
        else
            return 0;
    }

    
}
