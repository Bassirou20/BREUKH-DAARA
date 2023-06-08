<?php


class MotherController{
    public function render($nomVue)
    {
        // $data=$donnee;
        require_once ("../VIEW/".$nomVue.".html.php"); 
    }

}