<?php
/**
 *  Load php files
 *
 * @since 6.0
 */
class swd_Autload
{
  // load php files
    function autoload(){
      $files = func_get_args();
      $dir = array_shift($files); //first is always the dir
      $includefiles = $files;
        foreach ($includefiles as $file) {
          if ( file_exists( dirname(__FILE__) . '/' . $dir . '/' . $file. '.php' ) ) {
            require_once( dirname(__FILE__) . '/' . $dir . '/' . $file. '.php' );
          }
        }#foreach
      }
}
