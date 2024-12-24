<?php
return [
    'create' => [
        'city' => 'required|max:300||unique:' . $this->connection . '.nomenclature.deliveries',
        'amount' => 'nullable|max:20'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.nomenclature.deliveries,id,' . $this->id . ',id',
        'city' => 'nullable||unique:' . $this->connection . '.nomenclature.deliveries,city,' . $this->id . ',id',
        'amount' => 'nullable'
    ]
];

