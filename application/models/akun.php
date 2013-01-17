<?php
class Akun extends DataMapper {

    var $table = 'akun';

    var $has_one = array('fakultas', 'jurusan');

    var $has_many = array('buku', 'komentar', 'bookmark');

    var $controller;

    var $validation = array(
        'nama' => array(
            'rules' => array('required', 'trim', 'min_length'=>3,'max_length' => 100),
        ),
        'email' => array(
            'rules' => array('required', 'trim', 'valid_email', 'unique', 'min_length'=>3,'max_length' => 100),
        ),
        'password' => array(
            'rules' => array('required'),
            'type' => 'password',
        ),
        'confirm_password' => array( // accessed via $this->confirm_password
            'rules' => array('matches' => 'password'),
            'type' => 'password',
        ),
        'password_old' => array(
            'rules' => array('valid_old_pass'),
            'type' => 'password',
        ),
        'password_new' => array(
            'type' => 'password',
        ),
        'nim' => array(
            'rules' => array('required', 'unique', 'numeric'),
        ),
        'tgl_lahir' => array(
            'rules' => array('required', 'date[y-m-d,-]'),
        ),
        'fakultas_id' => array(
            'rules' => array('required', 'numeric'),
        ),
        'jurusan_id' => array(
            'rules' => array('required', 'numeric'),
        ),
        'status' => array(
            'rules' => array('required', 'numeric'),
        ),
        'jen_kelamin' => array(
            'rules' => array('required', 'numeric'),
        ),
        'captcha' =>array(
            'rules' => array('required'),
        ),
        'picture' => array(
            'rules' => array('valid_pic'),
        ),
        'angkatan' => array(
            'rules' => array('required', 'numeric'),
        ),
        'approved' => array(
            'rules' => array('numeric'),
        ),
    );

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    function _valid_old_pass($field)
    {
        if($this->{$field}!=$this->password){
            $this->error_message('valid_old_pass', 'Password lama tidak sesuai');
        } else {
            $this->password = $this->password_new;
        }
    }
    function _valid_pic($field)
    {
        if($this->{$field}=='error') {
            $this->error_message('valid_pic', 'File gambar hanya bertipe gif,jpg,png dibawah 500kb');
        }
    }
    
    function login()
    {
        $nim = $this->nim;
        $this->validate()->get();
        if ($this->exists()) {
            return true;
        } else {
            $this->error_message('login', 'NIM/NIP atau Password salah');
            $this->nim = $nim;
            return FALSE;
        }
    }

    function get_profpic()
    {
        return base_url().'public/img/user/'.$this->picture;
    }
    public function _count_award()
    {
      $this->buku->_include_award_count();
      $this->buku->get_iterated();
      $sum = 0;
      foreach ($this->buku as $data) {
        $sum += $data->award_count;
      }
      return $sum;
    }
    public function _include_buku_count()
    {
      $buku = $this->buku;
      $buku->select_func('COUNT', '*', 'count');
      $buku->where_related('akun', 'id', '${parent}.id');
      $this->select_subquery($buku, 'buku_count');
    }
    public function _include_buku_view_count()
    {
      $award = $this->buku;
      $award->select_func('SUM', '@view', 'count');
      $award->where_related('akun', 'id', '${parent}.id');
      $this->select_subquery($award, 'buku_view_count');
    }
}

/* End of file akun.php */
/* Location: ./application/models/akun.php */
