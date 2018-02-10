<?php
/**
 *
 * User: DAZONIPSE
 * Date: 23/03/2017
 * Time: 10:00 am
 */
    class Reports extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function allwork(){        
            $query = $this->db->get('rptSemana');        
            
            if($query->num_rows() <> 0){            
                return $query->result_array();
            }
            return 0;
        }
        
        public function Guardar($Fecha,$Cargo,$Horario){
            $fechats = strtotime($Fecha); //pasamos a timestamp
            
            //el parametro w en la funcion date indica que queremos el dia de la semana
            //lo devuelve en numero 0 domingo, 1 lunes, martes....
            switch (date('w', $fechats)){
                case 0: $idia = 0; $fdia = 0; break;    /*Domingo*/
                case 1: $idia = 0; $fdia = 5; break;    /*Lunes*/
                case 2: $idia = 1; $fdia = 4; break;    /*Martes*/
                case 3: $idia = 2; $fdia = 3; break;    /*Miercoles*/
                case 4: $idia = 3; $fdia = 2; break;    /*Jueves*/
                case 5: $idia = 4; $fdia = 1; break;    /*Viernes*/
                case 6: $idia = 5; $fdia = 0; break;    /*Sabado*/
            }

            $FIni = date('Y-m-d', strtotime("$Fecha - $idia day")); //Fecha del dia Lunes
            $FFin = date('Y-m-d', strtotime("$Fecha + $fdia day")); //Fecha del dia Sabado
            
            $Cargo = str_replace("%22","",$Cargo);
            $Horario = str_replace("%22", "", str_replace("%20"," ",$Horario));
            $FIni = date('Y-m-d', strtotime($FIni));
            $FFin = date('Y-m-d', strtotime($FFin));

            $this->db->query("CALL pc_Puntos_Semana('$FIni','$FFin','$Cargo','$Horario')"); 
        }
    }