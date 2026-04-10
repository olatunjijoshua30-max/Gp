<!-- verify page -->

<?php

$transaction_id = $_GET['transaction_id'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/".$transaction_id."/verify",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer YOUR_SECRET_KEY",
        "Content-Type: application/json"
    ),
));

$response = curl_exec($curl);
curl_close($curl);

$result = json_decode($response);

if($result->data->status == "successful"){
    
    echo "Payment Successful";

    $amount = $result->data->amount;
    $email = $result->data->customer->email;

    // Save payment to database here

}else{

    echo "Payment Failed";

}
?>