<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class ClientModel extends Model{
    protected $table = 'CLIENT';
    protected $primaryKey = 'ID_CLIENT';
    
    protected $allowedFields = [
        'ID_VILLE',
        'NOM',
        'PRENOM',
        'VILLE'
    ];
}