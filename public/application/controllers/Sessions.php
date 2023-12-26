<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *     http://example.com/index.php/welcome
   *  - or -
   *     http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/userguide3/general/urls.html
   */

  public function __construct()
  {
    parent::__construct();
    /* $this->load->helper(array('form', 'url')); */
    /* $this->load->database('default'); */
    /* $this->load->library(array('session', 'form_validation')); */

  }

  public function login()
  {
    /* $this->session->has_userdata('user_id'); */
    /* $this->session->set_userdata('user_id', 'some_value'); */
    /* $this->session->set_flashdata('item', 'value'); */
    /* $this->session->flashdata('item'); */
    /* $this->session->flashdata(); */
    /* $this->session->keep_flashdata('item'); */
    /* $this->load->view('sessions/login'); */


    $this->form_validation->set_rules('username', 'Usuario', 'required');
    $this->form_validation->set_rules('password', 'Contraseña', 'required',
      array('required' => 'Debe proporcionar una %s.')
    );

    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('layouts/header');
      $this->load->view('sessions/login');
      $this->load->view('layouts/footer');
    }
    else
    {
      $this->load->model('users');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $user_id = $this->users->authorize($username, $password);

      if (!$user_id)
      {
        $this->session->set_flashdata('error', 'Usuario no encortrado');
        $this->load->view('layouts/header');
        $this->load->view('sessions/login');
        $this->load->view('layouts/footer');
      }
      else
      {
        $this->session->set_userdata('user_id', $user_id);
        $this->session->set_flashdata('success', 'Bienvenido');
        $this->load->view('layouts/header');
        $this->load->view('site/welcome');
        $this->load->view('layouts/footer');
      }
    }
  }

  public function logout()
  {
      $this->session->user_id = null;
      redirect('/');
  }
}
