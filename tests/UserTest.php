<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $dados = [
            'name' => 'Name 01',
            'email' => 'email@exemplo.com',
            'password' => '12345'
        ];
        $this->post('/api/user', $dados); //testar primeiro medoto 'creater User'
        $this->assertResponseOk(); //vai retornar se a pagina existe

        $resposta = (array) json_decode($this->response->content());
        $this->assertArrayHasKey('name', $resposta); //ele vai procurar se na resposta tem algum campo com o nome 'name'
        $this->assertArrayHasKey('email', $resposta);
        $this->assertArrayHasKey('id', $resposta);
    }
}
