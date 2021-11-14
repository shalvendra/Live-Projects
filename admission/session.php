<?php
//  login ke baad har page pe head hai, us head mai session page ko call kiya hai jab bhi direct kisi page ko open karne ki kosis karenge to sabse pehele head milega jisse session.php mai jo condition hai wo false ho jaayegi or waha wapas login page pe chala jaayega,agar page par head use nahi karenge to wo page open ho jayega, head mai session hai to wo pure page ke liye nahi hai wo sirf head ke liye hai, jiss page pe session use karna chate hai us page pe pehele session call karna hoga, session variable ko hum saare pages ma kahi bhi use kar sakte hai, session variable name must be unique.
session_start();
if(empty($_SESSION['username'])){
    echo '<script>window.location.href = "index.php";</script>';
}


?>