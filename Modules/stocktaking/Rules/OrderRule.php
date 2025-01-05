<?php
return [
    'create' => [
        'total_amount' => 'nullable',
        'date' => 'nullable|date',
        'type_payment' => 'required|max:255',
        'is_delivery' => 'nullable|boolean',
        'delivery_amount' => 'nullable',
        'client_id' => 'nullable|exists:' . $this->connection . '.admin.clients,id|required_if:created_in,administración',
        'client' => 'nullable|required_if:created_in,shopping',
        'status' => 'nullable|max:255'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.stocktaking.orders,id,' . $this->id . ',id',
        'total_amount' => 'nullable',
        'date' => 'nullable|date',
        'type_payment' => 'required|max:255',
        'is_delivery' => 'nullable|boolean',
        'delivery_amount' => 'nullable',
        'client_id' => 'nullable|exists:' . $this->connection . '.admin.clients,id|required_if:created_in,administración',
        'status' => 'nullable|max:255'
    ]
];

