<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class M_Ongkir extends Model
    {
        protected $table = 'ongkir';
        protected $primaryKey = 'id_ongkir';

        protected $useAutoIncrement = true;
        protected $allowedFields = ['kec_asal', 'kec_tujuan', 'harga_ongkir'];

        public function getOngkir($kec_tujuan)
        {
            return $this->db->table('ongkir')->select('harga_ongkir')->where('kec_tujuan', $kec_tujuan)->get()->getRow();
        }

        
    }
?>