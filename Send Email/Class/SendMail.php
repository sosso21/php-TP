<?php

class SendMail
{
    public function __construct( $obj , $message  , $adress  )
    {

        if(isset($message , $obj , $adress ))
        {
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"PrimFX.com"<support@primfx.com>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';
        
        return mail( $adress, $obj , $message, $header);
        
        }
    }
}
