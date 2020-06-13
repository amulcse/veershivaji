<?php
$urls = file_get_contents('url.txt');
$rows = explode("\n",$urls);
foreach ($rows as $key => $value) {
    $columns = explode('||',$value);
    $columns[0] = intval(trim($columns[0]));
    $columns[1] = trim($columns[1]);
    if($columns[0] == 0) continue;
    if(file_exists("downloaddone/".$columns[0].".done")){
        continue;
    }
    file_put_contents($columns[0].".downloading",date('Y-m-d H:i:s'));
    exec("ffmpeg -i ".$columns[1]." -bsf:a aac_adtstoasc -vcodec copy -c copy -crf 50 veershivaji".$columns[0].".mp4
    ",$result);
    unlink($columns[0].".downloading");
    file_put_contents("downloaddone/".$columns[0].".done",date('Y-m-d H:i:s'));
}


// index.m3u8/se

// ffmpeg -i https://vootvod.cdn.jio.com/s/enc/hls/p/1982551/sp/198255100/serveFlavor/entryId/0_lyzwyhq0/v/2/pv/1/flavorId/0_5c9lbv9h/name/a.mp4/index.m3u8 -c copy -bsf:a aac_adtstoasc veershivaji92.mp4
