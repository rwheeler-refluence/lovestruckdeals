<?php  
function sendgridEmail($to, $from, $subject, $body) {
        
        $url = 'https://api.sendgrid.com/';
         $user = 'Marketa';
         $pass = 'lovestruckdeals22';

            $params = array(
                'api_user'  => $user,
                'api_key'   => $pass,
                'to'        => $to,
                'subject'   => $subject,
                'html'      => $body,
                'text'      => 'testing body',
                'from'      => $from,
              );


            $request =  $url.'api/mail.send.json';

            // Generate curl request
            $session = curl_init($request);
            // Tell curl to use HTTP POST
            curl_setopt ($session, CURLOPT_POST, true);
            // Tell curl that this is the body of the POST
            curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
            // Tell curl not to return headers, but do return the response
            curl_setopt($session, CURLOPT_HEADER, false);
            // Tell PHP not to use SSLv3 (instead opting for TLS)
          //  curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
           // curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
            curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

            // obtain response
            $response = curl_exec($session);
            //print_r($response);
            curl_close($session);
        
        
    }
    
    ?>