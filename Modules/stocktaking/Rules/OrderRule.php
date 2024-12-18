<?php
          return [
            'create'=>[
                'total_amount' =>'nullable',
                'date' =>'nullable|date',
                'type_payment' =>'nullable|max:255',
                'is_delivery' =>'nullable|boolean',
                'delivery_amount' =>'nullable',
                'client_id' =>'nullable|exists:'.$this->connection.'.admin.clients,id',
                'status' =>'nullable|max:255'
            ],
            'update'=>[
                'id' =>'|unique:'.$this->connection.'.stocktaking.orders,id,'.$this->id.',id',
                'total_amount' =>'nullable',
                'date' =>'nullable|date',
                'type_payment' =>'nullable|max:255',
                'is_delivery' =>'nullable|boolean',
                'delivery_amount' =>'nullable',
                'client_id' =>'nullable|exists:'.$this->connection.'.admin.clients,id',
                'status' =>'nullable|max:255'
            ]
        ];

