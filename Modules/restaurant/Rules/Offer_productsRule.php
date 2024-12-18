<?php
          return [
            'create'=>[
                'offer_id' =>'nullable|exists:'.$this->connection.'.restaurant.offers,id',
                'product_id' =>'nullable|exists:'.$this->connection.'.admin.products,id',
                'quantity' =>'nullable'
            ],
            'update'=>[
                'id' =>'|unique:'.$this->connection.'.restaurant.offer_products,id,'.$this->id.',id',
                'offer_id' =>'nullable|exists:'.$this->connection.'.restaurant.offers,id',
                'product_id' =>'nullable|exists:'.$this->connection.'.admin.products,id',
                'quantity' =>'nullable'
            ]
        ];

