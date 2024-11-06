<?php
class Test
{
    use Model;
    protected $table='test';
    protected $allowedColumns=[
        'Name',
        'Age',
    ];
}