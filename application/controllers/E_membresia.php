<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class E_membresia extends CI_Controller {
    
     public function __construct()
     {
          parent::__construct();
          //load the login model
          
          if(!$this->session->userdata('loginin')){
            redirect('/',"refresh");
            die;
          }
          
          $this->load->model('Acceso_model',"ACCESO");
          $this->load->model('Zonas_model','ZONAS');
          $this->load->model('Residencias_model','RESIDENCIAS');
          $this->load->model('Autoridades_model','AUTORIDADES');
          $this->load->model('Registros_model','REGISTROS');
          $this->load->model('Cargos_model','CARGOS');
          $this->load->model('Asistencias_model','ASISTENCIAS');
          $this->load->model('Ofrendas_model','OFRENDAS');
          $this->load->model('Diezmos_model','DIEZMOS');
          $this->load->model('ESTUDIO_model','ESTUDIO');

          $this->load->model('Varios_model','VARIOS');
     }





	public function index()
	{
	   $this->load->view('includes/top');
       $this->load->view('includes/menu');
       $this->load->view('e_membresia/index');
       $this->load->view('includes/footer');
    }

    public function registro($id_registro=0)
	{
	   $data = array();       
       //$data['zonas'] = $this->ZONAS->zona_codigo_zona("%");
       $data['DEPARTAMENTOS'] = $this->VARIOS->departamentos(); 
       $data['DISTRITOS'] = $this->VARIOS->distritos();      
       $data['IGLESIAS'] = $this->VARIOS->iglesias(); 
       $data['CARGOS'] = $this->VARIOS->cargos();  
       $data['ZONAS'] = $this->VARIOS->zonas();    
       $data['ESTUDIOS'] = $this->VARIOS->estudios();   
       $data['PROFESIONES'] = $this->VARIOS->profesiones();  
       $data['OFICIOS'] = $this->VARIOS->oficios();   
       $data['ESTADOS_LABORALES'] = $this->VARIOS->estados_laborales();  
       $data['TIPOS_EMPRESAS'] = $this->VARIOS->tipos_empresas(); 
       $data['ESTADOS_CIVILES'] = $this->VARIOS->estados_civiles();  
       $data['ESTADOS_RELIGIOSOS'] = $this->VARIOS->estados_religiosos();  

       $data["ROW"]=($id_registro > 0?$this->REGISTROS->get($id_registro):null);
       
	   $this->load->view('includes/top');
       $this->load->view('includes/menu');
       $this->load->view('e_membresia/registros',$data);              
       $this->load->view('includes/footer');       
    }

    public function save(){
        $_POST["ID_registros"]=0;
        $_POST["DNI_registros"] = (isset($_POST["DNI_registros"]) ? ($_POST["DNI_registros"]!=""?$_POST["DNI_registros"]: null):null);
        $_POST["FECHA_registros"]=date('Y-m-d H:i:s');
        $r = $this->REGISTROS->save($_POST);
        echo $r;
        
    }


    
    public function reporte1()
	{
	   $data = array();
       //$data['zonas'] = $this->ZONAS->zona_codigo_zona("%");
       $data['zonas'] = $this->AUTORIDADES->autoridad_pastor_maestro();       
	   $this->load->view('includes/top');
       $this->load->view('includes/menu');
       $this->load->view('e_ofrendas/reporte1',$data);              
       $this->load->view('includes/footer');
       
    }
    
    public function reporte1_cmd($tipo='ver')
	{
	   $data = array();
       $domingo = $this->input->post('domingo');
       $data["idx"] = $this->session->userdata('idx');
       $data['domingo'] = $domingo;
       
       $sabado_nuevo =  strtotime("+6 day" , strtotime($domingo));
       $sabado = date('Y-m-d',$sabado_nuevo);       
       
        $ma =  strtotime("-5 day" , strtotime($domingo));
        $mi =  strtotime("-4 day" , strtotime($domingo));
        $ju =  strtotime("-3 day" , strtotime($domingo));
        $vi =  strtotime("-2 day" , strtotime($domingo));
        $sa =  strtotime("-1 day" , strtotime($domingo));
        $do =  strtotime("0 day" ,  strtotime($domingo));
        
        $dias = (object)null;
        $dias->martes = date('Y-m-d',$ma);
        $dias->martes_nro = date('d',$ma);
        $dias->miercoles = date('Y-m-d',$mi);
        $dias->miercoles_nro = date('d',$mi);
        $dias->jueves = date('Y-m-d',$ju);
        $dias->jueves_nro = date('d',$ju);
        $dias->viernes = date('Y-m-d',$vi);
        $dias->viernes_nro = date('d',$vi);
        $dias->sabado = date('Y-m-d',$sa);
        $dias->sabado_nro = date('d',$sa);
        $dias->domingo = date('Y-m-d',$do);
        $dias->domingo_nro = date('d',$do);
       $data["dias"] = $dias;
       
       
       //$data['zonas'] = $this->ZONAS->zona_codigo_zona("%");
       $pastor_zona = $this->input->post('pastor_zona');
       $pastor = $this->AUTORIDADES->autoridad_PASTOR_zona($pastor_zona);
       $data["principal"] = $this->REGISTROS->registros_nombre($pastor_zona);
       
       if($tipo=='pdf'){
        
                
            $this->load->library('Pdf');
            $pdf = new Pdf('P', 'mm', 'A4',true, 'UTF-8', false);
            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Sergio Zegarra');
            $pdf->SetTitle('REPORTE: '.$data["principal"]);
            $pdf->titulo = 'REPORTE: '.$data["principal"];
            $pdf->Header();
            //$pdf->SetSubject('TCPDF Tutorial');
            //$pdf->SetKeywords('TCPDF, PDF, example, test, guide');                                    
            // set auto page breaks
            //$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->SetAutoPageBreak(true, 0);
            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
            
            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }
            /**
            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 005', PDF_HEADER_STRING);
            
            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            
            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            */
            // set margins
            //$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            //$pdf->SetMargins(PDF_MARGIN_LEFT, 150, PDF_MARGIN_RIGHT);
            //$pdf->SetHeaderMargin(5);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);                        
            
            //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'icmeaa.org', "Tecnologia de la Informacion");     
            $pdf->AddPage('L', 'A4'); 
            $pdf->SetFont('calibri');
       }
                      
                      
                      
       
       $ln=1;
       $total = count($pastor);
       $ccc = 0;
        foreach($pastor as $pa){
            $obj = (object)null;
            $obj->PASTOR_zona = $pa->PASTOR_zona;
            $obj->PASTOR_zona_nombre = $this->REGISTROS->registros_nombre($pa->PASTOR_zona);       
            $obj->PASTOR_zona_cargo_nombre = $this->CARGOS->cargo_nombre_codigoregistro($pa->PASTOR_zona);         
            $data["pastor"][] = $obj;
            
            if($tipo=='pdf'){                
                //$pdf->SetFontSize(20);                
                $pdf->SetFont('','B',12);
                $text = "sddsd";                           
                $pdf->SetLineStyle(array('width' => 0.01, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
                //$pdf->SetFillColor(154, 244, 255);
                $pdf->SetFillColor(245,245,245);
                $pdf->SetTextColor( 5, 22, 126 );
                $pdf->setCellPaddings(1,1,1,1);
                $pdf->MultiCell(250, 4, $obj->PASTOR_zona_cargo_nombre." ".$this->REGISTROS->registros_nombre($pa->PASTOR_zona), 1, 'L', 1, 0,20,12);
                //$pdf->setCellPaddings(0,0,0,0); 
                $ln++;
                $ln++;
                $ln++;
            }
                                                           
            $zona = $this->ZONAS->zona_pastor_zona($pa->PASTOR_zona);    
            foreach($zona as $zo){            
                $obj = (object)null; 
                $obj->CODIGO_zona = $zo->CODIGO_zona;
                $obj->NOMBRE_zona = $zo->NOMBRE_zona;
                $obj->RESPONSABLE_zona = $zo->RESPONSABLE_zona;
                $obj->RESPONSABLE_zona_nombre = $this->REGISTROS->registros_nombre($zo->RESPONSABLE_zona);
                $obj->RESPONSABLE_zona_cargo_nombre = $this->CARGOS->cargo_nombre_codigoregistro($zo->RESPONSABLE_zona);                 
                $data['zonas'][$pa->PASTOR_zona][] = $obj;                       
                
                    if($tipo=='pdf'){
                        $ln++;
                        //$pdf->SetFontSize(20);
                        $pdf->SetFont('','',9);          
                        
                        $pdf->SetLineStyle(array('width' => 0.01, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
                        $pdf->SetFillColor( 224, 248, 252 );
                        $pdf->SetTextColor(11, 12, 66);
                        $pdf->MultiCell(245, 4, "ZONA: ".$zo->NOMBRE_zona, 1, 'L', 1, 0,25,(5*$ln));
                        $pdf->SetFont('','B',9);
                        $pdf->MultiCell(245, 4, $obj->RESPONSABLE_zona_cargo_nombre." ".$obj->RESPONSABLE_zona_nombre, 0, 'R', 0, 0,25,(5*$ln));
                        $pdf->SetFont('','',8);
                        $ln++;
                        $ln++;
                    } 
                
                
                    $residencia = $this->RESIDENCIAS->residencia_zona_residencia($zo->CODIGO_zona);
                    foreach($residencia as $re){
                        $obj = (object)null;
                        $obj->ID_residencia = $re->ID_residencia;
                        $obj->CODIGO_residencia = $re->CODIGO_residencia;
                        $obj->ORDEN_residencia = $re->ORDEN_residencia;
                        $obj->SALDOI_residencia = $re->SALDOI_residencia;
                        $obj->CUOTA_SOL_residencia = $re->CUOTA_SOL_residencia;
                        $obj->FECHA_APERTURA_residencias = $re->FECHA_APERTURA_residencias;
                        //$obj->HISTORIA_residencia = $re->HISTORIA_residencia;
                        $data['residencias'][$zo->CODIGO_zona][$pa->PASTOR_zona][] = $obj;
                        
                            if($tipo=='pdf'){
                                //$pdf->SetFontSize(20);
                                $pdf->SetFont('','B',8);           
                                $pdf->SetLineStyle(array('width' => 0.01, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0)));
                                $pdf->SetFillColor( 255, 243, 191 );
                                $pdf->SetTextColor(11, 12, 66);
                                $pdf->MultiCell(240, 4, " RESIDENCIA: ".$re->ORDEN_residencia, 'LTR', 'L', 1, 0,30,((5*$ln)));
                                $ln++;
                                $pdf->SetFont('','B',7);
                                $pdf->setCellPaddings(1,2,1,2);
                                $pdf->MultiCell(240, 8, "", 1, 'L', 1, 0,30,((5*$ln)));
                                $pdf->MultiCell(6, 8, "#", 1, 'C', 1, 0,30,((5*$ln)));
                                $pdf->MultiCell(16, 8, "CODIGO", 1, 'C', 1, 0,36,((5*$ln)));
                                $pdf->MultiCell(60, 8, "APELLIDOS Y NOMBRES", 1, 'C', 1, 0,52,((5*$ln)));
                                $pdf->MultiCell(6, 8, "E", 1, 'C', 1, 0,112,((5*$ln)));
                                $pdf->MultiCell(40, 8, "CARGO", 1, 'C', 1, 0,118,((5*$ln)));
                                $pdf->MultiCell(16, 8, "CELULAR", 1, 'C', 1, 0,158,((5*$ln)));
                                $pdf->MultiCell(14, 8, "DIEZMOS", 1, 'C', 1, 0,174,((5*$ln)));
                                $pdf->MultiCell(14, 8, "OFRENDAS", 1, 'C', 1, 0,188,((5*$ln)));
                                $pdf->setCellPaddings(1,0,1,1);
                                
                                $pdf->MultiCell(42, 8, "ASISTENCIAS", 1, 'C', 1, 0,202,((5*$ln)));
                                
                                $pdf->setCellPaddings(1,1.2,1,1.18);
                                $pdf->SetFillColor( 250, 250, 230 );
                                
                                $pdf->SetFont('','B',6);
                                $pdf->MultiCell(7, 3, "M-".$dias->martes_nro, 1, 'C', 1, 0,202,(3+(5*$ln)));
                                $pdf->MultiCell(7, 3, "M-".$dias->miercoles_nro, 1, 'C', 1, 0,209,(3+(5*$ln)));
                                $pdf->MultiCell(7, 3, "J-".$dias->jueves_nro, 1, 'C', 1, 0,216,(3+(5*$ln)));
                                $pdf->MultiCell(7, 3, "V-".$dias->viernes_nro, 1, 'C', 1, 0,223,(3+(5*$ln)));
                                $pdf->MultiCell(7, 3, "S-".$dias->sabado_nro, 1, 'C', 1, 0,230,(3+(5*$ln)));
                                $pdf->MultiCell(7, 3, "D-".$dias->domingo_nro, 1, 'C', 1, 0,237,(3+(5*$ln)));
                                
                                $pdf->SetFont('','B',7);
                                $pdf->SetFillColor( 255, 243, 191 );
                                $pdf->setCellPaddings(1,0,1,1);
                                $pdf->MultiCell(26, 8, "ESTUDIO", 1, 'C', 1, 0,244,((5*$ln)));
                                $pdf->setCellPaddings(1,1,1,1);
                                $pdf->SetFillColor( 250, 250, 230 );
                                $pdf->MultiCell(13, 4, "Matricu", 1, 'C', 1, 0,244,(3+(5*$ln)));
                                $pdf->MultiCell(13, 4, "Materia", 1, 'C', 1, 0,257,(3+(5*$ln)));     
                                $pdf->SetFillColor( 255, 243, 191 );                           
                                $ln++;
                                
                                $pdf->setCellPaddings(1,1,1,1);
                            }
                        
                        
                        
                            $registro = $this->REGISTROS->registros_residencia_registros($re->CODIGO_residencia);
                            $reg_c = 1;                            
                            foreach($registro as $r){
                                $obj = (object)null;
                                $obj->CODIGO_registros = $r->CODIGO_registros;
                                $obj->DATOS_registros = $this->REGISTROS->registros_nombre($r->CODIGO_registros);
                                $obj->CARGO_registros  = $r->CARGO_registros;
                                $obj->CARGO_registros_nombre  = $this->CARGOS->cargo_nombre($r->CARGO_registros,false);
                                $obj->FECHA_registros  = $r->FECHA_registros;
                                $obj->FECHA_NAC_registros  = $r->FECHA_NAC_registros;
                                $obj->EDAD = Ayudas::edad_calcular($r->FECHA_NAC_registros);
                                $obj->MOVIL_registros  = $r->MOVIL_registros;
                                $obj->EMAIL_registros   = $r->EMAIL_registros;
                                $obj->diezmos = $this->DIEZMOS->diezmos_depostio_fecha($r->CODIGO_registros,$domingo,$sabado);
                                $obj->ofrendas =$this->OFRENDAS->ofrendas_depostio_fecha($r->CODIGO_registros,$domingo,$sabado);                                
                                
                                $obj->martes = $this->ASISTENCIAS->asistencia_registros_fecha($r->CODIGO_registros,$dias->martes);
                                $obj->miercoles = $this->ASISTENCIAS->asistencia_registros_fecha($r->CODIGO_registros,$dias->miercoles);
                                $obj->jueves = $this->ASISTENCIAS->asistencia_registros_fecha($r->CODIGO_registros,$dias->jueves);
                                $obj->viernes = $this->ASISTENCIAS->asistencia_registros_fecha($r->CODIGO_registros,$dias->viernes);
                                $obj->sabado = $this->ASISTENCIAS->asistencia_registros_fecha($r->CODIGO_registros,$dias->sabado);
                                $obj->domingo = $this->ASISTENCIAS->asistencia_registros_fecha($r->CODIGO_registros,$dias->domingo);
                                $obj->matriculas = $this->ESTUDIO->estudio_buscar_matriculas($r->CODIGO_registros);
                                $obj->materiales = $this->ESTUDIO->estudio_buscar_materiales($r->CODIGO_registros);
                                
                                $data['registros'][$re->CODIGO_residencia][$zo->CODIGO_zona][$pa->PASTOR_zona][] = $obj;         
                                
                                if($tipo=='pdf'){                                    
                                    //$pdf->SetFontSize(20);
                                    $pdf->SetFont('','',7);           
                                    $pdf->SetLineStyle(array('width' => 0.001, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'color' => array(10,10,10)));
                                    $pdf->SetFillColor(255,255,255);
                                    
                                    if($reg_c%2==0){
                                        $pdf->SetFillColor(254, 248, 247);
                                    }
                                    
                                    if($obj->CARGO_registros==92){
                                        $pdf->SetFillColor(234, 255, 158);                                            
                                    }
                                    
                                    $pdf->SetTextColor(11, 12, 10);
                                    
                                    $pdf->MultiCell(240, 4, "", 1, 'R', 1, 0,30,(2+(5*$ln)));
                                    
                                    $pdf->MultiCell(6, 4, $reg_c, 0, 'R', 0, 0,30,(2+(5*$ln)));
                                    $pdf->MultiCell(16, 4, $obj->CODIGO_registros, 'L', 'C', 0, 0,36,(2+(5*$ln))); 
                                    
                                    $pdf->MultiCell(65, 4, $obj->DATOS_registros, 'L', 'L', 0, 0,52,(2+(5*$ln)));    
                                    
                                    $pdf->MultiCell(6, 4, $obj->EDAD, 'L', 'R', 0, 0,112,(2+(5*$ln)));
                                    
                                    $pdf->MultiCell(40, 4, $obj->CARGO_registros_nombre, 'L', 'C', 0, 0,118,(2+(5*$ln)));
                                    
                                    $pdf->MultiCell(16, 4, $obj->MOVIL_registros, 'L', 'C', 0, 0,158,(2+(5*$ln)));
                                    $pdf->SetFont('zapfdingbats','',7);                                    
                                    $pdf->MultiCell(14, 4, ($obj->diezmos==1?"4":""), 'L', 'C', 0, 0,174,(2+(5*$ln)));                                    
                                    $pdf->MultiCell(14, 4, ($obj->ofrendas==1?"4":""), 'L', 'C', 0, 0,188,(2+(5*$ln)));
                                    
                                    $pdf->MultiCell(7, 4, ($obj->martes==1?":":""), 'L', 'C', 0, 0,202,(2+(5*$ln)));
                                    $pdf->MultiCell(7, 4, ($obj->miercoles==1?":":""), 'L', 'C', 0, 0,209,(2+(5*$ln)));
                                    $pdf->MultiCell(7, 4, ($obj->jueves==1?":":""), 'L', 'C', 0, 0,216,(2+(5*$ln)));
                                    $pdf->MultiCell(7, 4, ($obj->viernes==1?":":""), 'L', 'C', 0, 0,223,(2+(5*$ln)));
                                    $pdf->MultiCell(7, 4, ($obj->sabado==1?":":""), 'L', 'C', 0, 0,230,(2+(5*$ln)));
                                    $pdf->MultiCell(7, 4, ($obj->domingo==1?":":""), 'L', 'C', 0, 0,237,(2+(5*$ln)));
                                    
                                    $pdf->MultiCell(13, 4, ($obj->matriculas==1?"H":""), 'L', 'C', 0, 0,244,(2+(5*$ln)));
                                    $pdf->MultiCell(13, 4, ($obj->materiales==1?"H":""), 'L', 'C', 0, 0,257,(2+(5*$ln)));                                    
                                    
                                    
                                    $pdf->SetFont('calibri','',7);                                                                               
                                     if($ln%36==0||$ln%37==0||$ln%38==0||$ln%39==0||$ln%40==0){
                                        $pdf->AddPage('L', 'A4');
                                        $ln=1;
                                    } 
                                    $lleno = 0;
                                    $reg_c++;  
                               }
                                
                             $ln++;                                                                                     
                            }
                            
                            if($tipo=='pdf'){
                                if($ln%36==0 ||$ln%37==0||$ln%38==0||$ln%39==0||$ln%40==0){
                                    $pdf->AddPage('L', 'A4');
                                    $ln=1;
                                }
                            }
                            
                        $ln++;
                    }
                    
                    if($tipo=='pdf'){
                        if($ln%36==0 ||$ln%37==0||$ln%38==0||$ln%39==0||$ln%40==0){
                            $pdf->AddPage('L', 'A4');
                            $ln=1;
                        }
                    }
                    
            $ln++;
            
            } 
             if($tipo=='pdf' && $ccc < $total-1 ){
                $pdf->AddPage('L', 'A4');
                $ln=1;    
            }       
          $ccc++;   
        }       
              
       //$this->load->view('e_ofrendas/reporte1_cmd',$data);       
       $html = $this->load->view('e_ofrendas/reporte1_cmd',$data,true);
      
       if($tipo=='ver')            
            echo $html;
       if($tipo == 'pdf'){
            



            $nombre_archivo = str_replace(" ","-",Ayudas::limpia_tildes($data["principal"]));
            $nombre_archivo = "Reporte-General-".($nombre_archivo)."_".date('d-m-Y').".pdf";            
            $ruta = $_SERVER["DOCUMENT_ROOT"]."iglesia2/pdf/".$nombre_archivo;            
            $pdf->Output($ruta,'F');
            echo $nombre_archivo;
            //$data = file_get_contents ($ruta);            
            //force_download("fileName.pdf", $data);
            //echo base_url()."pdf/".$nombre_archivo;            
        }
        
            
       }
       
       
           
       
 public function ver_pdf($file)
	{
	   $this->load->library('Pdf');
	   Pdf::visualizar($file);
	   
    }
       
 }
 
 
 
 
 
 