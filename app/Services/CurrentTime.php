<?php


namespace App\Services;


class CurrentTime
{
    /**
     * Current time in timestamp.
     *
     * @return int
     */
    public function getTime() {
        return time();
    }
}
