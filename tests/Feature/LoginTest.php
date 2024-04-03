<?php

test('Check the server is running while login', function () {
    $response = $this->post('/login');
    $response->assertStatus(200);
});
test('Check the server is running while passenger registration', function () {
    $response = $this->post('/register-passenger');
    $response->assertStatus(200);
});
