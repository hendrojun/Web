  <?php

class Mahasiswa extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
            $this->load->helper(array('form', 'url'));
        
    }

    public function index()
    {
       
        $data['judul'] = 'Daftar Mahasiswa';

        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        if($this->input->post('keyword')){
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index');
        $this->load->view('templates/footer');
    }

    

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Mahasiswa';
        $this->form_validation->set_rules('nama', 'Nama', 'required');
         $this->form_validation->set_rules('npm', 'NPM', 'required|numeric');
          $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
          $this->form_validation->set_rules('gambar', 'Foto');

        if($this->form_validation->run() == FALSE){
             $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/tambah');
        $this->load->view('templates/footer');

        }else{
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');

            redirect('mahasiswa');

        }

       
    }

    public function hapus($id)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Mahasiswa';

        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $this->load->view('templates/header', $data);
         $this->load->view('mahasiswa/detail', $data);
          $this->load->view('templates/footer');

    }


 public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $data['jurusan'] = ['Informatika','Sistem Informasi','Teknik Komputer','Teknik Elektro','Teknologi Informasi','Teknik Sipil'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
         $this->form_validation->set_rules('npm', 'NPM', 'required|numeric');
          $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
          $this->form_validation->set_rules('gambar', 'Foto');

        if($this->form_validation->run() == FALSE){
             $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/ubah', $data);
        $this->load->view('templates/footer');

        }else{
            $this->Mahasiswa_model->ubahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Diubah');

            redirect('mahasiswa');

        }

       
    }

    public function list()
    {
        $data['judul'] = 'List mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/list', $data);
        $this->load->view('templates/footer');
    }

}




