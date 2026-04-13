<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $date    = date("d-m-Y H:i:s");
    $name    = htmlspecialchars($_POST['name']);
    $phone   = htmlspecialchars($_POST['phone']);
    $email   = htmlspecialchars($_POST['email']);
    $message = nl2br(htmlspecialchars($_POST['message']));

    $file = "enquiries.doc";

    if (!file_exists($file) || filesize($file) == 0) {
        $header = "
        <html>
        <head><meta charset='UTF-8'></head>
        <body>
        <table border='1' cellpadding='8' cellspacing='0' width='100%'>
        <tr style='background:#f2f2f2;font-weight:bold;'>
            <td>Date</td>
            <td>Name</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Message</td>
        </tr>
        ";
        file_put_contents($file, $header, FILE_APPEND);
    }

    $row = "
    <tr>
        <td>$date</td>
        <td>$name</td>
        <td>$phone</td>
        <td>$email</td>
        <td>$message</td>
    </tr>
    ";

    file_put_contents($file, $row, FILE_APPEND);

    // Close table and html tags after each submission (optional but recommended)
    $footer = "
    </table>
    </body>
    </html>
    ";
    // Rewrite file with footer
    // To avoid multiple footers, remove last footer before appending new data (advanced)
    // For simplicity, only add footer if file is new or on demand

    // Sending email
    mail(
        "vastuprasadshivarkar@gmail.com",
        "New Enquiry",
        "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message"
    );

    echo "
    <html>
    <head>
        <meta http-equiv='refresh' content='3;url=knowledge-bank.html'>
    </head>
    <body style='text-align:center;font-family:Arial;padding-top:80px;'>
        <h2 style='color:green;'>✅ Your enquiry has been received</h2>
        <p>Thank you for contacting us. We will get in touch with you shortly.</p>
        <p>Redirecting to the Career page...</p>
    </body>
    </html>
    ";
    exit();
}
?>
