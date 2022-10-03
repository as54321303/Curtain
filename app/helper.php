<?php

// Custom Functions
if (!function_exists('printc')) {
    function printc ($data) {
        echo '<pre>';
        print_r($data);
        echo '<pre>';
        die;
    }
}