
<?php
class Bloc
{
	private $id;
    private $login;
    private $mdp;
	private $role;

    public function __construct($id, $login,$mdp,$role) {
		$this->id = $id;
		$this->login = $login;
		$this->mdp = $mdp;
		$this->role = $role;
	}

    public function __get($propriete) {
	switch ($propriete) {
		case 'id' : return $this->id; break;
		case "login" : return $this->login; break;
        case "mdp" : return $this->mdp; break;
		case "langue" : return $this->langue; break;
	    }
    }
    public function __set($propriete, $value) {
	switch ($propriete) {
		case "id" : $this->id = $value; break;
		case "login" : $this->login = $value; break;
        case "mdp" : $this->mdp = $value; break;
		case "role" : $this->role = $value; break;
	}
}
}
?>
