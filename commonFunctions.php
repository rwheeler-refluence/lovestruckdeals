<?php

/**
 * Generates correct blowfish salt based a string.
 *
 * @param string $string A string which should be turned to blowfish salt.
 * @return string Correct blowfish salt.
 */
function bf_salt_character($num) {
    if ($num > 63) {
        return chr(46);
    } elseif ($num < 12) {
        return chr(46 + $num);
    } elseif ($num < 38) {
        return chr(53 + $num);
    } else {
        return chr(59 + $num);
    }
}

function generate_bf_salt($string) {
    $result = '';
    $bin = unpack('C*', md5($string, true));
    for ($i = 0; $i < count($bin); $i++) {
        $shift = 2 + ($i % 3) * 2;
        $first = ($bin[$i + 1] >> $shift);
        $second = ($bin[$i + 1] & bindec(str_repeat('1', $shift)));
        switch ($shift) {
            case 2:
                $result .= bf_salt_character($first);
                $tmp = $second;
                break;
            case 4:
                $result .= bf_salt_character(($tmp << 4) | $first);
                $tmp = $second;
                break;
            case 6:
                $result .= bf_salt_character(($tmp << 2) | $first);
                $result .= bf_salt_character($second);
                break;
        }
    }
    if ($shift == 2) {
        $result .= bf_salt_character($second);
    }

    return $result;
}

function calculate_password_hash($login, $password) {
    $hash = '*0';
    if (CRYPT_BLOWFISH == 1) {
        if (defined('PHP_VERSION_ID') && (PHP_VERSION_ID > 50306)) {
            $hash = crypt($password, '$2y$08$' . generate_bf_salt($login));
        } else {
            $hash = crypt($password, '$2a$08$' . generate_bf_salt($login));
        }
    }

    if ((CRYPT_MD5 == 1) && !strcmp($hash, '*0')) {
        $hash = crypt($password, '$1$' . $login);
    }

    return strcmp($hash, '*0') ? $hash : md5($password);
}

function check_password_hash($password, $hash) {
    
    if (preg_match('/^\$/', $hash)) {
        print_r($hash);die;
        return !strcmp(calculate_password_hash($password), $hash);
        
    } else {
        //print_r($password);print_r($hash);die;
        return !strcmp(md5($password), $hash);
        
    }
}