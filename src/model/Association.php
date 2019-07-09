<?php


class Association extends Db
{

    const TABLE_NAME = 'association_vehicule_conducteur';

    protected $id;
    protected $id_conducteur;
    protected $id_vehicule;

    /* Setters */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setConducteurId($id)
    {
        $regex = '/^\d+$/';
        if (!preg_match($regex, $id))
        {
            throw new Exception("L'id doit être un nombre entier.");
        }

        $this->id_conducteur = $id;
    }
    public function setVehiculeId($id)
    {
        $regex = '/^\d+$/';
        if (!preg_match($regex, $id)) {
                throw new Exception("L'id doit être un nombre entier.");
            }

        $this->id_vehicule = $id;
    }


    /* Getters */
    public function getId()
    {
        return $this->id;
    }

    public function getConducteurId()
    {
        return $this->id_conducteur;
    }

    public function getVehiculeId()
    {
        return $this->id_vehicule;
    }


    public function save()
    {
        $data = [
            'id_conducteur'  => $this->id_conducteur,
            'id_vehicule'    => $this->id_vehicule
        ];
        $id = $this->dbCreate(self::TABLE_NAME, $data);

        $this->id = $id;
        return $this;
    }

    public static function findAll()
    {
        $data = Db::dbFind(self::TABLE_NAME);
        $associations = [];
        foreach ($data as $d) {
            $association = new Association;
            $association->setConducteurId($d['id_conducteur']);
            $association->setVehiculeId($d['id_vehicule']);
            $associations[] = $association;
        }
        return $associations;
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

        $association = new Association;

        $association->setId($element['id']);
        $association->setCondcuteurId($element['id_conducteur']);
        $association->setVehiculeId($element[ 'id_vehicule']);


        return $association;
    }

    public function getConducteur()
    {
        $conducteur = Conducteur::findOne($this->getConducteurId());
        return $conducteur;
    }

    public function getVehicule()
    {
        $vehicule = Vehicule::findOne($this->getVehiculeId());
        return $vehicule;
    }
    public function update()
    {
        if ($this->id > 0) {
            $data = [
                'id'                => $this->getId(),
                'id_conducteur'     => $this->getConducteurId(),
                'id_vehicule'       => $this->getVehiculeId()
            ];
            Db::dbUpdate(self::TABLE_NAME, $data);

            return $this;
        }
        return;
    }

    public function delete()
    {
        $data = [
            'id'    => $this->getId()
        ];
        Db::dbDelete(self::TABLE_NAME, $data);

        return;
    }


}
