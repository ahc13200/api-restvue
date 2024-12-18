<?php
return [
    'create' => [
        'city' => 'required|max:300',
        'amount' => 'nullable|max:20'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.nomenclature.deliveries,id,' . $this->id . ',id',
        'city' => 'nullable',
        'amount' => 'nullable'
    ]
];

