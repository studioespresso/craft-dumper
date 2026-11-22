<?php

// Laravel already provides dump() and dd()
if (! function_exists('d')) {
    function d(mixed ...$vars): mixed
    {
        return dump(...$vars);
    }
}
