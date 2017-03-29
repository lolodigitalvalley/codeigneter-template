<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Date_lib
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function date_now()
    {
        return date('Y-m-d');
    }

    public function time_now()
    {
        return date('h:m:s');
    }

    public function jam_indo($time)
    {
        if (!empty($time)) {
            return date('h:m:s', $time);
        }

        return false;
    }

    public function getMonthNameId($number)
    {
        switch ($number) {
            case 1:return "Januari";
                break;
            case 2:return "Februari";
                break;
            case 3:return "Maret";
                break;
            case 4:return "April";
                break;
            case 5:return "Mei";
                break;
            case 6:return "Juni";
                break;
            case 7:return "Juli";
                break;
            case 8:return "Agustus";
                break;
            case 9:return "September";
                break;
            case 10:return "Oktober";
                break;
            case 11:return "November";
                break;
            case 12:return "Desember";
                break;
        }
    }

    public function getMonthNameEn($number)
    {
        switch ($number) {
            case 1:return "January";
                break;
            case 2:return "February";
                break;
            case 3:return "March";
                break;
            case 4:return "April";
                break;
            case 5:return "May";
                break;
            case 6:return "June";
                break;
            case 7:return "July";
                break;
            case 8:return "August";
                break;
            case 9:return "September";
                break;
            case 10:return "October";
                break;
            case 11:return "November";
                break;
            case 12:return "December";
                break;
        }
    }

    public function tgl_eng($tgl, $format = 'd M Y')
    {
        if (!empty($tgl) && $tgl != '0000-00-00') {
            $tanggal    = substr($tgl, 8, 2);
            $bulan      = substr($tgl, 5, 2);
            $nama_bulan = $this->getMonthNameEn(substr($tgl, 5, 2));
            $tahun      = substr($tgl, 0, 4);
            switch ($format) {
                case 'd/m/Y':
                    return $tanggal . '/' . $bulan . '/' . $tahun;
                    break;
                case 'd-m-Y':
                    return $tanggal . '-' . $bulan . '-' . $tahun;
                    break;
                case 'd M Y':
                    return $tanggal . ' ' . $nama_bulan . ' ' . $tahun;
                    break;
                case 'd-M-Y':
                    return $tanggal . '-' . $nama_bulan . '-' . $tahun;
                    break;
            }
        }
        return false;
    }

    public function tgl_indo($tgl, $format = 'd M Y')
    {
        if (!empty($tgl) && $tgl != '0000-00-00') {
            $tanggal    = substr($tgl, 8, 2);
            $bulan      = substr($tgl, 5, 2);
            $nama_bulan = $this->getMonthNameId(substr($tgl, 5, 2));
            $tahun      = substr($tgl, 0, 4);
            switch ($format) {
                case 'd/m/Y':
                    return $tanggal . '/' . $bulan . '/' . $tahun;
                    break;
                case 'd-m-Y':
                    return $tanggal . '-' . $bulan . '-' . $tahun;
                    break;
                case 'd M Y':
                    return $tanggal . ' ' . $nama_bulan . ' ' . $tahun;
                    break;
                case 'd-M-Y':
                    return $tanggal . '-' . $nama_bulan . '-' . $tahun;
                    break;
            }
        }
        return false;
    }

    public function getMonthNumber($month)
    {
        $month = strtolower($month);
        switch ($month) {
            case "januari":
            case "january":
                return 1;
                break;
            case "februari":
            case "february":
                return 2;
                break;
            case 'maret':
            case 'march':
                return 3;
                break;
            case 'april':
                return 4;
                break;
            case 'mei':
            case 'may':
                return 5;
                break;
            case 'juni':
            case 'june':
                return 6;
                break;
            case 'juli':
            case 'july':
                return 7;
                break;
            case 'agustus':
            case 'august':
                return 8;
                break;
            case 'september':
                return 9;
                break;
            case 'oktober':
            case 'october':
                return 10;
                break;
            case 'november':
            case 'november':
                return 11;
                break;
            case 'desember':
            case 'december':
                return 12;
                break;
        }
    }

    public function tgl_mysql($tgl)
    {
        if (!empty($tgl) && $tgl != '0000-00-00') {
            $pecah   = explode(' ', $tgl);
            $tanggal = $pecah[0];
            $bulan   = $this->getMonthNumber($pecah[1]);
            if (strlen($bulan) < 2) {
                $bulan = '0' . $bulan;
            }
            $tahun = $pecah[2];

            return implode('-', array($tahun, $bulan, $tanggal));
        }
        return false;
    }

    public function create_password($tgl)
    {
        if (!empty($tgl) && $tgl != '0000-00-00') {
            $pecah   = explode(' ', $tgl);
            $tanggal = $pecah[0];
            $bulan   = $this->getMonthNumber($pecah[1]);
            if (strlen($bulan) < 2) {
                $bulan = '0' . $bulan;
            }
            $tahun = $pecah[2];

            return implode('', array($tanggal, $bulan, $tahun));
        }
        return false;
    }
}

/* End of file Date_lib.php */
/* Location: ./application/libraries/Date_lib.php */
