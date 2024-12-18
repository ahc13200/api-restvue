<?php
return [
    'create' => [
        'name' => 'required|max:300',
        'acronym' => 'nullable|max:20'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.nomenclature.coins,id,' . $this->id . ',id',
        'name' => 'max:300',
        'acronym' => 'max:20'
    ]
];

