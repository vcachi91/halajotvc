<?php

namespace App\Http\Controllers;
use App\Checkbox as getCheckbox;
use App\Respuestas as getRespuestas;
use App\Generales as getGenerales;
use App\Maratones as getMaratones;

use Mail;
use Request;

class HomeController extends Controller
{

    public $message;

    public function index()
    {
        $maratones = getMaratones::where('estado', 1)->get()->toArray();
        $data['maratones'] = $maratones;
        return view('home/maratones', $data);
    }

    public function editar_maraton($id)
    {
        $generales = getGenerales::where('maraton_id', $id)->where('estado', 1)->get()->toArray();
        $data['data_id'] = $id;
        $data['generales'] = $generales;
        return view('home/index', $data);
    }

    public function minor()
    {
        return view('home/minor');
    }

    public function editar($id) { 
            $data['lista_info'] = getCheckbox::info($id)->toArray();
            return view('home/editar', $data);
        }

    public function vista($id)
    {
        $opciones = getCheckbox::where('maraton_id', $id)->where('estado', 1)->get();
        $generales = getGenerales::where('maraton_id', $id)->where('estado', 1)->get()->toArray();
        $data['opciones'] = $opciones;
        $data['generales'] = $generales;
        return view('home/vista', $data);
    }    

    public function ajax_listar() {
        $sidx="id";
        $sord="DESC";
        $id = $_POST['id'];
        //Just Allow ajax request        

			$page = (int)Request::get('page');
			
			$limit = (int)Request::get('rows'); 
            /**
             * Calcule total pages if $coutn is higher than zero.
             * @var int
             */
            $count = getCheckbox::getList($id)->count();
            $total_pages = ($count > 0 ? ceil($count/$limit) : 0);
            
            // if for some reasons the requested page is greater than the total
            // set the requested page to total page
            if ($page > $total_pages) $page = $total_pages;
            
            /**
             * calculate the starting position of the rows
             * do not put $limit*($page - 1).
             * @var int
             */
            $start = $limit * $page - $limit; // do not put $limit*($page - 1)
            
            // if for some reasons start position is negative set it to 0
            // typical case is that the user type 0 for the requested page
            if($start < 0) $start = 0;
            
            //Get casos INFO
            //dd($clause);
            $lista = getCheckbox::getList($id);
            
            //Constructing a JSON
            $response = new \stdClass();
            $response->page     = 0;
            $response->total    = $total_pages;
            $response->records  = $count;
            $i = 0;					
          
            if( !empty($lista) )
            {
                 foreach ($lista AS $i => $row)
                {                   
                    $opciones = "";
					$opciones .= '<a href="' . url('lista/detalle/' . $row->id) . '" data-id="' . $row->id . '" class="btn btn-block btn-outline btn-success">Ver Detalle</a>';
                    $opciones .= '<a href="' . url('lista/eliminar/' . $row->id . '?id=' . $row->id) . '" data-id="' . $row->id . '" class="btn btn-block btn-outline btn-danger">Eliminar</a>';                    
                    
                    $response->rows[$i]["id"] = $row->id;
                    $response->rows[$i]["cell"] = array(
                        $row->id,
                        $row->nombre,
                        $opciones                    	
                    );
                    $i++;
                }
            }
            echo json_encode($response);
			
			
            exit;

    }

    public function ajax_listar_maratones() {
        $sidx="id";
        $sord="DESC";
        //Just Allow ajax request        

			$page = (int)Request::get('page');
			
			$limit = (int)Request::get('rows'); 
            /**
             * Calcule total pages if $coutn is higher than zero.
             * @var int
             */
            $count = getMaratones::getList()->count();
            $total_pages = ($count > 0 ? ceil($count/$limit) : 0);
            
            // if for some reasons the requested page is greater than the total
            // set the requested page to total page
            if ($page > $total_pages) $page = $total_pages;
            
            /**
             * calculate the starting position of the rows
             * do not put $limit*($page - 1).
             * @var int
             */
            $start = $limit * $page - $limit; // do not put $limit*($page - 1)
            
            // if for some reasons start position is negative set it to 0
            // typical case is that the user type 0 for the requested page
            if($start < 0) $start = 0;
            
            //Get casos INFO
            //dd($clause);
            $lista = getMaratones::getList();
            
            //Constructing a JSON
            $response = new \stdClass();
            $response->page     = 0;
            $response->total    = $total_pages;
            $response->records  = $count;
            $i = 0;					
          
            if( !empty($lista) )
            {
                 foreach ($lista AS $i => $row)
                {                   
                    $opciones = "";
					$opciones .= '<a href="' . url('maratones/detalle/' . $row->id) . '" data-id="' . $row->id . '" class="btn btn-block btn-outline btn-success">Ver Detalle</a>';
                    $opciones .= '<a href="' . url('maratones/eliminar/' . $row->id . '?id=' . $row->id) . '" data-id="' . $row->id . '" class="btn btn-block btn-outline btn-danger">Eliminar</a>';                    
                    
                    $response->rows[$i]["id"] = $row->id;
                    $response->rows[$i]["cell"] = array(
                        $row->id,
                        $row->nombre,
                        $opciones                    	
                    );
                    $i++;
                }
            }
            echo json_encode($response);
			
			
            exit;

    }
    //Funcion para guardar el checkbox usando ajax
    public function ajax_guardar(){
    $data = $_POST;
    $array_nombre['nombre'] = $data['nombre'];
    $array_nombre['maraton_id'] = $data['id'];
    //Guardar nombre chexbox   
    $checkbox = getCheckbox::create($array_nombre);    
    echo json_encode($checkbox);
    exit; 
    }

    public function ajax_guardar_maratones(){
        $data = $_POST;
        $array_nombre['nombre'] = $data['nombre'];
        //Guardar nombre chexbox   
        $maratones = getMaratones::create($array_nombre);    
        echo json_encode($maratones);
        exit; 
        }

    public function guardar_generales(){
        $data = $_POST;
        $generales = getGenerales::guardar_generales($data);
        return redirect('/');
        }

    //Funcion para guardar respuestas usando ajax
    public function ajax_guardar_respuestas(){
        $data = $_POST;
        $datos['checkbox_id'] = $data['id'];
        $datos['nombre'] = $data['respuesta'];
        //Guardar respuestas
        $respuestas = getRespuestas::guardar_respuestas($datos);    
        echo json_encode($respuestas);
        exit; 
        }

    //FUncion para eliminar respuestas
    public function ajax_eliminar_respuestas(){
        $data = $_POST;     
        //Guardar respuestas
        $respuestas = getRespuestas::where('id', $data['id']); 
        $respuestas->delete();
        echo json_encode($respuestas);
        exit; 
        }  
    public function eliminar(){
        $data = $_GET;
        //Guardar respuestas
        $checkbox = getCheckbox::where('id', $data['id']); 
        $checkbox->delete();
        return redirect('/');
        }     
    public function eliminar_maratones(){
        $data = $_GET;
        //Guardar respuestas
        $maratones = getMaratones::where('id', $data['id']); 
        $maratones->delete();
        return redirect('/');
        }              
        
    public function enviar_respuesta()  {
        $data = $_POST;
        $datos = getRespuestas::enviando_respuestas($data);
        $data = array('name'=>"vachi91@gmail.com");
        Mail::send(['text'=>'home.email'], $data, function($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject
               ('Laravel Basic Testing Mail');
            $message->from('vcachi91@gmail.com','Virat Gandhi');
         });
        $info['respuestas'] = $datos;
        return view('home/final', $info);    
    }
}
