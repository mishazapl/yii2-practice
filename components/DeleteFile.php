<?php

function deleteFile($link)
{
    unlink(getcwd().$link);
}