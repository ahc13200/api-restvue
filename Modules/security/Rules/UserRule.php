<?php
return [
    'create' => [
        'username' => 'required|max:300',
        'password' => 'required|max:200',
        'email' => 'nullable|max:50'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.security.users,id,' . $this->id . ',id',
        'username' => 'max:300',
        'password' => 'max:200',
        'email' => 'nullable|max:50|unique:' . $this->connection . '.security.users,email,' . $this->id . ',id'
    ]
];

