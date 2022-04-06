<?php

if(!function_exists('getYoutubeEmbedUrl')){
    function getYoutubeEmbedUrl($url) {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        $link = 'https://www.youtube.com/embed/';
        $fullUrl = $link.$youtube_id;
        return  $fullUrl;
    }
}