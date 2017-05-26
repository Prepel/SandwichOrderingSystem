<?php
spl_autoload_register( 'autoLoad' );

function autoLoad( $class )
{
    $class = str_replace( '\\', '/', $class );

    $file = __DIR__ . '/src/' . $class . '.php';
    if (is_file( $file )) {
        require_once $file;
    }
}
