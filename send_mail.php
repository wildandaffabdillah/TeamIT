<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validasi email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "dafkaihan10@gmail.com"; // Ganti dengan email Anda
        $subject = "Pesan dari Kontak Website";
        $body = "Nama: $name\nEmail: $email\nPesan:\n$message";
        $headers = "From: $email";

        // Kirim email
        if (mail($to, $subject, $body, $headers)) {
            echo "Pesan telah dikirim!";
        } else {
            echo "Terjadi kesalahan saat mengirim pesan.";
        }
    } else {
        echo "Alamat email tidak valid.";
    }
} else {
    echo "Metode permintaan tidak valid.";
}
?>
