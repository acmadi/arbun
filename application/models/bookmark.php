<?php
class Bookmark extends DataMapper {

    var $table = 'bookmark';

    var $has_one = array('buku', 'akun');
    
    var $has_many = array();

    var $validation = array();

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}

/* End of file komentar.php */
/* Location: ./application/models/komentar.php */
