<?php
 
class AdminController  extends Controller
{
    
   protected $middleware=["Auth"];

    /* function __construct(){
          echo "This is the main controller!";
         parent::__construct();
     }*/


    public function index(){
       
        echo  output('editor/editor', []); 
    }
    public function choose_table(){
       
        echo  output('editor/choose_table', []); 
    }


}
// GET -select
// POST — insert
// PUT -update
// DELETE — 