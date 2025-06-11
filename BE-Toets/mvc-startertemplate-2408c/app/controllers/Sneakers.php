<?php

class Sneakers extends BaseController
{
    private $sneakersModel;

    public function __construct()
    {
         $this->sneakersModel = $this->model('SneakersModel');
    }

    public function index($message = 'none')
    {
       /**
        * Hier halen we alle smartphones op uit de database
        */
       $result = $this->sneakersModel->getAllSneakers();
       
       /**
        * Het $data-array geeft informatie mee aan de view-pagina
        */
       $data = [
            'title' => 'Overzicht sneakers',
            'sneakers' => $result,
            'message' => $message
       ];

         /**
          * Met de view-method uit de BaseController-class wordt de view
          * aangeroepen met de informatie uit het $data-array
          */
       $this->view('sneakers/index', $data); 
    }

        public function delete($Id)
    {
          $result = $this->sneakersModel->delete($Id);
          
          header('Refresh:3 ; url=' . URLROOT . '/sneakers/index');

          $this->index('flex');
    }


    public function create()
    {
          $data = [
               'title' => 'Nieuwe sneakers toevoegen',
               'message' => 'none'
          ];

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
               
               if (empty($_POST['merk']) || empty($_POST['model']) || empty($_POST['type']) || empty($_POST['prijs'])) {
                    echo '<div class="alert alert-danger text-center" role="alert"><h4>Vul alle velden in</h4></div>';
                    header('Refresh: 3; URL=' . URLROOT . '/sneakers/create');
                    exit;
               }

               $data['message'] = 'flex';

               $this->sneakersModel->create($_POST);
               
               header('Refresh: 3; URL=' . URLROOT . '/sneakers/index');
          }          

          $this->view('sneakers/create', $data);
    }

}