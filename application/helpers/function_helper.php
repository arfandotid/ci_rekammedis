<?php

function template_view($view, $data = null)
{
    $ci = get_instance();
    $ci->load->view('templates/header', $data);
    $ci->load->view('templates/navbar');
    $ci->load->view('templates/sidebar');
    $ci->load->view($view);
    $ci->load->view('templates/footer');
}

function active_menu($page, $page2 = null)
{
    $ci = get_instance();
    $uri = $ci->uri->segment(1);

    if ($page == $uri || $page2 == $uri) {
        return 'active';
    }
}

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->has_userdata('user')) {
        redirect('login');
    }
}

function is_role($role = 1, $redirect = false)
{
    $ci = get_instance();
    $user = $ci->session->userdata('user');
    if ($redirect) {
        if ($user->role != $role) {
            redirect('admin/blocked');
        }
    } else {
        return $user->role == $role ? 1 : 0;
    }
}

function setMsg($type, $msg)
{
    $ci = get_instance();
    $text = "";
    $text .= "<div class='alert alert-{$type}'>";
    $text .= $msg;
    $text .= "</div>";
    return $ci->session->set_flashdata('msg', $text);
}

function userdata($key = null)
{
    $ci = get_instance();
    $user = $ci->session->userdata('user');
    if ($key != null) {
        return $user->$key;
    } else {
        return $user;
    }
}

function custom_date($format, $date)
{
    return date($format, strtotime($date));
}

function indo_date($date, $print_day = false)
{
    $day        = [1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    $month      = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $split      = explode('-', $date);
    $nice_date  = $split[2] . ' ' . $month[(int) $split[1]] . ' ' . $split[0];

    if ($print_day) {
        $num = date('N', strtotime($date));
        return $day[$num] . ', ' . $nice_date;
    }
    return $nice_date;
}

function ellipsis($text, $length)
{
    $out = strlen($text) > $length ? substr($text, 0, $length) . "..." : $text;
    return $out;
}

function msgBox($msg = "save", $success = true)
{
    switch ($msg) {
        case "save":
            $pesan = $success ? "Data berhasil disimpan!" : "Gagal menyimpan data!";
            break;
        case "edit":
            $pesan = $success ? "Data berhasil diedit!" : "Gagal mengedit data!";
            break;
        case "delete":
            $pesan = $success ? "Data berhasil dihapus!" : "Gagal menghapus data!";
            break;
        default:
            $pesan = "";
            break;
    }
    $title = $success ? "Berhasil!" : "Gagal!";
    $type = $success ? "success" : "error";
    $alert = "
        <script type='text/javascript'>
        $(document).ready(function() {
            Swal.fire(
                '{$title}',
                '{$pesan}',
                '{$type}'
            );
        });
        </script>
    ";
    $ci = get_instance();
    return $ci->session->set_flashdata('pesan', $alert);
}
