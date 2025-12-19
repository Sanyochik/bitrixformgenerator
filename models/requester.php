<?php
//made by Alexandr
//19.12.2025
    class Requester{
        static function CurlRequest($queryData,$queryURL){
            // отправляем запрос в Б24 и обрабатываем ответ
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_POST => 1,
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $queryURL,
                CURLOPT_POSTFIELDS => $queryData,
            ));
            $result = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($result,1); 
         
            // если произошла какая-то ошибка - выведем её
            if(array_key_exists('error', $result))
            {      
                die("Ошибка при сохранении лида: ".$result['error_description']);
            }
            
            header('Location: ../views/index.html', true, 301);
        }
    }