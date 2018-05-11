<?php
 
class AdminController
{
    /* function __construct(){
          echo "This is the main controller!";
         parent::__construct();
     }*/

    public function index(){
        echo  output('admin/index', []);
    }
}
