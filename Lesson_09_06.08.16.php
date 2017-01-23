<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 06.08.2016
 * Time: 11:32
 */
$host = 'localhost';
$db = 'classicmodels';
$login = 'root';
$password = '';

$sql[] = "
SELECT `offices`.`officeCode` as office_id, COUNT(`employees`.`employeeNumber`) as worker_count
  FROM offices 
    JOIN employees 
    ON `offices`.`officeCode` =  `employees`.`officeCode`
      GROUP BY `offices`.`officeCode`
";

$sql[] = "
SELECT YN,name,S
    FROM ( SELECT ROUND(sum(amount),2) as S, YEAR(paymentdate) as YN, MONTH(payments.paymentDate) as MID
              FROM payments
                  GROUP BY 2,3
          union SELECT ROUND(sum(amount),2) as S, YEAR(paymentdate) as YN, 13 as MID
              FROM payments
                  GROUP BY 2,3
    	) table1
            INNER JOIN month ON month.id = table1.MID
     		    ORDER BY 1,id
";

$sql[] = "
SELECT o1.orderNumber, 
       o1.orderDate, 
       o1.customerNumber,
       o2.orderNumber as orderNumber2, 
       o2.orderDate as orderDate2, 
       o2.customerNumber as customerNumber2,
       period_diff(date_format(o1.orderDate, '%y%m'),date_format(o2.orderDate,'%y%m' )) as diff
    FROM orders as o1
        INNER JOIN orders as o2 ON o1.customerNumber = o2.customerNumber
        AND o1.orderDate > o2.orderDate 
        AND NOT EXISTS(
            SELECT *
                FROM orders o3 
                    WHERE o1.customerNumber = o3.customerNumber
                    AND o3.orderDate 
                        BETWEEN o1.orderDate AND o2.orderDate
            )
        AND period_diff(date_format(o1.orderDate, '%y%m'),date_format(o2.orderDate,'%y%m' )) > 3
            GROUP BY o1.customerNumber
                ORDER BY o1.customerNumber ASC
";

$connection = mysqli_connect($host, $login, $password, $db);

foreach ($sql as $item ) {

    if (!$result = mysqli_query($connection, $item)) {
        die(mysqli_errno($connection));
    }

//$total = array();
//$year_total = 0;

    echo "<table border=1px>";

    echo "<tr>";
    foreach ($row = mysqli_fetch_assoc($result) as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    do {
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
//        $total[] = ($row['name']=='Total')?(float)$row['S']:0;
    } while ($row = mysqli_fetch_assoc($result));

//    foreach ($total as $key=>$value) {
//        $year_total += $value;
//    }

//    echo "<tr>
//            <td>"."All years"."</td>
//            <td>".""."</td>
//            <td>".$year_total."</td>
//        </tr>";

    echo "</table>.<br>";
}
