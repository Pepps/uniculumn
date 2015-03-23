<?php
/*
* Author: Dennis Magnusson
* Email: dennisMagnusson_4@hotmail.com
* Git: Denaton
*/

class SearchController extends BaseController {
    // Code Reference
    //foo.com/search/project/users-email_project-category/foo@foo.com-admin@foo.com_spel+kod-game+code
    // $option = main value of what you are filtering, example Projects
    // $key = you do your filtering based on these keys, separate with _ and do table-column (combine with -)
    // $val = values in those columns, for each $key you have you need a _ to separate and you may have more then one for each key, + = and - = or
    // $extra = first2 get the first 2, last4 gets the last 4.
    // $pretty = if you want the json output to look flashy as Rarity!
    public function index($option, $key, $val, $extra='', $pretty=false){
      // Split all the keys in to an arrays so we can use them in a loop
      $keys = explode('_', $key);
      // Split all the values in to an array for each key.
      $vals = explode('_', $val);
      // Data is an array of object (JSON) with keys and values
      $data = [];
      // The data to search for, the name of the user or a word in a title.
      $selection = [];
      // Extra optional stuff like first 10 and last 3
      $extras = explode('_', $extra);

      // Loop all the extra stuff in to the array.
      foreach($extras as $extra){
        $selection = explode('-',$extra);
      }

      // Loop all keys in to the data array.
      for($i = 0; $i < sizeof($keys); $i++){
        $key = explode('-',$keys[$i]);
        $data[$key[0]][$key[1]] = explode('-', $vals[$i]);
      }

      // Get all rows in option table, but we are going to sort things out before calling it with ->get();
      $model = studly_case(urldecode($option));
      // Create the query with the name of the option.
      $table = new $model;

      // Start the first loop for each key in the data we just created. ex user
      foreach($data as $main_key => $sub_key) {
        // Start an other loop with all the inner keys. ex email
        foreach ($sub_key as $sub_key => $value){
          // Start an other loop for each value in that sub key ex foo@foo.com
          foreach ($value as $string) {
            // If there is an AND value in the url we define this with a + and here we splice it.
            $split = explode('+', $string);
            // Loop all the AND values as a group.
            foreach ($split as $explode) {
                // If the value is not the last value or if the length of the value is only one we don't need to go in here.
                if (end($value) !== $string || count($value) == 1) {
                    // If the main key (ex project) is the same as the key we are checking (user) we don't need to use pivot. *1
                    if($option == $main_key){
                      $table = whereContain($table,$sub_key, $explode);
                    }
                    // Else we need to use pivot and here we call the user reference table in project as an example. *2
                    else{
                      $table = $table->whereHas($main_key, function($query) use ($sub_key, $explode){
                          whereContain($query,$sub_key, $explode);
                      });
                    }
                }
                // If it is the last in that slice we need an or in the where
                else{
                  // The pivot thingy again, reference to *1
                  if($option == $main_key){
                    $table = whereContain($table,$sub_key, $explode,'orWhere');
                  }
                  // The pivot thingy again, reference to *2
                  else{
                    $table = $table->orWhereHas($main_key, function($query) use ($sub_key, $explode){
                        whereContain($query,$sub_key, $explode);
                    });
                  }
                }
            }
          }
        }
      }
      // Fetch the first X in the leftovers in the query.
      if($selection[0] == 'first'){
        $table = $table->take($selection[1]);
      }
      // Fetch the last x in the leftovers in the query.
      else if($selection[0] == 'last'){
        $table = $table->orderBy('id', 'desc');
        $table = $table->take($selection[1]);
          // Don't know how to reverse here!
      }

      // How to display the return. if pretty, its is more readable.
      if($pretty){
        echo '<pre>'.json_encode($table->get(),JSON_PRETTY_PRINT).'</pre>'; // Runs the query we have build up.
      }
      else{
        echo json_encode($table->get()); // Runs the query we have build up.
      }

      // Debug helps you to find what went wrong. Print all the query's.
      if(Input::get('debug') == 'true'){
        $queries = DB::getQueryLog();
        echo "<pre>" . json_encode($queries,JSON_PRETTY_PRINT) . "</pre>";
        echo '<pre>"' . $option . '": ' . json_encode($data,JSON_PRETTY_PRINT) . "</pre>";
      }
    }
}

// Optional stuff on search arguments, the only static part of this script.
// $table = the Query, $sub_key = what column to check, $explode = What to check in that column, $where = if its a orWhere or where basically.
function whereContain($table, $sub_key,$explode, $where='where'){
  // Check the first char in the value
  $firstChar = substr($explode, 0, 1);
  // Check the last char in the value
  $lastChar = substr($explode, sizeof($explode)+1, 1);

  // remove the first or last char if it is the given char
  $explode = ltrim($explode,'~');
  $explode = ltrim($explode,'!');
  $explode = rtrim($explode,'!');

  // Timestamp fix since we can't use _ in the url, but we can't use - either and the timestamp use that in the value soo... yeah.
  if($sub_key == 'created' || $sub_key == 'updated'){ // Timestamp are messing with me.
      $sub_key = $sub_key.'_at';
  }

  // ~ is if it contains the given value
  if($firstChar == '~'){
    return $table->$where($sub_key, "LIKE", "%".$explode."%");
  }
  // ! before a value get all the values that are less and equal to.
  else if($firstChar == '!'){
    return $table->$where($sub_key, "<=", $explode);
  }
  // ! after a value get all the values that are higher and equal to.
  else if($lastChar == '!'){
    return $table->$where($sub_key, ">=", $explode);
  }
  // Standard value if it has none of the above.
  else{
    return $table->$where($sub_key, "=", $explode);
  }
}
