<?php
          return [
            'create'=>[
                'order_id' =>'nullable|exists:'.$this->connection.'.stocktaking.orders,id',
                'product_id' =>'nullable|exists:'.$this->connection.'.admin.products,id',
                'quantity' =>'nullable'
            ],
            'update'=>[
                'id' =>'|unique:'.$this->connection.'.stocktaking.order_products,id,'.$this->id.',id',
                'order_id' =>'nullable|exists:'.$this->connection.'.stocktaking.orders,id',
                'product_id' =>'nullable|exists:'.$this->connection.'.admin.products,id',
                'quantity' =>'nullable'
            ]
        ];

