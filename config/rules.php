<?php

return [
    'user' => [
        'email' => 'required|string|email',
        'password' => 'required|string',
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'dob' => 'nullable|date|before:today',
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:1024'
    ],
    'user_update' => [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255'
    ],

];
