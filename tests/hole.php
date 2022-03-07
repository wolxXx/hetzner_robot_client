<?php

$uri = $_SERVER['REQUEST_URI'];

switch (true) {
    case '/foo' === substr($uri, 0, strlen('/foo')): {
        header('foo: bar', true, 500);
        echo json_encode([
        ], JSON_PRETTY_PRINT);
    }
}