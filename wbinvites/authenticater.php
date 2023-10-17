<?php
class authenticater
{
    
  function   authenticater_1($username,$password)
  {
      $cond=false;
      if(($username==="admin")and ($password==="admin"))
      {
          $cond=true;
      }
      
      return $cond;
  }
    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

