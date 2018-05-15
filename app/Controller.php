<?php

class Controller{
    protected  $middleware=[];

    public function getMiddleware(){
        return $this->middleware;
    }
}