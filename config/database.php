<?php

function getDatabaseConfig(): array
{


    return [
        "database" => [
            "test" => [
                "url" => "mysql:host=103.163.138.23;dbname=neojtech_rumah",
                "username" => "neojtech_rumah",
                "password" => "Gregorio1999"
            ],
            "prod" => [
                "url" => "mysql:host=103.163.138.23;dbname=neojtech_rumah",
                "username" => "neojtech_rumah",
                "password" => "Gregorio1999"
            ]
        ]
    ];
}