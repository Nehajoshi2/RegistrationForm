<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // tanle name
    protected $primaryKey = 'id'; //primary key
   
   protected $allowedFields = ['full_name', 'city', 'education', 'gmail', 'registration_date'];//all columns of table

}
