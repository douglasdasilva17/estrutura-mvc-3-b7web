<?php

function dd(...$vars)
{
    // <pre> tag
    echo '<pre style="background-color: #f5f5f5;
    color: #212529;
    padding: 10px;
    margin: 10px;
    border-radius: 5px;
    font-family: monospace;">';

    echo "<strong>Debug Output:</strong><br>";

    foreach ($vars as $var) {
        echo '<pre style="background-color: #d1d1d1;
        color: #212529;
        padding: 10px;
        margin: 10px;
        border-radius: 5px;
        font-family: monospace;">';
        var_dump($var);
        echo '</pre>';
    }

    // Start backtrace
    $backtrace = debug_backtrace()[0];
    echo '<br><br><strong>Arquivo:</strong> ' . $backtrace['file'] . '<br>';
    echo '<strong>Linha:</strong> ' . $backtrace['line'] . '<br>';
    // End of backtrace

    echo '</pre>';
    // End of <pre> tag
    die();
}
