<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;

class OrdersDetails extends Model
{
    use HasFactory;
    private static $orderDetails;
    public static function newOrderDetails($order){

        foreach (Cart::content() as $item){
            self::$orderDetails = new OrdersDetails();
            self::$orderDetails->order_id = $order->id;
            self::$orderDetails->product_id = $item->id;
            self::$orderDetails->product_name = $item->name;
            self::$orderDetails->product_color = $item->options->color;
            self::$orderDetails->product_size = $item->options->size;
            self::$orderDetails->product_price = $item->price;
            self::$orderDetails->product_qty = $item->qty;
            self::$orderDetails->save();

            Cart::remove($item->rowId);
        }

    }
}
