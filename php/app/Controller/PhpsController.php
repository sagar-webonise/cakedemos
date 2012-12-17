<?php
App::uses('AppController', 'Controller');

class PhpsController extends AppController
{

    /*
     * Created By : Sagar Shirsath
     * Emial : sagars@weboniselab.com
     * created on : 4/12/2012
     * method name: index()
     *
     */

    public function index(){

    }

    public function crunchable(){
        $data = file_get_contents('http://api.crunchbase.com/v/1/company/emapia.js?api_key=3qaeu2t5v3594e9qsjjbfqcw');
        pr(json_decode($data));
        die;
    }

}