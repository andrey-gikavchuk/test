<?php

if( is_singular('subscriber') ){
    include(TEMPLATEPATH . '/single-subscriber.php');
} else {
    include(TEMPLATEPATH . '/single-simple.php');
}

