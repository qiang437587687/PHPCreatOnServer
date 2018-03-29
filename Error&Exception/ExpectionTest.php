<?php

//扩展 Exception

class customException extends Exception {
    public function errorMessage(){
        $errormsg = '错误行号 '.$this->getLine().' in '.$this->getFile()
            .': <b>'.$this->getMessage();
        return $errormsg;
    }
}


function checkNum($number) {
    if ($number > 1) {
//        throw new Exception("变量啊啊啊");
           throw new customException();
    }

    return true;
}

try {
    checkNum(2);
}

catch (customException $e) {
    echo $e -> errorMessage();
}

catch (Exception $e) {
    echo 'Message:' . $e -> getMessage();
}

?>