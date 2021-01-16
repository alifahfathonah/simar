<?php

class User_model extends CI_Model
{
    public function createPeminjaman($data)
    {
        $this->db->insert('peminjaman_ruang', $data);
    }
}
