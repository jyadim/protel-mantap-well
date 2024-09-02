<?php

namespace App\Helpers;

class YoutubeHelper
{
    public static function getYoutubeId($url)
    {
        $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|embed|shorts)\/|(?:.*[?&]v=))|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

        preg_match($pattern, $url, $matches);

        return $matches[1] ?? null;
    }
}
