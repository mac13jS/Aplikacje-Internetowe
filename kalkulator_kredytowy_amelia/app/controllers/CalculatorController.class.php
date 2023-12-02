<?php

namespace app\controllers;

use core\App;
use app\forms\Data;
use core\ParamUtils;
use core\Utils;

class CalculatorController {
    private $data;
    private $result;

    public function __construct() {
        $this->data = new Data();
    }
    
    public function action_start() {   
        $this->generateView();  
    }
    
    public function action_calc() {
        $this->data->kredyt = ParamUtils::getFromRequest('kredyt');
        $this->data->oprocentowanie = ParamUtils::getFromRequest('oprocentowanie');
        $this->data->okres_kredytowania = ParamUtils::getFromRequest('okres_kredytowania');

        if($this->isValid()) {
            $this->oblicz();
        }

        $this->generateView();
    }

    private function isValid() {
        if (empty($this->data->kredyt)) {
            Utils::addErrorMessage('Nie podano kwoty kredytu');
        }
        if (empty($this->data->oprocentowanie)) {
            Utils::addErrorMessage('Nie podano oprocentowania kredytu');
        }
        if (empty($this->data->okres_kredytowania)) {
            Utils::addErrorMessage('Nie podano długości kredytu');
        }
        if (App::getMessages()->isError()){
            return false;
        }
        if (! is_numeric($this->data->kredyt)) {
            Utils::addErrorMessage('Kwota kredytu jest niepoprawna');
        }
        if (! is_numeric($this->data->oprocentowanie)) {
            Utils::addErrorMessage('Oprocentowanie kredytu jest niepoprawne');
        }
        if (! is_numeric($this->data->okres_kredytowania)) {
            Utils::addErrorMessage('Długość kredytu jest niepoprawna');
        }

        return !App::getMessages()->isError();
    }

    private function oblicz() {
        $kwota = intval($this->data->kredyt);
	    $oprocnetowanie = intval($this->data->oprocentowanie);
	    $okres = intval($this->data->okres_kredytowania);

	    if ($kwota <= 0) {
            Utils::addErrorMessage('Kwota kredytu jest ujemna');
	    }
	
	    if ($oprocnetowanie <= 0 || $oprocnetowanie >= 100) {
            Utils::addErrorMessage('Oprocentowanie jest niepoprawne');
	    }
	
	    if ($okres <= 0) {
            Utils::addErrorMessage('Długość kredytu jest ujemna');
	    }
        if (App::getMessages()->isError()){
            return;
        }
        
        $this->result = ($kwota + ($kwota * ($oprocnetowanie * $okres) / 100)) / ($okres * 12);

        Utils::addInfoMessage('Przekazano parametry');
        Utils::addInfoMessage('Parametry poprawne. Wykonuję obliczenia');

        App::getSmarty()->assign("result", $this->result);
    }

    private function generateView() {
        App::getSmarty()->assign("data", $this->data);
        App::getSmarty()->display("Calculator.tpl"); 
    }
}
