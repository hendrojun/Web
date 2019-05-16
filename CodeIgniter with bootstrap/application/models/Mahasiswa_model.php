<?php

class Mahasiswa_model extends CI_model{

    public function getAllMahasiswa()
    {
       return $this->db->get('tblmahasiswa')->result_array();
        
    }

    public function tambahDataMahasiswa()
    {
        // $gambar = uploadfoto();
        // if( !$gambar){
        //     return false;
        // }

    	$data = [
    		"nama" => $this->input->post('nama', true),
    		"npm" => $this->input->post('npm', true),
    		"email" => $this->input->post('email', true),
    		"jurusan" => $this->input->post('jurusan', true),
    		"gambar" => $this->input->post('gambar')

    	];

    	$this->db->insert('tblmahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {
        //$this->db->where('id', $id);
        $this->db->delete('tblmahasiswa', ['id' => $id]);
    }

    public function getMahasiswaById($id)
    {

        return $this->db->get_where('tblmahasiswa', ['id' =>$id])->row_array();
    }


    public function ubahDataMahasiswa()
    {

    //     $gambarLama = $data["gambarLama"];
    // // cek user upload gambar baru atau tidak
    //     if($_FILES['gambar']['error'] === 4){
    //         $gambar = $gambarLama;
    //     }else{
    //         $gambar = uploadfoto();
    //     }

        $data = [
            "nama" => $this->input->post('nama', true),
            "npm" => $this->input->post('npm', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
            "gambar" => $this->input->post('gambar', true)

        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tblmahasiswa', $data);
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
         $this->db->or_like('jurusan', $keyword);
         $this->db->or_like('npm', $keyword);
         $this->db->or_like('email', $keyword);
        return $this->db->get('tblmahasiswa')->result_array();

    }

    public function aksi_upload(){
        $config['upload_path']          = 'assets/img/foto';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 1000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar')){
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('mahasiswa/tambah', $error);
        }else{
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('mahasiswa', $data);
        }
    }



}
function uploadfoto()
    {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek gambar tidak diupload
    if($error === 4){
        echo "<script> alert('File gambar belum diupload!'); </script>";
        return false;
    }

    // cek file apa yang diupload
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script> alert('File upload harus gambar!'); </script>";
        return false;
    }

    // cek size terlalu besar
    if($ukuranFile > 2000000 ){
        echo "<script> alert('Ukuran file terlalu besar!'); </script>";
        return false;
    }

    // nama gambar baru jika sama
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    // gambar siap diupload
    move_uploaded_file($tmpName, "assets/img/foto/" . $namaFileBaru);
    return $namaFileBaru;


}