<?php

class SearchController extends BaseController {
    //foo.com/search/project/email_category/foo@foo.com-admin@foo.com_spel+kod-game+code
    public function index($option, $key, $val, $pretty=false){
      $keys = explode('_', $key);
      $vals = explode('_', $val);
      $data = [];



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
              if (end($value) !== $string) {
                $table = $table->whereExists(function ($query) use ($option,$main_key, $sub_key, $explode) {
                  $query->from($main_key.'s')->where($main_key.'s.'.$sub_key, "=", $explode)->whereRaw($option.'s.'.$main_key.'_id' ."=". $main_key.'s.id');
                });
              }
              else{
                $table = $table->orWhereExists(function ($query) use ($option, $main_key, $sub_key, $explode) {
                  $query->from($main_key.'s')->where($main_key.'s.'.$sub_key, "=", $explode)->whereRaw($option.'s.'.$main_key.'_id'. "=". $main_key.'s.id');;
                });
              }
            }
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