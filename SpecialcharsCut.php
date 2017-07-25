<?php
//中英混合字符截取
function SpecialcharsCut($str,$len=null){
    $last = 0;
    $str_len = strlen($str);
    $result = '';
    $result_len = 0;
    do{
        $pattern = '/<em>(.*?)<\/em>/i';
        $num = preg_match($pattern,$str,$m,PREG_OFFSET_CAPTURE,$last);
        if($num){
            $result_len .= substr($str,$last,$add_len=($m[0][1]-$last<$len-$result_len)?$m[0][1]-$last:$len-$result_len);
            $result_len += $add_len;
            $last = $m[0][1] + strlen($m[0][1]);
            if($result_len < $len){
                if($len-$result_len >= strlen($m[1][0])){
                    $result .= $m[0][0];
                    $result_len += strlen($m[1][0]);
                }else{
                    $result .= substr($m[1][0],0,$len-$resut_len);
                    break;
                }
            }
        }else{
            $result .= substr($str,$last,$len-$result_len);
            break;
        }
    }while($last<$str_len && $result_len<$len);
    return $result;
}
echo SpecialcharsCut('<em>abc</em><em>defgh</em>',6);