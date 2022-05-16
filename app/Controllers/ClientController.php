<?php
namespace App\Controllers;
use App\Models\ClientModel;

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
    public function update(){
        $client = new ClientModel();
        $id = $this->request->getVar('id');
        $data = [
            "NOM" => $this->request->getVar('firstname'),
            "PRENOM" => $this->request->getVar('lastname'),
            "VILLE" => $this->request->getVar('ville')
        ];
        $client->update($id, $data);
        return view('gestionclient');
    }
    
}
