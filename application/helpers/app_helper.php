<?php
defined("BASEPATH") or exit("No direct script access allowed");

if (!function_exists("cek_login")) {
    function cek_login()
    {
        $CI = get_instance();
        if ($CI->session->userdata("user_id") != "") {
            if ($CI->session->userdata("user_email_status") == 0) {
                redirect("Register/konfirmasi_email");
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}

if (!function_exists("idr_format")) {
    function idr_format($num)
    {
        $num_arr = explode(".", $num);

        $str_dec = !empty($num_arr[1]) ? "," . $num_arr[1] : "";

        $hasil_rupiah = number_format(floatval($num_arr[0]), 0, ",", ".");
        return "Rp. " . $hasil_rupiah . $str_dec;
    }
}

if (!function_exists("daftarkan_session")) {
    function daftarkan_session($username)
    {
        // Daftarkan Session
        $CI = get_instance();
        $data = $CI->M_auth->get_user($username)->row_array();
        $CI->session->set_userdata($data);

        // Update Cookie
        $key = random_string("sha1", 64);
        set_cookie(md5("hasiltani"), $key, 3600 * 12);
        $update_key = [
            "user_cookie" => $key,
            "last_login" => date("Y-m-d H:i:s"),
        ];
        $CI->M_auth->update_cookie(
            $update_key,
            $CI->session->userdata("user_id")
        );
    }
}

if (!function_exists("tanggal")) {
    function tanggal($data)
    {
        if ($data != "") {
            $origin = explode("-", $data);
            $year = $origin[0];
            $month = bulan($origin[1]);
            $originday = explode(" ", $origin[2]);
            $day = $originday[0];
            $time = $originday[1];

            $newdatetime = $day . " " . $month . " " . $year . " " . $time;
        } else {
            $newdatetime = "";
        }

        return $newdatetime;
    }
}
if (!function_exists("bulan")) {
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
                $bulan = Date("F");
                break;
        }
        return $bulan;
    }
}

// Isi Chart
if (!function_exists("isi_chart")) {
    function isi_chart($limit = null)
    {
        // Daftarkan Session
        $CI = get_instance();
        $CI->load->model("M_chart", "chart");
        $data = $CI->chart->get_chart($limit);
        return $data;
    }
}

function update_status_transaksi()
{
    $CI = get_instance();
    $CI->load->model("M_transaksi", "transaksi");
    $data = $CI->transaksi->get_list_transaksi();

    foreach ($data as $row) {
        $ch = curl_init();
        curl_setopt(
            $ch,
            CURLOPT_URL,
            "https://api.sandbox.midtrans.com/v2/{$row['kode_transaksi']}/status"
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $headers = [
            "Accept: application/json",
            "Content-Type: application/json",
            "Authorization: Basic U0ItTWlkLXNlcnZlci1ydHgyTHc4VDdtQ241NC1FS2NhNUhxQ1M6",
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $detail_transaksi = curl_exec($ch);
        $detail_transaksi = json_decode($detail_transaksi);
        $CI->transaksi->update_status_transaksi($detail_transaksi);
        curl_close($ch);
    }
}

function get_saldo_penjual()
{
    $CI = get_instance();
    $CI->load->model("M_user", "user");
    $data = $CI->user->get_saldo_penjual();

    return $data;
}

?>
