<!-- pay.php script -->
<?php

if($_POST){

$name = $_POST['name'];
$email = $_POST['email'];
$amount = $_POST['amount'];

$tx_ref = "TX_".time(); // unique transaction reference

$curl = curl_init();

$data = array(
    "tx_ref" => $tx_ref,
    "amount" => $amount,
    "currency" => "NGN",
    "redirect_url" => "verify.php",
    "customer" => array(
        "email" => $email,
        "name" => $name
    ),
    "customizations" => array(
        "title" => "Payment",
        "description" => "Payment from website"
    )
);

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.flutterwave.com/v3/payments",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer YOUR_SECRET_KEY",
        "Content-Type: application/json"
    ),
));

$response = curl_exec($curl);
curl_close($curl);

$res = json_decode($response);

if($res->status == "success"){
    header("Location: ".$res->data->link);
}
else{
    echo "Payment initialization failed";
}

}
?>