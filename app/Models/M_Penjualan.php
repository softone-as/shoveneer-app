<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class M_Penjualan extends Model
    {
        protected $table = 'penjualan';
        protected $primaryKey = 'id_penjualan';

        protected $useAutoIncrement = true;
        protected $allowedFields = ['tanggal', 'nama', 'alamat', 'no_hp', 'kecamatan', 'kota', 'total_harga'];

        public function getAllData()
        {
            // return $this->db->table('produk')->getWhere('deleted_at', NULL)->getResult(); 
            return $this->db->table('produk')->get()->getResult(); 
        }

        public function getIdLast()
        {
            // return $this->db->table('produk')->getWhere('deleted_at', NULL)->getResult(); 
            // return $this->db->table('produk')->getLastQuery(); 
        }

        public function insertPenjualan()
        {
            
        }

    }
?>