<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Helpers;
use App\Item;
use App\Order;
use Illuminate\Support\Facades\Log;
use OpayAllInOne;
use OpayEncryptType;
use Exception;
use OpayPaymentMethod;
use Symfony\Component\Console\Input\Input;
use Session;

//這行很重要，因為它會載入request類別
class PaymentsController extends Controller
{
    //
    public function pay(Request $request)
    {
        //載入SDK(路徑可依系統規劃自行調整)
        //include('Opay.Payment.Integration.php');

        //$input = Input::all();
        //echo session('checkcode1');
        //$selected_deal = $request->session()->get('checkcode1');
        //Session::put('checkcode1', '123456');
        //$value = $request->session()->get('checkcode1');
        $value = Session::get('checkcode1');

        $account = $request->input('account');
        $checkcode = $request->input('checkcode');
        $payType = $request->input('payType');
        $amount = $request->input('amount');

        $indexurl=env('IndexUrl');


        if(( $account == '')   or ($checkcode == '')){
            $show_message = '帳戶或驗證碼沒有輸入！';
            echo "<script Language='JavaScript'>window.alert('$show_message');</script>";
            //echo "<script Language='JavaScript'>window.location.href='$indexurl';</script>";
            return Redirect::to('/');
            exit();
        }
        elseif($checkcode !== $_SESSION['checkcode1']){

            $show_message =  '驗證碼不對！';
            echo "<script Language='JavaScript'>window.alert('$show_message');</script>";
            //echo "<script Language='JavaScript'>window.location.href='$indexurl';</script>";
            return Redirect::to('/');
            exit();
        }
        elseif($amount>20000 || $amount<300){

            $show_message =  '金額必須大於等於300，小於等於20000！';
            echo "<script Language='JavaScript'>window.alert('$show_message');</script>";
            //echo "<script Language='JavaScript'>window.location.href='$indexurl';</script>";
            return Redirect::to('/');
            exit();
        }


        try {

            $obj = new OpayAllInOne();



            //$obj->Send['ClientBackURL'] = $request->ClintBackURL;
            //付款完成後，於第三方頁面顯示回到我們服務的網址

            //服務參數
            //：https://payment-stage.opay.tw/Cashier/AioCheckOut/V5
            $obj->ServiceURL  = "https://payment-stage.opay.tw/Cashier/AioCheckOut/V5";         //服務位置
            $obj->HashKey = env('HASHKEY');                                            //測試用Hashkey，請自行帶入OPay提供的HashKey
            $obj->HashIV = env('HASHIV');                                            //測試用HashIV，請自行帶入OPay提供的HashIV
            $obj->MerchantID = env('MERCHANTID');                                                     //測試用MerchantID，請自行帶入OPay提供的MerchantID
            $obj->EncryptType = OpayEncryptType::ENC_SHA256;                                    //CheckMacValue加密類型，請固定填入1，使用SHA256加密

            //基本參數(請依系統規劃自行調整)
            $MerchantTradeNo = "Test".time();

            $obj->Send['ReturnURL'] = env('ALLPAYRETURNURL'); //付款完成通知回傳的網址
            $obj->Send['MerchantTradeNo']   = $MerchantTradeNo;                                       //訂單編號
            $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                                    //交易時間
            $obj->Send['TotalAmount']       = 2000;                                                   //交易金額
            $obj->Send['TradeDesc']         = "good to drink";                                        //交易描述
            $obj->Send['ChoosePayment']     = OpayPaymentMethod::ALL;                                 //付款方式:全功能

            //訂單的商品資料
            array_push($obj->Send['Items'], array('Name' => "歐付寶黑芝麻豆漿", 'Price' => (int)"2000",
                'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "dedwed"));

            //產生訂單(auto submit至OPay)
            $obj->CheckOut();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function receive(Request $request) {

        //載入SDK(路徑可依系統規劃自行調整)
        include('Opay.Payment.Integration.php');
        try {

            $obj = new OpayAllInOne();


            //服務參數

            $obj->HashKey = env('HASHKEY');                                            //測試用Hashkey，請自行帶入OPay提供的HashKey
            $obj->HashIV = env('HASHIV');                                            //測試用HashIV，請自行帶入OPay提供的HashIV
            $obj->MerchantID = env('MERCHANTID');                                                     //測試用MerchantID，請自行帶入OPay提供的MerchantID
            $obj->EncryptType = OpayEncryptType::ENC_SHA256;                                    //CheckMacValue加密類型，請固定填入1，使用SHA256加密


            /* 取得回傳參數 */
            $arFeedback = $obj->CheckOutFeedback();

            // 參數寫入檔案
            if(true)
            {
                $sLog_Path  = __DIR__.'/sample_payment_return.log' ; // LOG路徑
                $sLog = '+++++++++++++++++++++++++++++++++++++++ 接收回傳參數 ' . date('Y-m-d H:i:s') . ' ++++++++++++++++++++++++++++++++++++++++++++' . "\n";
                $fp=fopen($sLog_Path, "a+");
                fputs($fp, $sLog);
                fclose($fp);

                $sLog_File =  print_r($arFeedback, true). "\n";
                $fp=fopen($sLog_Path, "a+");
                fputs($fp, $sLog_File);
                fclose($fp);
            }

            echo '1|OK' ;

        } catch (Exception $e) {
            if(true)
            {
                $sLog_Path  = __DIR__.'/sample_payment_return.log' ; // LOG路徑
                $sLog = '+++++++++++++++++++++++++++++++++++++++ 接收回傳參數(ERROR) ' . date('Y-m-d H:i:s') . ' ++++++++++++++++++++++++++++++++++++++++++++' . "\n";
                $fp=fopen($sLog_Path, "a+");
                fputs($fp, $sLog);
                fclose($fp);

                $sLog_File =  $e->getMessage(). "\n";
                $fp=fopen($sLog_Path, "a+");
                fputs($fp, $sLog_File);
                fclose($fp);
            }
        }
    }


}

