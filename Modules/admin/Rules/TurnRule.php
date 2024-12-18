<?php
return [
    'create' => [
        'code' => 'required|max:10',
        'working_day' => 'nullable|max:255',
        'entry_time' => 'nullable|max:255',
        'departure_time' => 'nullable|max:255'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.admin.turns,id,' . $this->id . ',id',
        'code' => 'max:10',
        'working_day' => 'nullable|max:255',
        'entry_time' => 'nullable|max:255',
        'departure_time' => 'nullable|max:255'
    ]
];

