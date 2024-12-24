<?php
return [
    'create' => [
        'username' => 'required|max:300|unique:' . $this->connection . '.security.users,username',
        'password' => 'required|max:200',
        'email' => 'nullable|max:50|unique:' . $this->connection . '.security.users,email'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.security.users,id,' . $this->id . ',id',
        'username' => 'required|max:300|unique:' . $this->connection . '.security.users,username,' . $this->id . ',id',
        'password' => 'max:200',
        'email' => 'nullable|max:50|unique:' . $this->connection . '.security.users,email,' . $this->id . ',id'
    ]
];

