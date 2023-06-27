<?php
$user_input = $_GET['url'];  // Kullanıcıdan gelen veriyi alırız.

if (filter_var($user_input, FILTER_VALIDATE_URL)) {
    echo '<iframe src="' . $user_input . '" width="100%" height="300">
    <p>Sorry, your browser does not support iframes.</p>
    </iframe>';
} else {
    echo "Invalid URL.";
}
?>
