<?php


include_once($_SERVER['DOCUMENT_ROOT'] . "/CarService/src/models/DAO/DAO.php");

/**
 * Class CarDAO
*/
abstract class Car extends EntityBase
{
    
   /**
     * Protected variable
     * (PK)->Primary key
     * @var int $id
     */
   protected $id;
    
   public function getId() {return $this->id;}
    
   public function setId($id) {$this->id=$id;}

  /**
   * Protected variable
   * @var varchar $plate
   */
  protected $plaque;

  public function getPlate() {return $this->plaque;}

  public function setPlate($plaque) {$this->plaque=$plaque;}

  /**
   * Protected variable
   * @var varchar $password
   */
  protected $couleur;

  public function getColor() {return $this->couleur;}

  public function setColor($couleur) {$this->couleur=$couleur;}
  
  
  protected $marque;
  
  public function getBrand() {return $this->marque;}

  public function setBrand($marque) {$this->marque=$marque;}
  
  protected $modele;
  
  public function getModel() {return $this->modele;}

  public function setModel($modele) {$this->modele=$modele;}
  
  
  /**
   * Constructor
   * @var mixed $id
   */
  public function __construct()
  {
    parent::__construct();
    $this->table='voiture';
    $this->primkeys=['id'];
    $this->fields=[`id`, `plaque`, `couleur`, `marque`, `modele`];
    $this->sql="SELECT * FROM {$this->table}";    
  }

  // ==========!!!DO NOT PUT YOUR OWN CODE (BUSINESS LOGIC) HERE!!!========== //
  // EXTEND THIS DAO CLASS WITH YOUR OWN CLASS CONTAINING YOUR BUSINESS LOGIC //
  //  BECAUSE THIS CLASS FILE WILL BE OVERWRITTEN UPON EACH NEW PHPDAO BUILD  //
  // ======================================================================== //
}

