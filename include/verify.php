<?php

session_start();

include '../admin/db.php';

if (!isset($_SESSION['payment_auth'])) {
    header('HTTP/1.0 403');
    session_destroy();
    die();
}

$MerchantID = 'xxxxx-xxxxx-xxxxx-xxxx';
$Amount = 129999; //Amount will be based on Toman
$Authority = $_GET['Authority'];
$refid_check_sql = 'SELECT refid FROM transaction WHERE authority = :authority';
$delete_sql = 'DELETE FROM transaction WHERE authority = :authority';
$update_sql = 'UPDATE transaction SET refid = :refid WHERE authority = :authority';
$email_sql = 'SELECT email FROM transaction WHERE authority = :authority';

if ($_GET['Status'] == 'OK') {
    // URL also can be ir.zarinpal.com or de.zarinpal.com
    $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

    $result = $client->PaymentVerification([
        'MerchantID'     => $MerchantID,
        'Authority'      => $Authority,
        'Amount'         => $Amount,
    ]);

    $Authority = 'zarinpal-'.(int)$_GET['Authority'];
    $RefID = $result->RefID;
    $stmt = $conn->prepare($email_sql);
    $stmt->bindParam(':authority', $Authority);
    $stmt->execute();
    $row = $stmt->fetch();
    ?>
    <script src="/js/jquery.js"></script>
    <form action="success_payment.php" method="post" id="success_payment">
        <input type="hidden" name="refid" value="<?php echo $RefID; ?>">
        <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
    </form>
    <?php
    if ($result->Status == 100) {
        $stmt = $conn->prepare($update_sql);
        $stmt->bindParam(':refid', $RefID);
        $stmt->bindParam(':authority', $Authority);
        $stmt->execute();
        echo "<script>$('#success_payment').submit();</script>";
    } else {
        $stmt = $conn->prepare($refid_check_sql);
        $stmt->bindParam(':authority', $Authority);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row['refid'] == '') {
            $stmt = $conn->prepare($delete_sql);
            $stmt->bindParam(':authority', $Authority);
            $stmt->execute();
        }
        echo "<script>alert('ERR: ".$result->Status."');";
        echo("window.location.href = '/';</script>");
        session_destroy();
    }

} else {
    $Authority = 'zarinpal-'.(int)$_GET['Authority'];
    $stmt = $conn->prepare($refid_check_sql);
    $stmt->bindParam(':authority', $Authority);
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row['refid'] == '') {
        $stmt = $conn->prepare($delete_sql);
        $stmt->bindParam(':authority', $Authority);
        $stmt->execute();
    }
    echo "<script>alert('ERR: Transaction canceled by user');";
    echo("window.location.href = '/';</script>");
    session_destroy();
}

?>
