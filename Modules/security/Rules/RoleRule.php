<?php
          return [
            'create'=>[
                'name' =>'required|max:300',
                'description' =>'nullable|max:300'
            ],
            'update'=>[
                'id' =>'|unique:'.$this->connection.'.security.roles,id,'.$this->id.',id',
                'name' =>'max:300',
                'description' =>'nullable|max:300'
            ]
        ];

