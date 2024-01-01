<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('test_method')) {
    function opn($value = '')
    {
        print "<pre>";
        print_r($value);
        print "</pre>";
    }
}
