<?php
// sanitizer.php

class Sanitizer
{
  public static function limpar_dado($dado)
  {
    $dado = trim($dado);
    $dado = stripslashes($dado);
    $dado = htmlspecialchars($dado);
    return $dado;
  }
}

?>