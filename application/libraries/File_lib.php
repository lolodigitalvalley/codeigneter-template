<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class File_lib
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function get_thumb_name($img_name)
    {
        $parts = explode('.', $img_name);
        return (count($parts) == 2) ? $parts[0] . '_thumb.' . $parts[1] : $img_name;
    }

    public function is_image($source_path, $source_name)
    {
        $is_image = false;

        $ext_allowed = array("jpg", "jpeg", "gif", "png");

        $parts     = pathinfo($source_name);
        $extension = $parts['extension'];

        $img_type     = exif_imagetype($source_path);
        $file_allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);

        if ((in_array($extension, $ext_allowed)) &&
            (in_array($img_type, $file_allowed)) &&
            (getimagesize($source_path))) {
            $is_image = true;
        }

        return $is_image;
    }

    public function is_file($source_path, $source_name)
    {
        $is_file = false;

        if (function_exists('finfo_open')) {
            $finfo     = finfo_open(FILEINFO_MIME_TYPE);
            $tipe_file = finfo_file($finfo, $source_path);
        } else {
            $tipe_file = $_FILES['xfile']['type'];
        }

        if (function_exists('pathinfo')) {
            $parts     = pathinfo($source_name);
            $extension = $parts['extension'];
        } else {
            $extension = explode(".", $source_name);
            $extension = end($extension);
        }

        $allowed_ext = array(
            /* images extensions */
            'jpeg', 'bmp', 'png', 'gif', 'tiff', 'jpg',
            /* audio extensions */
            'mp3', 'wav', 'midi', 'aac', 'ogg', 'wma', 'm4a', 'mid', 'orb', 'aif',
            /* movie extensions */
            'mov', 'flv', 'mpeg', 'mpg', 'mp4', 'avi', 'wmv', 'qt',
            /* document extensions */
            'pdf', 'ppt', 'pps', 'xls', 'doc', 'xlsx', 'pptx', 'ppsx', 'docx',
            /* compressed extensions */
            'zip', 'rar',
        );

        $allowed_type = array(
            /* images type */
            'image/gif', 'image/jpeg', 'image/png', 'image/x-ms-bmp', 'image/tiff',
            /* audio type */
            'video/mp4', 'video/x-ms-wvx', 'video/flv', 'audio/mpeg', 'audio/x-ms-wma',
            /*document type */
            'application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/msword',
            'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            /* compressed type */
            'application/zip', 'application/x-rar');

        if ((in_array($extension, $allowed_ext)) && (in_array($tipe_file, $allowed_type))) {
            $is_file = true;
        }

        return $is_file;
    }

}

/* End of file MY_Function.php */
/* Location: ./application/libraries/MY_Function.php */
