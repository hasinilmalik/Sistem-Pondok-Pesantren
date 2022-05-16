<?php
namespace App\Services;
Class WaService{
    protected $random_sender;
    public function __construct()
    {
        $sender = ["6285233002598", "6285333920007"];
        $this->random_sender = $sender[array_rand($sender)];
    }
    public function infoAkun($number,$data)
    {
        $data = [
            'api_key' => 'b2d95af932eedb4de92b3496f338aa5f97b36ae0',
            'sender'  => $this->random_sender,
            'number'  => $number,
            'message' => "Terima kasih telah melakukan pendaftaran di \nPP. Miftahul Ulum Banyuputih Kidul Lumajang.\nBerikut kami informasikan akun ananda: \n\nNama: *".$data['name']."*\nEmail: ".$data['email']."\nPassword: ".$data['password']." \n\n_Wa ini dikirim otomatis, untuk informasi lebih lanjut hubungi kami di +6285216329458_",
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
        return $response;
    }
    public function infoBayar($number,$data)
    {
        $data = [
            'api_key' => 'b2d95af932eedb4de92b3496f338aa5f97b36ae0',
            'sender'  => $this->random_sender,
            'number'  => $number,
            'message' => "Terima kasih telah melakukan pendaftaran di \nPP. Miftahul Ulum Banyuputih Kidul Lumajang.\nBerikut kami informasikan akun ananda: \n\nNama: *".$data['name']."*\nEmail: ".$data['email']."\nPassword: ".$data['password']." \n\n_Wa ini dikirim otomatis, untuk informasi lebih lanjut hubungi kami di +6285216329458_",
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
        return $response;
    }
    public function cekWa($no)
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
        $r = json_decode($response);
        return $r->status;
    }
}