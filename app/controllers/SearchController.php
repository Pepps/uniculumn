<?php

class SearchController extends BaseController {
    //foo.com/search/project/email_category/foo@foo.com-admin@foo.com_spel+kod-game+code
    public function index($option, $key, $val){
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
      $json = json_encode($data);
      echo "<pre>" . $option . ": " . $json . "</pre>";

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
                  $table->with(array('User' => function($query) use ($key, $explode){
                    $query->where('email',"=",$explode);
                  }));
                      break;
                case 'categories':
                  $table->Category->where('typ',"=",$explode);
                  break;
                default:
                  $table->where($key,"=",$explode);
                      break;
              }
            }
          }
          switch($key){
            case 'email':
              $table->with(array('User' => function($query) use ($explode){
                $query->orWhere('email',"=",$explode);
              }));
              break;
            case 'categories':
              $table->Category->orWhere('typ',"=",$explode);
              break;
            default:
              $table->orWhere($key,"=",$explode);
              break;
          }
        }
      }
      var_dump($table->get()); // Runs the query we have build up.

    }
}