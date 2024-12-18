<?php
return [
    'create' => [
        'permission_id' => 'nullable|exists:' . $this->connection . '.security.permissions,id',
        'role_id' => 'nullable|exists:' . $this->connection . '.security.roles,id'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.security.role_permissions,id,' . $this->id . ',id',
        'permission_id' => 'nullable|exists:' . $this->connection . '.security.permissions,id',
        'role_id' => 'nullable|exists:' . $this->connection . '.security.roles,id'
    ]
];

