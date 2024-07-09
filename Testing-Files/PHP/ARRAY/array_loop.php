<?php


// Simulating database records for customers, orders, and order items
$customers = [
    ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
    ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
];


$orders = [
    ['id' => 1, 'customer_id' => 1, 'created_at' => '2023-05-15', 'discount' => 0.1, 'tax_rate' => 0.2],
    ['id' => 2, 'customer_id' => 1, 'created_at' => '2023-05-16', 'discount' => 0.05, 'tax_rate' => 0.15],
    ['id' => 3, 'customer_id' => 2, 'created_at' => '2023-05-17', 'discount' => 0.2, 'tax_rate' => 0.1],
];


$orderItems = [
    ['order_id' => 1, 'product_name' => 'Laptop', 'quantity' => 1, 'unit_price' => 1000],
    ['order_id' => 1, 'product_name' => 'Mouse', 'quantity' => 2, 'unit_price' => 50],
    ['order_id' => 2, 'product_name' => 'Keyboard', 'quantity' => 1, 'unit_price' => 100],
    ['order_id' => 2, 'product_name' => 'Monitor', 'quantity' => 2, 'unit_price' => 300],
    ['order_id' => 3, 'product_name' => 'Chair', 'quantity' => 1, 'unit_price' => 200],
    ['order_id' => 3, 'product_name' => 'Desk', 'quantity' => 1, 'unit_price' => 300],
];


function getOrderItems($orderId , $allOrderItems){ //  orderId = 2

  $orderData =  array_filter($allOrderItems , function($item) use ($orderId)  {

        return $item['order_id'] == $orderId;
    });

    return $orderData;
}

$customerOrderData = [];

foreach ($customers as $key => $customer) {
   
    $totalSpending = 0;
    $orderSummery =  [];

      $customerOrders =  array_filter($orders , function ($order) use ($customer) {

            return $order['customer_id'] == $customer['id'];
        });

        // individual customer wise orders

   foreach ($customerOrders as $key => $customer_order) {

    $orderTotal  = 0;

    $customer_wise_order_items = getOrderItems($customer_order['id'] , $orderItems);

    foreach ($customer_wise_order_items as $key => $order_item) {

        $subtotal = $order_item['quantity'] * $order_item['unit_price'];

        $orderTotal +=  $subtotal;
       
    }

    $orderDiccountAmount = $orderTotal * $customer_order['discount'];
    $orderTotal -= $orderDiccountAmount;

    /* Tax amount must be added */
    
    $textAmount = $orderTotal * $customer_order['tax_rate'];

    $orderTotal += $textAmount;


    $totalSpending += $orderTotal; 

    $orderSummery[] = [
        'order_id' => $customer_order['id'],
        'order_total' =>  $orderTotal,
        'order_data' => $customer_order['created_at'],
        'discount' => number_format($orderDiccountAmount , 2),
        'tax' => number_format($textAmount , 2),
        'items' => array_map(function($item){
           return [
            'product_name' => $item['product_name'],
            'quantity' => $item['quantity'],
            'unit_price'=> $item['unit_price'],
           ];

        }, $customer_wise_order_items),

    ];

   }

   $customerOrderData[] = [
    'customer_id' => $customer['id'],
    'customer_name'=> $customer['name'],
    'customer_email'=> $customer['email'],
    'customer_total'=>$totalSpending,
    'orders' => $orderSummery,
   ];

}

header('content-type: application/json');

echo json_encode($customerOrderData ,JSON_PRETTY_PRINT);

