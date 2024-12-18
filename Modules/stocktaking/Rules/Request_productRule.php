<?php
          return [
            'create'=>[
                'request_id' =>'nullable|exists:'.$this->connection.'.stocktaking.requests,id',
                'product_id' =>'nullable',
                'quantity' =>'nullable'
            ],
            'update'=>[
                'id' =>'|unique:'.$this->connection.'.stocktaking.request_products,id,'.$this->id.',id',
                'request_id' =>'nullable|exists:'.$this->connection.'.stocktaking.requests,id',
                'product_id' =>'nullable',
                'quantity' =>'nullable'
            ]
        ];

