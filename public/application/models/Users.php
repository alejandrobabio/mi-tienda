<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function authorize($username, $password)
  {
    $data = [
      'username' => $username,
      'password' => $password
    ];

    $query = $this->db->get_where('users', $data);
    /* $query = $this->db->get('users', 1); */
    $result = $query->row_array();

    if (! $result) {
      return null;
    }

    return $result['id'];
  }
}
