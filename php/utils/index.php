<?php

function regexEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
