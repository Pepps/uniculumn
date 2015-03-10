<?php

class SearchController extends BaseController {
    //foo.com/search/project/email_category/foo@foo.com-admin@foo.com_spel+kod-game+code
    public function index($option, $key, $val, $extra='', $pretty=false){
      $keys = explode('_', $key);
      $vals = explode('_', $val);
      $data = [];
      $selection = [];
      $extras = explode('_', $extra);

      foreach($extras as $extra){
        $selection = explode('-',$extra);
      }

      for($i = 0; $i < sizeof($keys); $i++){
        $key = explode('-',$keys[$i]);
        $data[$key[0]][$key[1]] = explode('-', $vals[$i]);
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

      foreach($data as $main_key => $sub_key) {
        foreach ($sub_key as $sub_key => $value){
          foreach ($value as $string) {
            $split = explode('+', $string);
            foreach ($split as $explode) {
                if (end($value) !== $string || count($value) == 1) {
                    if($option == $main_key){
                      $table = $table->where($sub_key, "=", $explode);
                    }
                    else{
                      $table = $table->whereHas($main_key, function($query) use ($sub_key, $explode){
                          $query->where($sub_key, "=", $explode);
                      });
                    }
                }
                else{
                  if($option == $main_key){
                    $table = $table->orWhere($sub_key, "=", $explode);
                  }
                  else{
                    $table = $table->orWhereHas($main_key, function($query) use ($sub_key, $explode){
                      $query->where($sub_key, "=", $explode);
                    });
                  }
                }
            }
          }
        }
      }

        //for($i = 0; count($selection); $i++){
        if($selection[0] == 'first'){
          $table = $table->take($selection[1]);
        }
        else if($selection[0] == 'last'){
          $table = $table->orderBy('id', 'desc');
          $table = $table->take($selection[1]);
        }
        //}


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