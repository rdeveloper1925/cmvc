<?php

use App\Libraries\Controller;
class Pages extends Controller
{
    public function index(){
        $this->view('index',['welcome'=>"Helloooo"]);
    }
    public function show($id){
        echo "pages view ".$id;
    }
}