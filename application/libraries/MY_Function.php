<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class My_Function
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function rupiah($uang)
    {
        $rupiah  = "";
        $panjang = strlen($uang);
        while ($panjang > 3) {
            $rupiah  = "." . substr($uang, -3) . $rupiah;
            $lebar   = strlen($uang) - 3;
            $uang    = substr($uang, 0, $lebar);
            $panjang = strlen($uang);
        }
        $rupiah = "Rp " . $uang . $rupiah . ",-";
        return $rupiah;
    }

    public function dollars($value)
    {
        return '$' . number_format($value, 2);
    }

    public function discount($value, $discount)
    {
        return ($value - ($value * $discount / 100));
    }

    public function rediscount($value, $discount)
    {
        return ($value * 100) / (100 - $discount);
    }

    public function unique_key()
    {
        $tgl   = date('Y-m-d');
        $pecah = explode('-', $tgl);
        return (count($pecah) == 3) ? rand(100, 999) . $pecah[0] . $pecah[1] . $pecah[2] : $tgl;
    }

    public function send_email($options)
    {
        if (is_array($options)) {
            $config = array('smtp_user' => 'di3.santo@gmail.com',
                'smtp_pass'                 => 'h3r12id135el',
                'protocol'                  => 'smtp',
                'smtp_host'                 => 'ssl://smtp.googlemail.com',
                'smtp_port'                 => '465',
                'smtp_timeout'              => '30',
                'charset'                   => 'utf-8',
                'newline'                   => "\r\n");

            if (!isset($options['from_email'])) {
                $options['from_email'] = $config['smtp_user'];
            }

            if (!isset($options['from_name'])) {
                $options['from_name'] = 'Administrator';
            }

            $this->ci->load->library('email', $config);
            $mail = $this->ci->email;

            $mail->from($options['from_email'], $options['from_name']);
            $mail->to($options['to']);
            if (isset($options['cc'])) {
                $mail->cc($options['cc']);
            }

            if (isset($options['bcc'])) {
                $mail->bcc($options['bcc']);
            }

            $mail->subject($options['subject']);
            $mail->message($options['message']);

            $mail->send();

            return $mail->print_debugger();
        }

    }
}

/* End of file MY_Function.php */
/* Location: ./application/libraries/MY_Function.php */
