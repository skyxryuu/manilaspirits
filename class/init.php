<?php 

function base_url($page,$uri) {
    return 'http://localhost/manilaspirits/'.$page.'/'.$uri;
}

function redirect($page,$uri) {
    return header('location: http://localhost/manilaspirits/'.$page.'/'.$uri);
}