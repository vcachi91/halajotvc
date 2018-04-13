<?php

namespace App\Http\Controllers;
use App\Checkbox as getCheckbox;
use Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home/index');
    }

    public function minor()
    {
        return view('home/minor');
    }

    public function editar($id) { 
            $data['lista_info'] = getCheckbox::info($id)->toArray();
            return view('home/editar', $data);
        }

    public function ajax_listar() {
        $sidx="id";
        $sord="DESC";
        //Just Allow ajax request        

			$page = (int)Request::get('page');
			
			$limit = (int)Request::get('rows'); 
            /**
             * Calcule total pages if $coutn is higher than zero.
             * @var int
             */
            $count = getCheckbox::getList()->count();
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
            $lista = getCheckbox::getList();
            
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
                    $opciones .= '<a href="#" data-id="' . $row->id . '" class="btn btn-block btn-outline btn-danger subir_documento">Eliminar</a>';                    
                    
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

    public function ajax_guardar(){
    $data = $_POST;
    $array_nombre['nombre'] = $data['nombre'];
    //Guardar nombre chexbox   
    $checkbox = getCheckbox::create($array_nombre);    
    //$checkbox = getCheckbox::create($data['mi_array']);
    echo json_encode($checkbox);
    exit; 
    }
}
