<?php

class Model_Portfolio extends Model
{
    public function get_data()
    {
        return DB::query('select * from portfolio');
    }
}
