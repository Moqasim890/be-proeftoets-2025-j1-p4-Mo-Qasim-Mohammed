<?php

class Sneakers extends BaseController
{
    private $sneakersModel;

    public function __construct()
    {
        $this->sneakersModel = $this->model('SneakersModel');
    }

    public function index()
    {
        // Sorteeropties via GET
        $orderBy = $_GET['orderBy'] ?? 'Prijs';
        $direction = $_GET['direction'] ?? 'DESC';

        $results = $this->sneakersModel->getAllSneakers($orderBy, $direction);

        $data = [
            'title' => 'Overzicht Sneakers',
            'sneakers' => $results,
            'orderBy' => $orderBy,
            'direction' => $direction
        ];

        $this->view('sneakers/index', $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'merk'  => trim($_POST['merk']),
                'model' => trim($_POST['model']),
                'type'  => trim($_POST['type']),
                'prijs' => trim($_POST['prijs']),
            ];

            if ($this->sneakersModel->createSneaker($data)) {
                header("Location: " . URLROOT . "/sneakers/index");
                exit;
            } else {
                die('Fout bij het toevoegen van sneaker');
            }
        } else {
            $data = [
                'title' => 'Nieuwe Sneaker toevoegen'
            ];

            $this->view('sneakers/create', $data);
        }
    }

    public function delete($id)
    {
        if ($this->sneakersModel->deleteSneaker($id)) {
            header("Location: " . URLROOT . "/sneakers/index");
            exit;
        } else {
            die('Fout bij verwijderen sneaker');
        }
    }
}
