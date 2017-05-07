<?php
include "class.smtp.php";
include "class.phpmailer.php";

$to = 'romelikeyou@gmail.com';  // put your email heref

$email_template = 'simple.html';

$subject = strip_tags($_POST['subject']);
$email = strip_tags($_POST['email']);
$name = strip_tags($_POST['name']);
$message = nl2br(htmlspecialchars($_POST['message'], ENT_QUOTES));
//validate infomation:
$result = array();


if (empty($name)) {

    $result = array(
        'response' => 'error',
        'empty' => 'name',
        'message' => '<strong>Error!</strong>&nbsp; Hãy nhập tên.'
    );
    echo json_encode($result);
    die;
}

if (empty($email)) {

    $result = array(
        'response' => 'error',
        'empty' => 'email',
        'message' => '<strong>Error!</strong>&nbsp; Hãy nhập Email.'
    );
    echo json_encode($result);
    die;
}

if (empty($message)) {

    $result = array(
        'response' => 'error',
        'empty' => 'message',
        'message' => '<strong>Error!</strong>&nbsp; Hãy nhập nội dung.'
    );
    echo json_encode($result);
    die;
}

$content = "<td>
						<h2>$subject</h2>

						<p>Tên của nó: $name</p>

						<p>E-mail của nó: $email</p>

						<p>Nội dung của nó: $message</p>
						</td>";
// Khai báo tạo PHPMailer
$mail = new PHPMailer();
//Khai báo gửi mail bằng SMTP
$mail->IsSMTP();
//Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
// 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
// 1 = Thông báo lỗi ở client
// 2 = Thông báo lỗi cả client và lỗi ở server
$mail->SMTPDebug = 0;

$mail->CharSet  = "utf-8";
$mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
$mail->Host = "smtp.gmail.com"; //host smtp để gửi mail
$mail->Port = 587; // cổng để gửi mail
$mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
$mail->SMTPAuth = true; //Xác thực SMTP
$mail->Username = "thetung.pdca@gmail.com"; // Tên đăng nhập tài khoản Gmail
$mail->Password = "khongbaogionhutchi12"; //Mật khẩu của gmail
$mail->SetFrom("$email", "$subject"); // Thông tin người gửi
$mail->AddReplyTo("$email",
    "Test Reply");// Ấn định email sẽ nhận khi người dùng reply lại.(rep đến đúng mail người gửi chứ ko phải mail trung chuyển)
$mail->AddAddress("romelikeyou@gmail.com", "rome");//Email của người nhận
$mail->Subject = "Nhà tuyển dụng liên hệ"; //Tiêu đề của thư
$mail->MsgHTML("$content"); //Nội dung của bức thư.
// $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
// Gửi thư với tập tin html
$mail->AltBody
    = "Nhà tuyển dụng liên hệ";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
//$mail->AddAttachment("images/attact-tui.gif");//Tập tin cần attach

//Tiến hành gửi email và kiểm tra lỗi
if ($mail->Send()) {
    $result = array(
        'response' => 'success',
        'message' => 'Thank You! Your email has been delivered.'
    );
    echo "<script>alert('".$result['message']."')</script>";
} else {
    $result = array(
        'response' => 'error',
        'message' => "Error! $mail->ErrorInfo Cann\'t Send Mail."
    );
    echo "<script>alert(".$result['message'].")</script>";
}
echo "<script> window.location=\"http://me.romecody.com\"; </script>";




