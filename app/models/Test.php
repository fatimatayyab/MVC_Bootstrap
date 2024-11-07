<?php
class Test
{
    use Model;
    protected $table='test';
    protected $allowedColumns=[
        'Name',
        'Age',
    ];

    public function validate($data)
    {
        if(empty($data['Name']) || empty($data['Age']))
        {
            return false;
        }
        return true;
    }
}