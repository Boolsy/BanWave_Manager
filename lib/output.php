<?php

/**
 * @param string $content
 * @return void
 */
function getContent(string $content): void
{
    if (is_array(FILE_EXT)) {
        foreach (FILE_EXT as $extension) {
            $filename = $content . '.' . $extension;
            if (file_exists($filename)) {
                include_once $filename;
            }
        }
    }
}


function addDaysToDate($days)
{
    $today = new DateTime();
    $newDate = clone $today;
    $newDate->modify('+' . $days . ' days');
    return $newDate->format('Y-m-d H:i:s');
}

