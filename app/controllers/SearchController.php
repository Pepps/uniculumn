<?php

class SearchController extends BaseController {
    //foo.com/search/project/email_category/foo@foo.com-admin@foo.com_spel+kod-game+code
    public function index($option, $key, $val, $pretty=false){
      $keys = explode('_', $key);
      $vals = explode('_', $val);
      $data = [];

      for($i = 0; $i < sizeof($keys); $i++){
        $data[$keys[$i]] = explode('-', $vals[$i]);
      }

      /*for($i = 0; $i < sizeof($data["status"]); $i++){
        $first = substr($data["status"][$i], 0, 1);
        $last = substr($data["status"][$i], sizeof($data["status"][$i])+1, 1);
        //echo sizeof($data["status"][$i]) . "<br>";
        echo "data: " . $data["status"][$i] . "<br>";
        echo "!: " . $last . "<br>";
        if($first == "!"){
          //return "First char is !";
          (int)$nr = substr($data["status"][$i], 1, sizeof($data["status"][$i])+1);
          return $nr;
        }else if($last == "!"){
          (int)$nr = substr($data["status"][$i], 0, sizeof($data["status"][$i])+1);
          return $nr;
        }else{
          return "not a valid formating";
        }
      }*/

      // Get all rows in option table, but we are going to sort things out before calling it with ->get();
      $model = studly_case($option);
      $table = new $model;
      foreach($data as $key => $value){
        foreach($value as $string){
          $split = explode('+', $string);
          foreach ($split as $explode){
            if(end($split) !== $explode){
              switch($key){
                case 'email':
                  $table = $table->whereExists(function($query) use ($key, $explode){
                    $query->from('Users')->where($key,"=",$explode);
                  });
                      break;
                case 'categories':
                  $table = $table->Category->where('typ',"=",$explode);
                  break;
                default:
                  $table = $table->where($key,"=",$explode);
                      break;
              }
            }
          }
          switch($key){
            case 'email':
              $table = $table->orWhereExists(function($query) use ($key, $explode, $option){
                $query->from('Users')->orWhere($key,"=",$explode)->whereRaw($option.'s.user_id = Users.id');;
              });
              break;
            case 'categories':
              $table = $table->Category->orWhere('typ',"=",$explode);
              break;
            default:
              $table = $table->orWhere($key,"=",$explode);
              break;
          }
        }
      }
      if($pretty){
        echo '<pre>' . json_encode($table->get(),JSON_PRETTY_PRINT) . '</pre>'; // Runs the query we have build up.
      }
      else{
        echo '<pre>' . json_encode($table->get()) . '</pre>'; // Runs the query we have build up.
      }
      if(Input::get('debug') == 'true'){
        $queries = DB::getQueryLog();
        echo "<pre>" . json_encode($queries,JSON_PRETTY_PRINT) . "</pre>";
        echo '<pre>"' . $option . '": ' . json_encode($data,JSON_PRETTY_PRINT) . "</pre>";
      }
    }
}