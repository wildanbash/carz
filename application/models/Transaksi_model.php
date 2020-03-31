<?php 

class transaksi_model extends CI_Model{
    public function get_data($table){
        $query = $this->db->get($table);
        return $query;
    }

    public function get_data_transaksi(){
        $this->db->select('transaksi.id_transaksi, transaksi.id_mobil, user.nama, transaksi.tanggal_sewa, transaksi.tanggal_kembali, transaksi.total_sewa, transaksi.status, transaksi.status_pembayaran, transaksi.bukti_pembayaran');
        $this->db->from('transaksi');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $query = $this->db->get();
        return $query;
    }

    public function get_data_mobil($table){
        $this->db->where('status', 1);
        $query = $this->db->get($table);
        return $query;
    }

    public function get_data_type(){
        $this->db->select('transaksi.id_transaksi, transaksi.id_type, transaksi.total_sewa, transaksi.id_type, transaksi.merk, transaksi.no_plat, transaksi.warna, transaksi.tahun, transaksi.status, transaksi.gambar, type.id_type, type.kode_type, type.nama_type, transaksi.status_pembayaran, transaksi.bukti_pembayaran');
        $this->db->from('transaksi');
        $this->db->join('type', 'transaksi.id_type = type.id_type');
        $query = $this->db->get();
        return $query;
    }

    public function insert_data($data, $table){
        $this->db->insert($table,$data);
    }

    public function edit_data($table, $data, $where){
        $this->db->update($table, $data, $where);
    }

    public function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function ambil_id_transaksi_delete($id){
        $this->db->select('*');
        $this->db->from('transaksi');
        $hasil = $this->db->where('id_transaksi', $id)->get();

        if($hasil->num_rows() > 0){
            return $hasil->result_array();
        }else{
            return false;
        }
    }

    public function ambil_id_transaksi($id){
        $this->db->select('transaksi.id_transaksi, transaksi.id_type, transaksi.id_type, transaksi.merk, transaksi.no_plat, transaksi.warna, transaksi.tahun, transaksi.status, transaksi.gambar, type.id_type, type.kode_type, type.nama_type');
        $this->db->from('transaksi');
        $this->db->join('type', 'transaksi.id_type = type.id_type');
        $hasil = $this->db->where('id_transaksi', $id)->get();

        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }

    var $API = "";

    public function update_status_tersedia($id_mobil){
        $this->API="http://localhost/rentalmobil/api/mobil";
        if(empty($id_mobil)){
            redirect('home');
        }else{
            $params = array('id_mobil' =>  $id_mobil);
            $data['mobil'] = json_decode($this->curl->simple_get($this->API, $params), TRUE);
            // echo "<script type='text/javascript'> alert('".print_r($data['mobil'])."') </script>";
            foreach ($data['mobil'] as $m) {
                $data = array(
                    'id_mobil'=>$m[0]['id_mobil'],
                    'status'=>'1'
                );
            }     

            $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10)); 
        }
    }

    public function update_status_disewa($id_mobil){
        $this->API="http://localhost/rentalmobil/api/mobil";
        if(empty($id_mobil)){
            redirect('home');
        }else{
            $params = array('id_mobil' =>  $id_mobil);
            $data['mobil'] = json_decode($this->curl->simple_get($this->API, $params), TRUE);
            // echo "<script type='text/javascript'> alert('".print_r($data['mobil'])."') </script>";
            foreach ($data['mobil'] as $m) {
                $data = array(
                    'id_mobil'=>$m[0]['id_mobil'],
                    'status'=>'0'
                );
            }     

            $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10)); 
        }
    }

    public function update_status_tersedia_admin($id_mobil){
        $this->API="http://localhost/rentalmobil/api/mobil";
        if(empty($id_mobil)){
            redirect('admin/dashboard');
        }else{
            $params = array('id_mobil' =>  $id_mobil);
            $data['mobil'] = json_decode($this->curl->simple_get($this->API, $params), TRUE);
            // echo "<script type='text/javascript'> alert('".print_r($data['mobil'])."') </script>";
            foreach ($data['mobil'] as $m) {
                $data = array(
                    'id_mobil'=>$m[0]['id_mobil'],
                    'status'=>'1'
                );
            }     

            $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10)); 
        }
    }

    public function update_status_disewa_admin($id_mobil){
        
        $this->API="http://localhost/rentalmobil/api/mobil";
        if(empty($id_mobil)){
            redirect('admin/dashboard');
        }else{
            $params = array('id_mobil' =>  $id_mobil);
            $data['mobil'] = json_decode($this->curl->simple_get($this->API, $params), TRUE);
            // echo "<script type='text/javascript'> alert('".print_r($data['mobil'])."') </script>";
            foreach ($data['mobil'] as $m) {
                $data = array(
                    'id_mobil'=>$m[0]['id_mobil'],
                    'status'=>'0'
                );
            }     

            $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10)); 
        }
    }



}

?>