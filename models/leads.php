<?php
//made by Alexandr
//19.12.2025
    require_once('requester.php');
    class Leads{
        static function NewLead($leadname,$leademail,$leadphone,$leadcom){
            $b24Url="";
            $b24UserID="";
            $b24WebHook="";
            $queryURL = "$b24Url/rest/$b24UserID/$b24WebHook/crm.lead.add.json";    
            
            // формируем параметры для создания лида    
            $queryData = http_build_query(array(
                "fields" => array(
                    "TITLE" => "Новый лид из формы на сайте",    // название лида
                    "NAME" => $leadname,             // имя 
                    "EMAIL" => array(   // Email в Битрикс24 = массив
                        "n0" => array(
                            "VALUE" =>  $leademail,   // номер телефона
                            "VALUE_TYPE" => "MOBILE",           // тип номера = мобильный
                        ),
                    ),
                    "PHONE" => array(   // телефон в Битрикс24 = массив
                        "n0" => array(
                            "VALUE" =>  $leadphone,   // номер телефона
                            "VALUE_TYPE" => "MOBILE",           // тип номера = мобильный
                        ),
                    ),
                    "COMMENTS" => $leadcom,         //комментарий
                ),
                'params' => array("REGISTER_SONET_EVENT" => "Y")    // Y = произвести регистрацию события добавления лида в живой ленте. Дополнительно будет отправлено уведомление ответственному за лид.  
            ));
            $newRequest=Requester::CurlRequest($queryData,$queryURL);
        }
    }
?>