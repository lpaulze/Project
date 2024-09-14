
<?php
class Carte
{
	private $id;
    private $nom;
    private $image;
	private $numero;
	private $rarete;
	private $idSerie;


    public function __construct($id, $nom,$numero,$image,$rarete,$idSerie) {
		$this->id = $id;
		$this->nom = $nom;
		$this->image = $image;
		$this->numero = $numero;
		$this->rarete = $rarete;
		$this->idSerie = $idSerie;
	}

    public function __get($propriete) {
	switch ($propriete) {
		case 'id' : return $this->id; break;
		case "nom" : return $this->nom; break;
        case "image" : return $this->image; break;
		case "numero" : return $this->numero; break;
		case "rarete" : return $this->rarete; break;
		case "idSerie" : return $this->idSerie; break;
	    }
    }
    public function __set($propriete, $value) {
	switch ($propriete) {
		case "id" : $this->id = $value; break;
		case "nom" : $this->nom = $value; break;
        case "image" : $this->image = $value; break;
		case "numero" : $this->numero = $value; break;
		case "rarete" : $this->rarete = $value; break;
		case "idSerie" : $this->idSerie = $value; break;
	}
}
}
?>
