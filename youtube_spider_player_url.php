
/**
 * curl 请求
 * @param $request_url
 * @param bool $header
 * @return bool|string
 */
function spiderCurl($request_url, $header = false)
{
    $ch = curl_init();
    if ($header !== false) {
        curl_setopt($ch, CURLOPT_HEADER, $header);
    }
    curl_setopt($ch, CURLOPT_URL, $request_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 不验证证书
    $data = curl_exec($ch);
    curl_close($ch);
    if (empty($data)) {
        return false;
    }
    return $data;
}
$youtube_url = "https://www.youtube.com/watch?v=hiVQ8vrGA_8";

$curl_result = spiderCurl($youtube_url);

$pattern = "#ytplayer.config\s*=\s*([^\n]+});ytplayer#";
if(preg_match_all($pattern, $curl_result, $output)){

    if (isset($output[1][0]) && !empty($output[1][0])) {
        $json_arr = json_decode($output[1][0], true);
        print_r($json_arr);
        $url_encoded_fmt_stream_map = explode("&", $json_arr['args']['url_encoded_fmt_stream_map']);
        foreach ($url_encoded_fmt_stream_map as $key => $item) {
            parse_str($item, $item_parse_item);
            if (isset($item_parse_item['url']) && $item_parse_item['url']) {
                $re = $item_parse_item['url'];
                echo PHP_EOL;
            }
        }
        echo "<pre>";

        print_r($json_arr);
    }
}else{
    echo "not found funciton ";
}
