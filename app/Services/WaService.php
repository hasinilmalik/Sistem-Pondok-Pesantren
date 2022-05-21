<?php
namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
Class WaService{
    protected $random_sender;
    public function __construct()
    {
        $sender = ["6285158762445"];
        $this->random_sender = $sender[array_rand($sender)];
    }
    public function infoAkun($number,$data)
    {
        $data = [
            'api_key' => 'b2d95af932eedb4de92b3496f338aa5f97b36ae0',
            'sender'  => '6285158762445',
            'number'  => $number,
            'message' => "Terima kasih telah melakukan pendaftaran di \nPP. Miftahul Ulum Banyuputih Kidul Lumajang.\nBerikut kami informasikan akun ananda: \n\nNama: *".$data['name']."*\nEmail: ".$data['email']."\nPassword: ".$data['password']." \n\n_Wa ini dikirim otomatis, untuk informasi lebih lanjut hubungi kami di +6285216329458_\n\nwww.mubakid.or.id",
        ];
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://wa.mubakid.xyz/app/api/send-message",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data))
        );
        
        $response = curl_exec($curl);
        dd($response);
        $error = curl_error($curl);
        curl_close($curl);
        $response = json_decode($response)->status;
        // dd($response);
        return $response;
    }
    public function infoBayar($number,$transaction)
    {
        $data = [
            'api_key' => 'b2d95af932eedb4de92b3496f338aa5f97b36ae0',
            'sender'  => $this->random_sender,
            'number'  => $number,
            'message' => "Assalamualaikum wr.wb.\nBerikut rincian tagihan untuk pendaftaran ananda: \n*".$transaction->customer_name."*\n\n~~~~~~~~~~~\nNominal : *Rp. ".number_format($transaction->amount)."*\nMelalui : ".$transaction->payment_name."\nKode Pembayaran : *".$transaction->pay_code."*\nLakukan pembayaran sebelum : ".Carbon::createFromTimestamp($transaction->expired_time)->isoFormat('dddd, D MMMM Y, H:m')."\n~~~~~~~~~~~\n\n_Wa ini dikirim otomatis, untuk informasi lebih lanjut hubungi kami di +6285216329458_\n\nwww.mubakid.or.id",
        ];
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://wa.mubakid.xyz/app/api/send-message",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data))
        );
        
        $response = curl_exec($curl);
        $error = curl_error($curl);
        
        curl_close($curl);
        $response = json_decode($response)->data;
        return $response ? : $error;
    }
    public function cekWa()
    {
        $data = [
            'api_key' => 'b2d95af932eedb4de92b3496f338aa5f97b36ae0',
            'sender'  => '6285333920007',
            'number'  => '6285333920007',
            'message' => "cek notifikasi wa",
        ];
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://wa.mubakid.xyz/app/api/send-message",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data))
        );
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        // $r = json_decode($response);
        return $response;
    }
    public function cekOn($no)
    {
        $data = [
            'api_key' => 'b2d95af932eedb4de92b3496f338aa5f97b36ae0',
            'sender'  => $no,
            'number'  => $no,
            'message' => "cek notifikasi wa",
        ];
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://wa.mubakid.xyz/app/api/send-message",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data))
        );
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $r = json_decode($response)->status;
        return $r;
    }
    public function kirimNota($nohp, $nama, $amount, $status, $link)
    {
        $data = [
            'api_key' => 'b2d95af932eedb4de92b3496f338aa5f97b36ae0',
            'sender'  => $this->random_sender,
            'number'  => $nohp,
            'message' => "*NOTA ELEKTRONIK*\n$link\n\nTerima kasih telah melakukan pembayaran: \n*".$nama."*\n\n~~~~~~~~~~~\nNominal : *Rp. ".number_format($amount)."*\nStatus : $status \n\"\n~~~~~~~~~~~\n\n_Wa ini dikirim otomatis, untuk informasi lebih lanjut hubungi kami di +6285216329458_\n\nwww.mubakid.or.id",
        ];
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://wa.mubakid.xyz/app/api/send-message",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data))
        );
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $r = json_decode($response)->status;
        return $r;
    }
    
}