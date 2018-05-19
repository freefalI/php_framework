<?php
 
class AdminController  extends Controller
{
    
   protected $middleware=["Auth"];

    /* function __construct(){
          echo "This is the main controller!";
         parent::__construct();
     }*/


    public function index(){
        echo  output('admin/editor', []); 
    }

}
// GET -select
// POST — insert
// PUT -update
// DELETE — 