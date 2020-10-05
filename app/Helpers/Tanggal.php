<?php

use Carbon\Carbon;

function tanggal($date)
{
    // return Carbon::parse($date)->formatLocalized('%d %B %Y');
    return Carbon::parse($date)->format('d-m-Y');
}
