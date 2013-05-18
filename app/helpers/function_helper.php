<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ½ØÈ¡ÖÐÓ¢»ìÅÅ×Ö·û´®
 * @param (string) $string
 * @param (int) $length
 * @param (string) $dot
 * @param (string) $charset
 */
function sb_substr( $string, $length, $dot = '..', $charset='utf-8' ) {
	$slen = strlen($string);
    if( $slen <= $length ) {
        return $string;
    }
	if( function_exists( 'mb_substr' ) ) {
		return mb_substr( $string, 0, $length, $charset ) . $dot;
	}
    $strcut = '';
    if(strtolower($charset) == 'utf-8') {
        $n = $tn = $noc = 0;
        while($n < $slen) {
            $t = ord($string[$n]);
            if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                $tn = 1; $n++; $noc++;
            } elseif(194 <= $t && $t <= 223) {
                $tn = 2; $n += 2; $noc += 1;
            } elseif(224 <= $t && $t < 239) {
                $tn = 3; $n += 3; $noc += 1;
            } elseif(240 <= $t && $t <= 247) {
                $tn = 4; $n += 4; $noc += 1;
            } elseif(248 <= $t && $t <= 251) {
                $tn = 5; $n += 5; $noc += 1;
            } elseif($t == 252 || $t == 253) {
                $tn = 6; $n += 6; $noc += 1;
            } else {
                $n++;
            }
            if($noc >= $length) {
                break;
            }
        }
        if($noc > $length) {
            $n -= $tn;
        }
        $strcut = substr($string, 0, $n);
    } else {
        for($i = 0; $i < $length; $i++) {
            $strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
        }
    }
    
    return $strcut.$dot;
}

/* End of file function_helper.php */
/* Location: ./system/helpers/function_helper.php */