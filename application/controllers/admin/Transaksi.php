<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    var $API = "";

    function __construct() {
        parent::__construct();
        $this->API="http://localhost/rentalmobil/api/mobil";
        $this->load->library('curl');
        $this->load->model('transaksi_model');
        $this->load->model('user_model');
        check_not_login();
        check_admin();
    }

    public function menunggu_pembayaran(){
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();
        $data['user'] = $this->transaksi_model->get_data('user')->result();
        $data['mobil'] = json_decode($this->curl->simple_get($this->API));
        $this->load->view('template/admin/header');
        $this->load->view('admin/transaksi_menunggu_pembayaran', $data);
        $this->load->view('template/admin/footer');
    }

    public function menunggu_konfirmasi(){
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();
        $data['user'] = $this->transaksi_model->get_data('user')->result();
        $data['mobil'] = json_decode($this->curl->simple_get($this->API));
        $this->load->view('template/admin/header');
        $this->load->view('admin/transaksi_menunggu_konfirmasi', $data);
        $this->load->view('template/admin/footer');
    }
    
    public function disewa(){
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();
        $data['user'] = $this->transaksi_model->get_data('user')->result();
        $data['mobil'] = json_decode($this->curl->simple_get($this->API));
        $this->load->view('template/admin/header');
        $this->load->view('admin/transaksi_sedang_disewa', $data);
        $this->load->view('template/admin/footer');
    }

    public function selesai(){
        $data['transaksi'] = $this->transaksi_model->get_data_transaksi()->result();
        $data['user'] = $this->transaksi_model->get_data('user')->result();
        $data['mobil'] = json_decode($this->curl->simple_get($this->API));
        $this->load->view('template/admin/header');
        $this->load->view('admin/transaksi_selesai', $data);
        $this->load->view('template/admin/footer');
    }



    public function update_status_tersedia($id_mobil){
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
            if($update)
            {
                // $this->session->set_flashdata('hasil','Update Data Berhasil');
                echo "<script type='text/javascript'> alert('Update Data Berhasil')</script>";
            }else
            {
            //    $this->session->set_flashdata('hasil','Update Data Gagal');
                echo "<script type='text/javascript'> alert('Update Data Gagal')</script>";
            }
            // redirect('admin/dashboard');
            echo "<script>window.location='".base_url('admin/dashboard')."';</script>";
        }
    }

    public function update_status_disewa($id_mobil){
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
            if($update)
            {
                // $this->session->set_flashdata('hasil','Update Data Berhasil');
                echo "<script type='text/javascript'> alert('Update Data Berhasil')</script>";
            }else
            {
            //    $this->session->set_flashdata('hasil','Update Data Gagal');
                echo "<script type='text/javascript'> alert('Update Data Gagal')</script>";
            }
            // redirect('admin/dashboard');
            echo "<script>window.location='".base_url('admin/dashboard')."';</script>";
        }
    }

    public function tambah_transaksi_simpan(){    
        $id_transaksi = $this->input->post('id_transaksi');
        $id_user = $this->input->post('id_user');
        $id_mobil = $this->input->post('id_mobil');
        $tanggal_sewa = strtotime($this->input->post('tgl_sewa'));
        $tanggal_sewa = date("Y-m-d", $tanggal_sewa);
        $tanggal_kembali = strtotime($this->input->post('tgl_kembali'));
        $tanggal_kembali = date("Y-m-d", $tanggal_kembali);
        $harga_mobil = $this->input->post('harga');
        $selisih_hari=((abs(strtotime($tanggal_sewa) - strtotime($tanggal_kembali)))/(60*60*24));
        $total_sewa = $harga_mobil*$selisih_hari;
        $status = $this->input->post('status');
        $status_pembayaran = 2; 

        $data = array(
            'id_transaksi' => $id_transaksi,
            'id_user' => $id_user,
            'id_mobil' => $id_mobil,
            'tanggal_sewa' => $tanggal_sewa,
            'tanggal_kembali' => $tanggal_kembali,
            'total_sewa' => $total_sewa,
            'status' => $status,
            'status_pembayaran' => $status_pembayaran
        );

        $this->transaksi_model->insert_data($data,'transaksi');

        if($status == 1){
            $this->transaksi_model->update_status_disewa($id_mobil);
        }else{
            $this->transaksi_model->update_status_tersedia($id_mobil);
        }
        $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data transaksi Berhasil Ditambahkan
            <button transaksi="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/transaksi/selesai');
        
    }

    public function edit_transaksi($id){
        $where = array('id_transaksi'=> $id);
        $data['user'] = $this->transaksi_model->get_data('user')->result();
        $this->db->select('transaksi.id_transaksi, transaksi.id_user, transaksi.id_mobil , user.nama, transaksi.tanggal_sewa, transaksi.tanggal_kembali, transaksi.status');
        $this->db->from('transaksi');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->where('id_transaksi', $id);
        $data['transaksi'] = $this->db->get()->result();
        foreach($data['transaksi'] as $d){
            $id_mobil = $d->id_mobil;
        }
        $curl = curl_init();
        // echo "<script>alert($id_mobil)</script>";
        curl_setopt($curl, CURLOPT_URL, 'http://localhost/rentalmobil/api/mobil'.'?id_mobil='.$id_mobil);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $mobil = json_decode($result);
        curl_close($curl);
        $data['mobil'] = $mobil->data;
        $all_mobil = json_decode($this->curl->simple_get($this->API));
        $data['all_mobil'] = $all_mobil->data;
        $this->load->view('template/admin/header');
        $this->load->view('admin/edit_transaksi', $data);
        $this->load->view('template/admin/footer');
    }

    public function edit_transaksi_simpan(){
        $id_transaksi = $this->input->post('id_transaksi');
        $id_user = $this->input->post('id_user');
        $id_mobil = $this->input->post('id_mobil');
        $tanggal_sewa = $this->input->post('tgl_sewa');
        $tanggal_kembali = $this->input->post('tgl_kembali');
        $harga_mobil = $this->input->post('harga');
        $selisih_hari=((abs(strtotime($tanggal_sewa) - strtotime($tanggal_kembali)))/(60*60*24));
        $total_sewa =$harga_mobil*round($selisih_hari);
        $status = $this->input->post('status');

        $data = array(
            'id_transaksi' => $id_transaksi,
            'id_user' => $id_user,
            'id_mobil' => $id_mobil,
            'tanggal_sewa' => $tanggal_sewa,
            'tanggal_kembali' => $tanggal_kembali,
            'total_sewa' => $total_sewa,
            'status' => $status
        );

        echo print_r($data);

        $where = array(
            'id_transaksi' => $id_transaksi
        );

        $this->transaksi_model->edit_data('transaksi', $data, $where);

        if($status == 1){
            $this->transaksi_model->update_status_disewa($id_mobil);
        }else{
            $this->transaksi_model->update_status_tersedia($id_mobil);
        }

        $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data transaksi Berhasil Diubah
            <button transaksi="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/transaksi/selesai');
    }

    public function delete_transaksi($id){
        $where = array('id_transaksi' => $id);
        $data = $this->transaksi_model->ambil_id_transaksi_delete($id);
        foreach($data as $d){
            $id_mobil = $d['id_mobil'];
        }
        $this->transaksi_model->update_status_tersedia($id_mobil);
        $this->transaksi_model->delete_data($where, 'transaksi');
                $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data transaksi Berhasil Dihapus
            <button transaksi="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/transaksi/selesai');
    }

    public function konfirmasi_pembayaran($id){
        $this->load->model('transaksi_model');
        $id_transaksi = $id;
        $status_pembayaran = 2;

        $data = array(
            'status_pembayaran' => $status_pembayaran
        );
        $where = array(
            'id_transaksi' => $id_transaksi
        );

        $this->transaksi_model->edit_data('transaksi', $data, $where);

        echo "<script>window.location='".base_url('admin/transaksi/menunggu_konfirmasi')."';</script>";
    }

    public function _rules(){
        $this->form_validation->set_rules('id_type', 'Kode Type', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('no_plat', 'No Plat', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    }

}

?>