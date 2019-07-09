<?php


class Conducteur extends Db
{

    const TABLE_NAME = 'conducteur';

    protected $id;
    protected $prenom;
    protected $nom;

    /* Setters */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPrenom($prenom)
    {
        if (strlen($prenom) < 3)
        {
                throw new Exception( "Le prénom doit contenir au moins 3 caractéres.");
        }
        if (strlen($prenom) > 30)
        {
                throw new Exception("Le prénom est trop longue.");
        }
        $this->prenom = $prenom;
    }
    public function setNom($nom)
    {
        if (strlen($nom) < 3)
        {
                throw new Exception("Le nom doit contenir au moins 3 caractéres.");
        }
        if (strlen($nom) > 30)
        {
                throw new Exception("Le nom est trop longue.");
        }
        $this->nom = $nom;
    }

    /* Getters */
    public function getId()
    {
        return $this->id;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }


    public function save()
    {
        $data = [
            'nom'    => $this->nom,
            'prenom' => $this->prenom
        ];
        $id = $this->dbCreate(self::TABLE_NAME, $data);

        $this->id = $id;
        return $this;
    }

    public static function findAll()
    {
        $data = Db::dbFind(self::TABLE_NAME);
        $conducteurs = [];
        foreach ($data as $d) {
            $conducteur = new Conducteur;
            $conducteur->setId($d['id']);
            $conducteur->setPrenom($d['prenom']);
            $conducteur->setNom($d['nom']);
            $conducteurs[] = $conducteur;
        }
        return $conducteurs;
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

        $conducteur = new Conducteur;

        $conducteur->setId($element['id']);
        $conducteur->setPrenom($element['prenom']);
        $conducteur->setNom($element['nom']);


        return $conducteur;
    }


}
