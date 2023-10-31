<?php

class Flasher{

    public static function setMessage($pesan,$type,$status)
    {
        $_SESSION['msg'] = [
            'pesan' => $pesan,
            'type' => $type,
            'status' => $status,
        ];   
    }
    
    public static function Message(){
        if( isset($_SESSION['msg']) )
        {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { Swal.fire({title:"'. $_SESSION['msg']['pesan'] .'",text:"'. $_SESSION['msg']['type'] .'",icon:"'. $_SESSION['msg']['status'] .'",showConfirmButton:false, timer: 1500});';
            echo '}, 100);</script>';
            unset($_SESSION['msg']);
        }
    }
}