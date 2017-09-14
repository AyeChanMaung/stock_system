<?php

    class validate
    {
        public function check($data, $fields)
        {
            $msg = null;
            foreach ($fields as $value){
                if (empty($data[$value])){
                    $msg = "$value is empty";
                }
            }
            return $msg;
        }
        public function email_valid($email)
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                return true;
            }
            return false;
        }
        public function phone_valid($phone)
        {
            if(preg_match("/[0-9]+$/", $phone)){
                return true;
            }
            return false;
        }
    }

?>