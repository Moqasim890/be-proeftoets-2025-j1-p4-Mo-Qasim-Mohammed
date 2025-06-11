<?php

class Zangeressen extends BaseController
{
    private $zangeressenModel;

    public function __construct()
    {
        $this->zangeressenModel = $this->model('ZangeressenModel');
    }

    public function index()
    {
        /**
         * Je roept de method getAllSmartphones aan van de smartphoneModel class
         */
        $results = $this->zangeressenModel->getAllSingers();
        
        $data = [
            'title' => 'Top 5 rijkste zangeressen ter wereld',
            'zangeressen' => $results
        ];

        $this->view('zangeressen/index', $data);
    }

    public function delete($id)
    {
        $result = $this->zangeressenModel->delete($id);

        $data = [
            'message'=> 'Het record is verwijderd!',
        ];
        
        $this->view('zangeressen/delete', $data);
        header('Refresh:3 ; url=' . URLROOT . '/zangeressen/index');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if (
                empty($_POST['naam']) || 
                empty($_POST['nettowaarde']) || 
                empty($_POST['land']) || 
                empty($_POST['mobiel']) || 
                empty($_POST['leeftijd']))
            {
                echo "<div class='alert alert-danger text-center'><h5>Niet alle velden zijn ingevuld!</h5></div>";
                header('Refresh:3 ; url=' . URLROOT . '/zangeressen/create');
                
            } else {
                $result = $this->zangeressenModel->insertZangeres($_POST);
                echo "<div class='alert alert-success text-center'><h5>De zangeres is ingevoerd</h5></div>";
                header ('Refresh:3 ; url=' . URLROOT . '/zangeressen/index');

            }



        }


        $data = [
            'title' => 'Nieuwe zangeres toevoegen'
        ];

        $this->view('zangeressen/create', $data);
    }

    public function update($id = NULL)
    {
        $data = [
            'title' => 'Wijzig de zangeres'
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $result = $this->zangeressenModel->updateZangeresById($_POST);
            $id = $_POST['id'];
            header('Refresh:3 ; url=' . URLROOT . '/zangeressen/index');
        }

        $result = $this->zangeressenModel->getZangeresById($id);

        $data['zangeressen'] = $result;

        $this->view('zangeressen/update', $data);
    }
}