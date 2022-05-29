<?php
namespace App\Controllers;
use App\Models\ClientModel;
use App\Models\CitiesModel;

class ClientController extends BaseController
{
    public function indexGestion()
    {
        return view('gestionclient');
    }
    public function indexCreation(){
        return view('creationclient');
    }
    public function indexModification(){
        return view('modificationclient');
    }
    public function supprimer($id){
        $liste = new ClientModel();
        $liste->delete($id);
        return redirect()->to(base_url('gestionclient'))->with('status','Votre suppression a bien été effectuée');

    }
    public function modifier($id){
       
        $client = new ClientModel();
        $query = $client->query("SELECT * FROM CLIENT WHERE ID_CLIENT = ". $id);
        foreach($query->getResult() as $row){
            $data['id'] = $row->ID_CLIENT;
            $data['nom'] = $row->NOM;
            $data['prenom'] = $row->PRENOM;
            $data['ville'] = $row->VILLE;

        }
        return view('modificationclient',$data);
        //echo($id);
    }
    public function update($id){
        $ville = strtolower($this->request->getVar('ville'));
        $arrayReplace = array(" "," ", "e");
        $searchVal = array("'", "-", "è", "é");
        $slug = str_replace($searchVal, $arrayReplace, $ville);
        echo $slug;
        $client = new ClientModel();
        $client->find($id);
        $idville = new CitiesModel();
        $idville->select('ID');
        $idville->where('SLUG', $slug);
        $query = $idville->get(); 
        foreach($query->getResult() as $row){
            $id2 = $row->ID;
        }
        
        $data = [
            "ID_VILLE" => $id2,
            "NOM" => $this->request->getVar('firstname'),
            "PRENOM" => $this->request->getVar('lastname'),
            "VILLE" => $this->request->getVar('ville')
        ];
        $client->update($id, $data);
        return redirect()->to('/gestionclient');
    }
    public function insert(){
        $ville = strtolower($this->request->getVar('ville'));
        $arrayReplace = array(" "," ", "e");
        $searchVal = array("'", "-", "è", "é");
        $slug = str_replace($searchVal, $arrayReplace, $ville);
        echo $slug;
        $client = new ClientModel();
        $idville = new CitiesModel();
        $idville->select('ID');
        $idville->where('SLUG', $slug);
        $query = $idville->get();
        
        foreach($query->getResult() as $row){
            $id = $row->ID;
        }
        $data = [
            "ID_VILLE" => $id,
            "NOM" => $this->request->getVar('firstname'),
            "PRENOM" => $this->request->getVar('lastname'),
            "VILLE" => $this->request->getVar('ville')
        ];
        $client->insert($data);
        return redirect()->to('/gestionclient');
    }
    
}
