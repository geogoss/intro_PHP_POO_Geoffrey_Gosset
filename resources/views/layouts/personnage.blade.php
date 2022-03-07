<?php

class Personnage
{
    // Attributs
    private $_force;
    private $_classe = 'plombier';
    private $_couleurCasquette = 'Rouge';
    private $_vie = 100;
    private $_nom = 'unknow';

    // constructeur
    public function __construct($nom, $force, $couleur)
    {
        $this->_nom = $nom;
        $this->setForce($force);
        $this->setCouleurCasquette($couleur);
    }


    // Méthodes -> simples fonctions
    public function getForce()
    {
        return $this->_force;
    }
    public function setForce($force)
    {
        $this->_force = $force;
    }
    public function getCouleurCasquette()
    {
        return $this->_couleurCasquette;
    }
    public function setCouleurCasquette($couleur)
    {
        $this->_couleurCasquette = $couleur;
    }

    public function getClasse()
    {
        return $this->_classe;
    }

    public function getInfo()
    {
        return '<h4 class="text-center m-5">' . $this->_nom . ' à une force définie aléatoirement. Il a la classe ' . $this->_classe . ' et a une casquette de couleur ' . $this->_couleurCasquette . '.</h4>';
    }

    public function frapper(Personnage $personnage)
    {
        echo "<p class='text-center'>". "<span class='text-warning'>" .$this->_nom. "</span>"." va frapper ". $personnage->_nom. ".</p>";
        $this->_force = rand(1, 50);
        return $personnage->recevoirDegat($this->_force);
    }
    public function recevoirDegat($force)
    {
        $this->_vie = $this->_vie - $force;

        if ($this->_vie <= 0) {
            echo '<p class="text-center">' . $this->_nom . ' a perdu ' . $force . ' points de vie. Il a succombé à ses blessures </p>';
        } else {
            echo '<p class="text-center">' . $this->_nom . ' a perdu ' . $force . ' points de vie. Il lui reste ' . $this->_vie . ' points.</p>';
        }
    }

    public function getVie()
    {
        return $this->_vie;
    }
}

// on crée une instance de notre classe personnage, on crée un objet de notre classe personnage
$mario = new Personnage('Mario', 45, 'rouge');
$luigi = new Personnage('Luigi', 40, 'verte');

echo $mario->getInfo();
echo $luigi->getInfo();

do {
    $mario->frapper($luigi);
    $luigi->frapper($mario);
} while ($mario->getVie() > 0 && $luigi->getVie() > 0);


// modifier la force de Mario
// $mario->setForce(10);
// echo $mario->getForce();

// savoir la classe de mario
// echo $mario->getClasse();

// présentation du personnage mario
// echo $mario->getInfo();
// echo $mario->getForce();
