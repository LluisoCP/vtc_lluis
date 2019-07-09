<?php


class Vehicule extends Db {

    const TABLE_NAME = 'vehicule';

    protected $id;
    protected $marque;
    protected $modele;
    protected $couleur;
    protected $immatriculation;

    /* Setters */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setMarque($marque)
    {
        if (strlen($marque) < 3)
        {
            throw new Exception( "La marque doit contenir au moins 3 caractéres.");
        }
        if (strlen($marque) > 30)
        {
            throw new Exception("La marque est trop longue.");
        }
        $this->marque = $marque;
    }
    public function setModele($modele)
    {
        if (strlen($modele) == 0) 
        {
            throw new Exception("La modele doit contenir au moins 1 caractére.");
        }
        if (strlen($modele) > 30) 
        {
            throw new Exception("La modele est trop longue.");
        }
        $this->modele = $modele;
    }

    public function setCouleur($couleur)
    {
        if (strlen($couleur) == 0) {
                throw new Exception("La couleur doit contenir au moins 1 caractére.");
            }
        if (strlen($couleur) > 15) {
                throw new Exception("La couleur est trop longue.");
            }
        $this->couleur = $couleur;
    }
    public function setImmatriculation($immatriculation)
    {
        if (strlen($immatriculation) < 4) {
            throw new Exception("La immatriculation doit contenir au moins 4 caractéres.");
        }
        if (strlen($immatriculation) > 15) {
            throw new Exception("La immatriculation est trop longue.");
        }
        $this->immatriculation = $immatriculation;
    }

    /* Getters */
    public function getId()
    {
        return $this->id;
    }

    public function getMarque()
    {
        return $this->marque;
    }

    public function getModele()
    {
        return $this->modele;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    public function save()
    {
        $data = [
            'marque'            => $this->marque,
            'modele'            => $this->modele,
            'modele'            => $this->modele,
            'couleur'           => $this->couleur,
            'immatriculation'   => $this->immatriculation
        ];
        $id = $this->dbCreate(self::TABLE_NAME, $data);

        $this->id = $id;
        return $this;
    }

    public static function findAll()
    {
        $data = Db::dbFind(self::TABLE_NAME);
        $vehicules = [];
        foreach ($data as $d) {
            $vehicule = new Vehicule;
            $vehicule->setId($d['id']);
            $vehicule->setMarque($d['marque']);
            $vehicule->setModele($d['modele']);
            $vehicule->setCouleur($d['couleur']);
            $vehicule->setImmatriculation($d['immatriculation']);
            $vehicules[] = $vehicule;
        }
        return $vehicules;
    }

    public static function findOne(int $id)
    {
        $request = [
            ['id', '=', $id]
        ];
        $element = Db::dbFind(self::TABLE_NAME, $request);
        if (count($element) > 0) {
            $element = $element[0];
        } else {
            return;
        }

        $vehicule = new Vehicule;

        $vehicule->setId($element['id']);
        $vehicule->setMarque($element['marque']);
        $vehicule->setModele($element['modele']);
        $vehicule->setCouleur($element['couleur']);
        $vehicule->setImmatriculation($element['immatriculation']);


        return $vehicule;
    }


}