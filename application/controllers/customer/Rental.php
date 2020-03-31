<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Rental extends CI_Controller {

    public function list_mobil()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://localhost/rentalmobil/api/mobil');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $data['mobil'] = json_decode($result, TRUE);
        curl_close($curl);

        $this->load->view('template/customer/header');
        $this->load->view('customer/list_mobil', $data);
        $this->load->view('template/customer/footer');        
    }

    public function tentang(){
        $this->load->view('template/customer/header');
        $this->load->view('customer/tentang');
        $this->load->view('template/customer/footer');        
    }

    public function kontak_kami(){
        $this->load->view('template/customer/header');
        $this->load->view('customer/kontak_kami');
        $this->load->view('template/customer/footer');        
    }

    public function riwayat_sewa(){
        $this->load->model('rental_model');
        $id_user = $this->fungsi->user_login()->id_user;
        $data['transaksi'] = $this->rental_model->get_transaksi($id_user);
        $this->load->view('template/customer/header');
        $this->load->view('customer/riwayat_sewa', $data);
        $this->load->view('template/customer/footer');
    }

    public function konfirmasi_pembayaran($id){
        // check_not_login();
        $data['id_transaksi'] = $id;
        $this->load->view('template/customer/header');
        $this->load->view('customer/konfirmasi_pembayaran', $data);
        $this->load->view('template/customer/footer');
    }

    public function konfirmasi_pembayaran_simpan(){
        // check_not_login();
        $this->load->model('transaksi_model');

        $id_transaksi = $this->input->post('id_transaksi');

        $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
            
                $config ['upload_path'] = './assets/upload/bukti_pembayaran';
                $config ['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);
                
                if(!$this->upload->do_upload('bukti_pembayaran')){
                    echo "<script>alert('Bukti Pembayaran Gagal di-Upload')</script>";
                }else{
                    $bukti_pembayaran = $this->upload->data('file_name');
                    echo    "<script>
                                alert('Bukti Pembayaran Berhasil di-Upload');
                            </script>";
                }
            
            $status_pembayaran = 1;

            $data = array(
                'bukti_pembayaran' => $bukti_pembayaran,
                'status_pembayaran' => $status_pembayaran
            );
            $where = array(
                'id_transaksi' => $id_transaksi
            );

            $this->transaksi_model->edit_data('transaksi', $data, $where);

            echo "<script>window.location='".base_url('customer/rental/riwayat_sewa')."';</script>";

    
    }

    public function detail_mobil($id_mobil){
        $api = 'http://localhost/rentalmobil/api/mobil?id_mobil='.$id_mobil;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $api);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $data['mobil'] = json_decode($result, TRUE);
        curl_close($curl);

        $this->load->view('template/customer/header');
        $this->load->view('customer/detail_mobil', $data);
        $this->load->view('template/customer/footer');        
    }

    public function tambah_rental($id_mobil){
        $api = 'http://localhost/rentalmobil/api/mobil?id_mobil='.$id_mobil;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $api);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $data['mobil'] = json_decode($result, TRUE);
        curl_close($curl);

        $this->load->view('template/customer/header');
        $this->load->view('customer/tambah_rental', $data);
        $this->load->view('template/customer/footer');        
    }

    public function tambah_rental_ready()
    {
        // check_not_login();
        $id_mobil = $this->input->post('id_mobil');
        $this->load->model('user_model');
        
        $api = 'http://localhost/rentalmobil/api/mobil?id_mobil='.$id_mobil;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $api);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $data['mobil'] = json_decode($result, TRUE);
        curl_close($curl);

        $tanggal_sewa = $this->input->post('tanggal_sewa');
        $tanggal_kembali = $this->input->post('tanggal_kembali');
        $durasi = abs(round((strtotime($tanggal_sewa) - strtotime($tanggal_kembali)) / 86400));
        $data += array(
            'tgl_sewa' => $tanggal_sewa,
            'tgl_kembali' => $tanggal_kembali,
            'durasi' => $durasi
        );
        $this->load->view('template/customer/header');
        $this->load->view('customer/tambah_rental_ready', $data);
        $this->load->view('template/customer/footer');
    }

    public function tambah_rental_simpan()
    {
        // check_not_login();
        $this->load->model('transaksi_model');
        $this->load->model('rental_model');

        $id_user = $this->input->post('id_user');
        $id_mobil = $this->input->post('id_mobil');
        $tgl_sewa = strtotime($this->input->post('sewa'));
        $tgl_sewa = date("Y-m-d", $tgl_sewa);
        $tgl_kembali = $this->input->post('kembali');
        // $tgl_kembali = date("Y-m-d", $tgl_kembali);
        $durasi = abs(round((strtotime($tgl_sewa) - strtotime($tgl_kembali)) / 86400));
        $harga = $this->input->post('harga');
        $total_sewa = $harga * $durasi;
        $status = 1;
        $status_pembayaran = 0;

        $data = array(
            'id_user' => $id_user,
            'id_mobil' => $id_mobil,
            'tanggal_sewa' => $tgl_sewa,
            'tanggal_kembali' => $tgl_kembali,
            'total_sewa' => $total_sewa,
            'status' => $status,
            'status_pembayaran' => $status_pembayaran
        );

        $this->rental_model->insert_data($data, 'transaksi');
        if ($status == 1) {
            $this->transaksi_model->update_status_disewa($id_mobil);
        } else {
            $this->transaksi_model->update_status_tersedia($id_mobil);
        };

        
        // $tglsewa = strtotime($this->input->post('tanggal_sewa'));
        // $jmlhari  = 86400*1;
        // $tgl	  = $tglsewa-$jmlhari;
        // $batas_bayar = date("d-m-Y",$tgl);
    
        
        
        // $nama = $this->input->post('nama');
        // $merk = $this->input->post('nama_mobil');
        // $durasi = $this->input->post('durasi');
        // $data = array(
        //     'nama' => $nama,
        //     'merk' => $merk,
        //     'tanggal_sewa' => $tgl_sewa,
        //     'tanggal_kembali' => $tgl_kembali,
        //     'durasi' => $durasi,
        //     'total_sewa' => $total_sewa,
        //     'batas_bayar' => $batas_bayar
        // );

        echo "<script>alert('Mobil Berhasil Dibooking')</script>";
        echo "<script>window.location='".base_url('home')."';</script>";
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

}


?>