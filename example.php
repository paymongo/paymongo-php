<?php
 
//use init.php when not using composer's autoload
//require '/pathtopaymongo/init.php'
require 'init.php';
  
\Paymongo\Paymongo::setApiKey('sk_test_....');

// try {
//     $tokenObject = \Paymongo\Token::create(
//         [
//             'number' => '4123450131000508',
//             'exp_month' => 10,
//             'exp_year' => 22,
//             'cvc' => '123',
//             'billing' => [
//                 'address' => [
//                     'line1' => '',
//                     'line2' => '',
//                     'city' => '',
//                     'state' => '',
//                     'postal_code' => '',
//                     'country' => ''
//                 ],
//                 'name' => 'asdf',
//                 'email' => 'kp.bongolan@gmail.com',
//                 'phone' => '',
//             ]
//         ]
//     );
//     // $tokenObject = \Paymongo\Token::create(
//     //     [
//     //         'card' => [
//     //             'number' => '4123450131000508',
//     //             'exp_month' => 10,
//     //             'exp_year' => 22,
//     //             'cvc' => '123',
//     //             'billing' => [
//     //                 'address' => [
//     //                     'line1' => '',
//     //                     'line2' => '',
//     //                     'city' => '',
//     //                     'state' => '',
//     //                     'postal_code' => '',
//     //                     'country' => ''
//     //                 ],
//     //                 'name' => 'asdf',
//     //                 'email' => 'kp.bongolan@gmail.com',
//     //                 'phone' => '',
//     //             ]
//     //         ]
//     //     ]
//     // );
// } catch (\Paymongo\Exception\AuthenticationException $exception) {
//     echo "Auth Exception";
// }
// var_dump($tokenObject);
// echo '</br>';
// var_dump($tokenObject->id);
// echo '</br>';
// // $tokenObject = \Paymongo\Token::get('tok_ZY5dUb3EWpAe88uUvg8DTJLc');
// // var_dump($tokenObject);
// // echo '</br>';
// // var_dump($tokenObject->id);
// echo '</br>';
// $paymentObject = \Paymongo\Payment::get('pay_dH1jT3kT3shJEUnATEaT5btQ');
// var_dump($paymentObject);

// $paymentObject = \Paymongo\Payment::create(
//     [
//         'amount' => 10000,
//         'currency' => 'PHP',
//         'description' => '',
//         'source' => [
//             'id' => $tokenObject->id,
//             'type' => 'token',
//         ],
//         'statement_descriptor' => ''
//     ]
// );
// echo '</br>';
// var_dump($paymentObject);

var_dump(\Paymongo\Payment::index());