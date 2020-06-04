<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;
use Session;

class CheckCodeController extends Controller
{
    public function image(){


        $im = imagecreatetruecolor(800, 420);

        //$orange = imagecolorallocate($im, 220, 210, 60);
        $background_clolr = imagecolorallocate ($im, 227, 215, 205);

        $text_clolr = imagecolorallocate ($im, 7, 84, 3);

        $checkcode = rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);

        Session::put('$checkcode1',$checkcode);
        imagestring($im, 5, 10, 3, $checkcode, $text_clolr);

        //Turn on output buffering
        ob_start();

        imagepng($im);

        //Store the contents of the output buffer
        $buffer = ob_get_contents();
        // Clean the output buffer and turn off output buffering
        ob_end_clean();

        imagedestroy($im);

        return response($buffer, 200)->header('Content-type', 'image/png');

    }

}
