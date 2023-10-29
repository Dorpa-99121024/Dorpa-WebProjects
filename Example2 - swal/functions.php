<?php 
function dd($a)
{
  echo '<pre>';
  var_dump($a);
  die;
}
function connect_to_mysql()
{
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $connection = new mysqli($servername, $username, $password);

  // Check connection
  if ($connection->connect_error) {
    return false;
  }
  return $connection;

}
function get_lessons_in_this_time($asatid_lessons, $lessons, $asatid ,$k)
{
  $cell = "";
  foreach($asatid_lessons as $asatid_id => $lesson_ids){
    foreach($lesson_ids as $lesson_id){
        $program = $lessons[$lesson_id]['program'];
        if(in_array($k,$program)){
            $cell .= $lessons[$lesson_id]['title'].' ('.$asatid[$asatid_id]['name'].')';
        } 
    }
  }
  return $cell;
}
