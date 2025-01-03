<?php
return [
    'create' => [
        'provider_id' => 'required|exists:' . $this->connection . '.admin.providers,id',
        'amount' => 'nullable',
        'code' => 'required|unique:' . $this->connection . '.stocktaking.invoices,code',
        'date' => 'nullable',
        'status' => 'nullable',
        'worker_id' => 'nullable|exists:' . $this->connection . '.admin.workers,id'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.stocktaking.invoices,id,' . $this->id . ',id',
        'provider_id' => 'nullable|exists:' . $this->connection . '.admin.providers,id',
        'amount' => 'nullable',
        'code' => 'required|unique:' . $this->connection . '.stocktaking.invoices,code,' . $this->id . ',id',
        'date' => 'nullable',
        'status' => 'nullable',
        'worker_id' => 'nullable|exists:' . $this->connection . '.admin.workers,id'
    ]
];

