<?php 
class Car extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model("MCar");
    }

    function index(){
        $this->load->view("car_list");
    }

    function get_data(){
        $data = $this->MCar->get_data();
        echo json_encode($data);
    }

    function create_data(){
        $data = $this->MCar->create_data();
        echo json_encode($data);
    }

    function update_data(){
        $data = $this->MCar->update_data();
        echo json_encode($data);
    }

    function delete_data(){
        $data = $this->MCar->delete_data();
        echo json_encode($data);
    }
}