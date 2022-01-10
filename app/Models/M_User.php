<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class M_User extends Model
    {
        protected $table = 'user';
        protected $primaryKey = 'no_anggota';

        protected $useAutoIncrement = true;
        protected $allowedFields = ['username', 'password'];

    }
?>