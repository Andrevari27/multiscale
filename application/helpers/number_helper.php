<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('generate_spm_number')) {
    function generate_spm_number()
    {
        $CI =& get_instance();
        $CI->load->database();

        // Dapatkan tanggal saat ini
        $current_date = date('Y-m-d');
        $year = date('Y', strtotime($current_date));
        $month = date('m', strtotime($current_date));
        $day = date('d', strtotime($current_date));

        // Dapatkan autoincrement terbaru untuk hari ini
        $CI->db->select('MAX(RIGHT(no_pemesanan, 3)) as max_id');
        $CI->db->like('no_pemesanan', "SPM{$year}{$month}{$day}", 'after');
        $query = $CI->db->get('pemesanan');
        $max_id = $query->row()->max_id;

        // Tambah autoincrement
        if ($max_id) {
            $new_id = intval($max_id) + 1;
        } else {
            $new_id = 1;
        }
        $new_id = str_pad($new_id, 3, '0', STR_PAD_LEFT); // Padding dengan 3 digit

        // Gabungkan semua bagian
        return "SPM{$year}{$month}{$day}{$new_id}";
    }
}

