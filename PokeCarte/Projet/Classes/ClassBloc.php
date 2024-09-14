
<?php
class Bloc
{
	private $id;
    private $nom;

    public function __construct($id, $nom) {
		$this->id = $id;
		$this->nom = $nom;;
	}

    public function __get($propriete) {
	switch ($propriete) {
		case "id" : return $this->id; break;
		case "nom" : return $this->nom; break;
	    }
    }
    public function __set($propriete, $value) {
	switch ($propriete) {
		case "id" : $this->id = $value; break;
		case "nom" : $this->nom = $value; break;
	}
}
}
?>
