<?php
/**
 *
 * User: DAZONIPSE
 * Date: 23/03/2017
 * Time: 10:00 am
 */
    class Users extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function login($name, $pass){
            //echo $name;
            
            if($name != FALSE && $pass != FALSE){
                $this->db->where('User', $name);
                $this->db->where('Pass', $pass);
                $this->db->where('Active', 0);
                $query = $this->db->get('user');

                if($query->num_rows() == 1){
                    return $query->result_array();
                }
                return 0;
            }
        }

        public function Guardar($user,$name,$pass,$rol){
            $data = array(
                'User' => $user,
                'Name' => str_replace("%C3%B1","ñ", str_replace("%20"," ",str_replace("%C3%91","Ñ", str_replace("%20"," ",$name)))),
                'Pass' => $pass,
                'Access' => $rol,
                'Date_Creat' => date('Y-m-d')
            );
            
            $this->db->insert('user', $data);
        }

        public function del($id, $status){
            $this->db->where('IdUser', $id);
            $data = array('Active' => $status);

            $this->db->update('user', $data);
        }

        public function Clave($id, $pass){
            $this->db->where('IdUser', $id);
            $data = array('Pass' => $pass);

            $this->db->update('user', $data);
        }

        public function allUser(){        
            $query = $this->db->get('user');        
            
            if($query->num_rows() <> 0){            
                return $query->result_array();
            }
            return 0;
        }

        public function allRol(){        
            $query = $this->db->get('rol');        
            
            if($query->num_rows() <> 0){            
                return $query->result_array();
            }
            return 0;
        }

        public function InsertLog($usuario,$id){
            $datos = array('Grupo' => 0, 
                    'Us_name' =>$usuario." ID=> ".$id,
                    'Date_Reg' => date('Y-m-d H:i:s'),
                    'Descripcion' => 'Ingreso al sistema'
                    );
            $this->db->insert('log_transac',$datos);
        }
    }