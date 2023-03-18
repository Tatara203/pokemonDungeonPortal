<?php
    function e(string $str, string $charset = 'utf-8'): string{
        return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, $charset, false);
    }