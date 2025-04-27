<?php 
return new PDO(
    'sqlite:database.db',
    null,
    null,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC | PDO::FETCH_CLASS
    ]
);