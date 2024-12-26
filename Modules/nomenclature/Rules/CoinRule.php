<?php
return [
    'create' => [
        'name' => 'required|max:30',
        'acronym' => 'nullable|max:20|unique:' . $this->connection . '.nomenclature.coins,acronym'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.nomenclature.coins,id,' . $this->id . ',id',
        'name' => 'max:300',
        'acronym' => 'max:20|unique:' . $this->connection . '.nomenclature.coins,acronym,' . $this->id . ',id'
    ]
];

