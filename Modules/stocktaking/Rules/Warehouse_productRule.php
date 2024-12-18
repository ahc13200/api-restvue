<?php
return [
    'create' => [
        'product_id' => 'nullable|exists:' . $this->connection . '.admin.products,id',
        'quantity' => 'nullable',
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.stocktaking.warehouse_products,id,' . $this->id . ',id',
        'product_id' => 'nullable|exists:' . $this->connection . '.admin.products,id',
        'quantity' => 'nullable',
    ]
];

