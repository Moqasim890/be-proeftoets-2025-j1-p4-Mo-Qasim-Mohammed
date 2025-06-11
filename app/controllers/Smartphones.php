<?php

class Smartphones extends BaseController
{
    private $smartphoneModel;

    public function __construct()
    {
        $this->smartphoneModel = $this->model('SmartphonesModel');
    }

    public function index()
    {
        /**
         * Je roept de method getAllSmartphones aan van de smartphoneModel class
         */
        $results = $this->smartphoneModel->getAllSmartphones();
        
        $data = [
            'title' => 'Smartphones',
            'smartphones' => $results
        ];

        $this->view('smartphones/index', $data);
    }
}