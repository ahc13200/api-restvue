<?php
return [
    'create' => [
        'worker_id' => 'nullable|exists:' . $this->connection . '.admin.workers,id',
        'description' => 'required|max:300',
        'status' => 'nullable|max:255',
        'date' => 'nullable|date'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.stocktaking.requests,id,' . $this->id . ',id',
        'worker_id' => 'nullable|exists:' . $this->connection . '.admin.workers,id',
        'description' => 'required',
        'status' => 'nullable|max:255',
        'date' => 'nullable|date'
    ]
];

