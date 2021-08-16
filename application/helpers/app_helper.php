<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


if (! function_exists('cek_login'))
{
	function cek_login() {
		$CI = get_instance();
		if ($CI->session->userdata('user_id') != '') {
			if ($CI->session->userdata('user_email_status') == 0) {
				redirect('Register/konfirmasi_email');
			} else {
				return TRUE;
			}
		} else {
			return FALSE;
		}
	}
}

if (! function_exists('daftarkan_session'))
{
	function daftarkan_session($username) {
		// Daftarkan Session
		$CI = get_instance();
		$data = $CI->M_auth->get_user($username)->row_array();
		$CI->session->set_userdata($data);

		// Update Cookie
		$key = random_string('sha1', 64);
		set_cookie(md5('hasiltani'), $key, 3600*12);
		$update_key = array('user_cookie' => $key, 'last_login' => date('Y-m-d H:i:s'));
		$CI->M_auth->update_cookie($update_key, $CI->session->userdata('user_id'));
	}
}

if (!function_exists('tanggal')) {
  function tanggal($data)
  {
    if ($data != "") {
      $origin = explode('-', $data);
      $year    = $origin[0];
      $month    = bulan($origin[1]);
      $originday    = explode(' ', $origin[2]);
      $day    = $originday[0];
      $time    = $originday[1];

      $newdatetime = $day . ' ' . $month . ' ' . $year . ' ' . $time;
    } else {
      $newdatetime = "";
    }

    return $newdatetime;
  }
}
if (!function_exists('bulan')) {
  function bulan($bulan)
  {
    switch ($bulan) {
      case 1:
      $bulan = "Januari";
      break;
      case 2:
      $bulan = "Februari";
      break;
      case 3:
      $bulan = "Maret";
      break;
      case 4:
      $bulan = "April";
      break;
      case 5:
      $bulan = "Mei";
      break;
      case 6:
      $bulan = "Juni";
      break;
      case 7:
      $bulan = "Juli";
      break;
      case 8:
      $bulan = "Agustus";
      break;
      case 9:
      $bulan = "September";
      break;
      case 10:
      $bulan = "Oktober";
      break;
      case 11:
      $bulan = "November";
      break;
      case 12:
      $bulan = "Desember";
      break;
      default:
      $bulan = Date('F');
      break;
    }
    return $bulan;
  }
}

?>