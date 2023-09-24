<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class CheckoutPaymentController extends Controller
{
    public function check()
    {
    }



    public function online_checkout(Request $request)
    {
        if (isset($_POST['cod'])) {
            dd('345t45r');
        } elseif (isset($_POST['redirect'])) {
            $data = $request->all();
            // dd($data);
            $code_cart = rand(00, 9999);
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

            $email = isset($data['email']) ? $data['email'] : '';
            // Tạo một mảng chứa các thông tin từ biến $data và thông tin "dc_DiaChi"
            $queryData = array_merge($data, ['email' => $email]);
            // Chuyển đổi mảng thông tin thành query string
            $queryString = http_build_query($queryData);
            // Cập nhật biến $vnp_Returnurl bằng cách thêm query string vào URL
            // $vnp_Returnurl = "http://127.0.0.1:8000/vnpay-callback?" ;

            $vnp_Returnurl = "http://127.0.0.1:8000/user/thank-you?" . $queryString;
            $vnp_TmnCode = "9QYP0W65"; //Mã website tại VNPAY 
            $vnp_HashSecret = "ZZTRZDLTLOGCNIZGETJGYNKZPCDHASVM"; //Chuỗi bí mật

            $vnp_TxnRef = $code_cart; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toán đơn hàng test';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $data['total_vnpay'] * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version
            // $vnp_ExpireDate = $_POST['txtexpire'];
            //Billing
            // $vnp_Bill_Mobile    = $data['phone'];
            // $vnp_Bill_Email     = $data['email'];
            // $fullName           = $data['fullname'];
            // $vnp_Inv_Address    = $data['address'];
            // $vnp_Inv_Type       = $data['pincode'];

            //Billing
            // $vnp_Bill_Mobile = $_POST['phone'];
            // $vnp_Bill_Email = $_POST['email'];
            // $fullName = trim($_POST['fullname']);
            // if (isset($fullName) && trim($fullName) != '') {
            //     $name = explode(' ', $fullName);
            //     $vnp_Bill_FirstName = array_shift($name);
            //     $vnp_Bill_LastName = array_pop($name);
            // }
            // $vnp_Bill_Address = $_POST['address'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                // "vnp_ExpireDate"=>$vnp_ExpireDate,

                // "vnp_Inv_Type " => $vnp_Inv_Type
            );


            // dd($inputData);k

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            // }



            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url,
            );

            if (isset($_POST['redirect'])) {
                // dd('fgh0');
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
                // dd($returnData);
            }

            // vui lòng tham khảo thêm tại code demo
        } elseif (isset($_POST['payUrl'])) {
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua Atm MoMo";
            // $amount = $request->total_momo;
            $amount = 10000;
            $orderId = time() . "";
            $redirectUrl = "http://127.0.0.1:8000/user/checkout";
            $ipnUrl = "http://127.0.0.1:8000/user/checkout";
            $extraData = "";



            $requestId = time() . "";
            $requestType = "payWithATM";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            // dd($signature);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = $this->execPostRequest($endpoint, json_encode($data));
            // dd($result);
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there

            return redirect()->to($jsonResult['payUrl']);
            // header('Location: ' . $jsonResult['payUrl']);
        }
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        // dd($result);
        //close connection
        curl_close($ch);
        return $result;
    }
    // MOMO
    // public function momo_payment(Request $request)
    // {

    //     // $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
    //     $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

    //     $partnerCode = 'MOMOBKUN20180529';
    //     $accessKey = 'klm05TvNBzhg7h7j';
    //     $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
    //     $orderInfo = "Thanh toán qua Atm MoMo";
    //     // $amount = $request->total_momo;
    //     $amount = 10000;
    //     $orderId = time() . "";
    //     $redirectUrl = "http://127.0.0.1:8000/user/checkout";
    //     $ipnUrl = "http://127.0.0.1:8000/user/checkout";
    //     $extraData = "";



    //     $requestId = time() . "";
    //     $requestType = "payWithATM";
    //     // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //     //before sign HMAC SHA256 signature
    //     $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    //     $signature = hash_hmac("sha256", $rawHash, $secretKey);
    //     // dd($signature);
    //     $data = array(
    //         'partnerCode' => $partnerCode,
    //         'partnerName' => "Test",
    //         "storeId" => "MomoTestStore",
    //         'requestId' => $requestId,
    //         'amount' => $amount,
    //         'orderId' => $orderId,
    //         'orderInfo' => $orderInfo,
    //         'redirectUrl' => $redirectUrl,
    //         'ipnUrl' => $ipnUrl,
    //         'lang' => 'vi',
    //         'extraData' => $extraData,
    //         'requestType' => $requestType,
    //         'signature' => $signature
    //     );
    //     $result = $this->execPostRequest($endpoint, json_encode($data));
    //     // dd($result);
    //     $jsonResult = json_decode($result, true);  // decode json

    //     //Just a example, please check more in there

    //     return redirect()->to($jsonResult['payUrl']);
    //     // header('Location: ' . $jsonResult['payUrl']);
    // }
}
