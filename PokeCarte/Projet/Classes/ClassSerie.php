
<?php
class Serie
{
	private $id;
    private $nom;
    private $image;
	private $stamp;
	private $idBloc;
	private $langue;

    public function __construct($id, $nom,$image,$stamp,$idBloc,$langue) {
		$this->id = $id;
		$this->nom = $nom;
		$this->image = $image;
		$this->stamp = $stamp;
		$this->idBloc = $idBloc;
		$this->langue = $langue;
	}

    public function __get($propriete) {
	switch ($propriete) {
		case 'id' : return $this->id; break;
		case "nom" : return $this->nom; break;
        case "image" : return $this->image; break;
		case "stamp" : return $this->stamp; break;
		case "idBloc" : return $this->idBloc; break;
		case "langue" : return $this->langue; break;
	    }
    }
    public function __set($propriete, $value) {
	switch ($propriete) {
		case "id" : $this->id = $value; break;
		case "nom" : $this->nom = $value; break;
        case "image" : $this->image = $value; break;
		case "stamp" : $this->stamp = $value; break;
		case "idBloc" : $this->idBloc = $value; break;
		case "langue" : $this->langue = $value; break;
	}
}
}
?>
