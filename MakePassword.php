<?php

    $password_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"."abcdefghijklmnopqrstuvwxyz"."0123456789_-#!$";

    function passGenerate($length){
        global $password_chars;
        $bytes = openssl_random_pseudo_bytes($length);
        $chars_len = strlen($password_chars);
        $result = "";
        for($i = 0;$i < $length; $i++){
            $str = ord(substr($bytes,$i,1)) % $chars_len;
            $result .= substr($password_chars,$str,1);
        }
        return $result;
    }

    $res = "";    
    $len = intval(empty($_GET["len"])) ? 12 : $_GET["len"];
    if($len == 0){
        $len == 12;
    }
    for($i = 1; $i <= 15; $i++){
        $res .= passGenerate($len)."\n";
    }
?>
<html>
<body>
<form>
文字数:<input name="len" value="12">
<input type="submit" value = "生成">
</form>
結果<br>
<textarea rows="15" cols="20"><?php echo $res ?></textarea>
</body>
</html>