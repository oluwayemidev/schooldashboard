<?php

function sanitizeInput($input)
{
    return htmlspecialchars(strip_tags(trim($input)));
}

function formatDate($date)
{
    return date("F j, Y", strtotime($date));
}

function generateRandomString($length = 8)
{
    return bin2hex(random_bytes($length));
}
