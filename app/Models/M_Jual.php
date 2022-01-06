<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class M_Jual extends Model
    {
        protected $table = 'jual';
        protected $primaryKey = 'id_jual';

        protected $useAutoIncrement = true;
        protected $allowedFields = ['id_produk', 'jumlah_jual', 'harga'];

        public function getAllData()
        {
            // return $this->db->table('produk')->getWhere('deleted_at', NULL)->getResult(); 
            return $this->db->table('produk')->get()->getResult(); 
        }

        
    }
?>