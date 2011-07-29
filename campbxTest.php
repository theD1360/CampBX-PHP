<?php

/*
 * CampBX API Library Test
 * 
 * @author    Brandon Beasley <http://brandonbeasley.com/>
 * @copyright Copyright (C) 2011 Brandon Beasley
 * @license   GNU GENERAL PUBLIC LICENSE (Version 3, 29 June 2007)
 * 
 *          Please consider donating if you use this library:
 *            
 *              1FaWb7BHALawhbUqG7g9Pq3SNc74cGsE5J
 * 
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 *  Refer to http://campbx.com/api.php for list of methods
 */

require 'campbx.php';

$campbx = new CampBX('username', 'password');

/*
 * Market Depth
 */
$depth = $campbx->xdepth();
pre_print($depth, 'Market Depth');


/*
 * Market Ticker
 */
$ticker = $campbx->xticker();
pre_print($ticker, 'Market Ticker');


/*
 * Account Balance (auth)
 */
$balance = $campbx->myfunds();
pre_print($balance, 'My Balance');


/*
 * Open Orders (auth)
 */
$orders = $campbx->myorders();
pre_print($orders, 'My Orders');


/*
 * Open Margin Positions (auth)
 */
$margins = $campbx->mymargins();
pre_print($margins, 'My Margins');


/*
 * Cancel Buy Order (auth)
 * @requires 'Type', 'OrderID'
 */
$cancelBuy = $campbx->tradecancel(array('Type' => 'Buy', 'OrderID' => '1001001001'));
pre_print($cancelBuy, 'Cancel Buy Order');


/*
 * Cancel Sell Order (auth)
 * @requires 'Type', 'OrderID'
 */
$cancelSell = $campbx->tradecancel(array('Type' => 'Sell', 'OrderID' => '1001001001'));
pre_print($cancelSell, 'Cancel Sell Order');

/*
 * QuickBuy Order (auth)
 * @requires 'TradeMode', 'Quantity', 'Price'
 */
$quickBuy = $campbx->tradeenter(array('TradeMode' => 'QuickBuy', 'Quantity' => '5.00', 'Price' => '10.00'));
pre_print($quickBuy, 'Quick Buy');

/*
 * Quick Sell Order (auth)
 * @requires 'TradeMode', 'Quantity', 'Price'
 */
$quickSell = $campbx->tradeenter(array('TradeMode' => 'QuickSell', 'Quantity' => '5.00', 'Price' => '10.00'));
pre_print($quickSell, 'Quick Buy');


/*
 * Bitcoin Send-To (auth)
 * @requires 'BTCTo', 'BTCAmt'
 */
$sendTo = $campbx->sendbtc(array('BTCTo' => '1FaWb7BHALawhbUqG7g9Pq3SNc74cGsE5J', 'BTCAmt' => '1.00'));
pre_print($sendTo, 'Bitcoin Send-To');


/*-----------------------------------------------*/
function pre_print($var, $head = NULL){
        echo '<pre>';
        echo '<h2>' . $head . '</h2>';
        print_r($var);
        echo '</pre>';
        echo '<hr>';
}