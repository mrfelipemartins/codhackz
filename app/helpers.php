<?php

function is_admin() {
    return (Auth::user()->id === 1);
}