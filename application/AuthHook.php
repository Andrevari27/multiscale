<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthHook {
    public function check_login() {
        $CI =& get_instance();
        
        // Daftar controller yang tidak memerlukan login
        $public_controllers = ['AuthController'];
        
        // Mendapatkan nama controller saat ini
        $current_controller = $CI->router->class;

        // Jika controller saat ini tidak ada dalam daftar public_controllers dan pengguna belum login
        if (!in_array($current_controller, $public_controllers) && !$CI->session->userdata('logged_in')) {
            // Redirect ke halaman login
            redirect('login');
        }
    }
}
