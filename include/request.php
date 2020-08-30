<?php

session_start();

include '../admin/db.php';

if (!isset($_POST['name'])) {
    header('HTTP/1.0 403');
    session_destroy();
    die();
}

$MerchantID = '6e7c0893-ee30-46d3-b110-aefc42f732b4';  //Required
$Amount = 129999; //Amount will be based on Toman  - Required
$Description = 'خرید مجموعه ی آموزشی طراحی وب سایت';  // Required
$Name = $_POST['name']; // Optional
$Mobile = $_POST['number']; // Optional
$Email = $_POST['email']; // Optional
$CallbackURL = 'http://code-learner.ir/include/verify.php';  // Required
$sql = "INSERT INTO transaction (name, mobile, email, amount, authority, date)
VALUES (:name, :mobile, :email, :amount, :authority, :date)";

// URL also can be ir.zarinpal.com or de.zarinpal.com
try {
$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentRequest([
    'MerchantID'     => $MerchantID,
    'Amount'         => $Amount,
    'Description'    => $Description,
    'Email'          => $Email,
    'Mobile'         => $Mobile,
    'CallbackURL'    => $CallbackURL,
]);
$Authority = 'zarinpal-'.(int)$result->Authority;
//Redirect to URL You can do it also by creating a form
if ($result->Status == 100) {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $Name);
    $stmt->bindParam(':mobile', $Mobile);
    $stmt->bindParam(':email', $Email);
    $stmt->bindParam(':amount', $Amount);
    $stmt->bindParam(':authority', $Authority);
    $stmt->bindValue(':date', time());
    $stmt->execute();
    header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
    $_SESSION['payment_auth'] = true;
} else {
    echo "<script>alert('ERR: ".$result->Status."');";
    echo("window.location.href = '/';</script>");
}

$conn=null;
} catch(SoapFault $e){
    echo $e->getMessage();
}

?>