<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class M_Toko extends Model
    {
        protected $table = 'produk';
        protected $primaryKey = 'id_produk';

        protected $useAutoIncrement = true;
        protected $allowedFields = ['nama_produk', 'detail_produk', 'jumlah_stok'];

        public function getAllData()
        {
            // return $this->db->table('produk')->getWhere('deleted_at', NULL)->getResult(); 
            return $this->db->table('produk')->get()->getResult(); 
        }

        // public function deleteData($id)
        // {
        //     $query = "DELETE from produk where id_produk = $id";
        //     return $this->db->query($query); 
        // }

        public function getStok($id_produk)
        {
            return $this->db->table('produk')->select('jumlah_stok')->where('id_produk', $id_produk)->get()->getRow(); 
            // return $this->db->query($query); 
        }

        public function updateData($id_produk, $stok)
        {
            // $query = "UPDATE produk SET jumlah_stok = $stok WHERE id_produk = $id_produk";
            return $this->db->table('produk')->set('jumlah_stok', $stok)->where('id_produk', $id_produk)->update(); 
            // return $this->db->query($query); 
        }

        // public function search($keyword)
        // {
        //     // dd($this->db->table('kota')->like('nama_kota', $keyword));
        //     $query = "SELECT * from kota WHERE nama_kota LIKE '%$keyword%'";
        //     // dd($this->db->query($query)->getResult());
        //     return $this->db->query($query)->getResult();
        // }
    }
?>