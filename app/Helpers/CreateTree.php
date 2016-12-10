<?php

namespace App\Helpers;

class CreateTree{

public static $list = array(
 array('id'=>1,'name'=>'Clothing','parent_id'=>null),
 array('id'=>2,'name'=>'Men\'s','parent_id'=>1),
 array('id'=>12,'name'=>'Car','parent_id'=>null),
 array('id'=>3,'name'=>'Women\'s','parent_id'=>1),
 array('id'=>4,'name'=>'Suits','parent_id'=>2),
 array('id'=>5,'name'=>'Slacks','parent_id'=>4),
 array('id'=>6,'name'=>'Jackets','parent_id'=>4),
 array('id'=>7,'name'=>'Dresses','parent_id'=>3),
 array('id'=>8,'name'=>'Skirts','parent_id'=>3),
 array('id'=>9,'name'=>'Blouses','parent_id'=>3),
 array('id'=>10,'name'=>'Evening Gorws','parent_id'=>7),
 array('id'=>11,'name'=>'Sun Dresses','parent_id'=>7),
);

public static function create_list($list, $parent_id = null){
  $html = '<ul>';
  foreach($list as $key => $row){
    if($row['parent_id'] == $parent_id){
        $html .= '<li id='. $row['id'] .'>'. $row['name'] . self::create_list($list, $row['id']) .'</li>';
        var_dump($html);
        echo '<br>';
    //    echo $html;
    }
  }
  $html .= '</ul>';
  if ( strpos($html, '</li>')===false){
    $html = '';
  }
  return $html;
}

}