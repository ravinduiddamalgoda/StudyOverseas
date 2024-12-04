<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web_Controller extends CI_Controller
{
  public function __construct()
  {
    // Call parent constructor
    parent::__construct();
    $this->load->model('Auth_Model'); // Load the Auth model
    $this->load->model('Search_Model'); // Load the Search model

    $this->load->library(['form_validation', 'session', 'email']); // Load necessary libraries
    $this->load->helper('url'); // Load URL helper for redirects
  }

  // Display login form
  public function home()
  {

    $this->load->view('web/index');
  }

  public function about()
  {
    // Load the about page view
    $this->load->view('web/about');
  }

  public function services()
  {
    // Load the services page view
    $this->load->view('web/services');
  }

  public function contact()
  {
    // Load the contact page view
    $this->load->view('web/contact');
  }
  public function courses()
  {
    // Load the contact page view
    $this->load->view('web/courses');
  }
  public function appointment()
  {
    // Load the contact page view
    $this->load->view('web/appointment');
  }


  public function search()
  {
    // Get the search term from the POST data
    $searchTerm = $this->input->post('search');

    // Get search results from the model (you'll need to implement this method)
    $data['results'] = $this->Search_Model->getSearchResults($searchTerm);

    // Load a view to display the search results
    $this->load->view('web/search_results', $data);
  }




}
