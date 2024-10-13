<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Types;

interface CreativeFormTypes
{
    public const BANNER = 'Banner';
    public const TEXT = 'Text';
    public const TEXT_GRAPHIC = 'TextGraphic';
    public const VIDEO = 'Video';
    public const AUDIO = 'Audio';
    public const AUDIO_BROADCAST = 'AudioBroadcast';
    public const VIDEO_BROADCAST = 'VideoBroadcast';
    public const OTHER = 'Other';


    public const TEXT_VIDEO_BLOCK = 'TextVideoBlock';
    public const TEXT_AUDIO_BLOCK = 'TextAudioBlock';

    public const TEXT_AUDIO_VIDEO_BLOCK = 'TextAudioVideoBlock';
    public const TEXT_GRAPHIC_VIDEO_BLOCK = 'TextGraphicVideoBlock';
    public const TEXT_GRAPHIC_AUDIO_BLOCK = 'TextGraphicAudioBlock';
    public const TEXT_GRAPHIC_AUDIO_VIDEO_BLOCK = 'TextGraphicAudioVideoBlock';
    public const BANNER_HTML5 = 'BannerHtml5';
}
