<?php

namespace Tests;

use App\Models\User;
use Illuminate\Support\Facades\DB;

trait AuthEnv{

    protected $user;

    /**
     * @param array $options
     */
    protected function createUser($options = []){
        if(count($options)){
            $this->user = factory(User::class)->create($options);
        }else{
            $this->user = factory(User::class)->create();
        }
    }


    protected function setUp(): void{
        parent::setUp();
        DB::beginTransaction();
    }

    protected function tearDown(): void{
        DB::rollBack();
        parent::tearDown();
    }
}