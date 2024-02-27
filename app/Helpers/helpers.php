<?php

use App\Models\Content;
use App\Models\PostsMedia;
use Illuminate\Support\Facades\Auth;

if (!function_exists('content')) {
    function content($id)
    {
        $content = Content::where('id', $id)->first();

        if (Auth::check() && Auth::user()->role == 'admin') {
            $return = base64_decode($content->content) . ' <span class="edit-content" data-id="' . $id . '" content="' . $content->content . '" ><i class="fa-solid fa-pen"></i></span>';
        } else {
            $return = base64_decode($content->content);
        }
        return $return;
    }
}

if (!function_exists('media_post')) {
    function media_post($id, $attr = '')
    {
        $content = PostsMedia::where('id', $id)->first();

        if (Auth::check() && Auth::user()->role == 'admin') {
            $return = '<img '.$attr.' data-id="' . $id . '" src="' . asset('uploads/content/' . $content->file_name) . '" /><span class="edit-image-content" data-id="'.$id.'"><i class="fa-solid fa-pen"></i></span>';
        } else {
            $return = '<img '.$attr.' data-id="' . $id . '" src="' . asset('uploads/content/' . $content->file_name) . '" />';
        }
        return $return;
    }
}
