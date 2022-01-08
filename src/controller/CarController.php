<?php

require $_SERVER['DOCUMENT_ROOT'] . '/CarService/Autoloader.php';

class CarController{
    public function __construct()
    {
        Autoloader::register();
        $this->carDao = new CarDao;
    }

    public function displayCars(){
        $cars = $this->carDao->findAll();
        $tableHTML = '
        <table class="table table-hover">
						<thead>
							<tr>
							<th scope="col">Immatriculation</th>
							<th scope="col">Couleur</th>
							<th scope="col">Marque</th>
							<th scope="col">Modèle</th>
							<th scope="col">Effacer</th>
                            <th scope="col">Éditer</th>
							</tr>
						</thead>
						<tbody>';
        foreach($cars as $car){
            $tableHTML .= '<tr class="table-default" id="car'.$car->getId().'">';
            $tableHTML .= '<td>'.$car->getPlate().'</td>';
            $tableHTML .= '<td>'.$car->getColor().'</td>';
            $tableHTML .= '<td>'.$car->getBrand().'</td>';
            $tableHTML .= '<td>'.$car->getModel().'</td>';
            $tableHTML .= '<td><img class="icon" src="public/images/trash.png" alt="trash-icon" 
                onclick="deleteCar('.$car->getId().')"></td>';
            $tableHTML .= '<td><img class="icon" src="public/images/pencil.png" alt="edit-icon"
            onclick="editCar('.$car->getId().')"></td>';
            $tableHTML .= '</tr>';
        }
        $tableHTML .= '</tbody>
        </table>';
        
        return ["status" => "OK", "result" => $tableHTML, "cars" => $cars];

    }

    public function insertCar()
    {
        $id = $this->carDao->insertCar();
        return ["status" => "OK","id"=>$id,"plate" => $_POST["plaque"], "color" =>$_POST["couleur"], "brand" =>$_POST["marque"], "model" =>$_POST["modele"] ];
        
    }

    public function deleteCar($id)
    {
        return ["status" => ($this->carDao->deleteCar($id))? "OK" : "KO"];
    }

    public function editCar($id){
        $car = $this->carDao->findById($id);
        return ["status" => "OK", 
          "id" => $id,
          "plate" => $car[0]->getPlate(),
          "color" => $car[0]->getColor(),
          "brand" => $car[0]->getBrand(),
          "model" => $car[0]->getModel(),
        ];
    }

    public function updateCar($id){
        return ["status" => ($this->carDao->updateCar($id))? "OK" : "KO"];

    }

    public function dupliPlate($plate){
        return ["status" => ($this->carDao->dupliPlate($plate))];
    }
}


?>