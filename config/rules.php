<?php

return [
    'user' => [
        'email' => 'required|string|email|unique:users,email',
        'password' => 'required|string',
        'name' => 'required|string|max:40',
        'dob' => 'nullable|date|before:today',
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:1024'
    ],
    'user_update' => [
        'name' => 'required|string|max:40',
        'email' => 'required|string|email|max:40'
    ],

];
