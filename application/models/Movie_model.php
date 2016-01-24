<?php
class Movie_model extends CI_Model{
     public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_movies() {
        $query = $this->db->query("select time, movie_name, movie_play_times from `movie-times`");
        
        return $query->result_array();
    }   
}