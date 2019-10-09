*select form first*

    SELECT *
      FROM first;

*select form second*

    SELECT *
      FROM second;

*select form first **JOIN** second*

    SELECT first.number_first,second.number_second  
        FROM first  
            JOIN second ON first.number_first = second.number_second;

*select form first **LEFT JOIN** second*

    SELECT first.number_first,second.number_second  
      FROM first  
        LEFT JOIN second ON first.number_first = second.number_second;

*select form first **LEFT OUTER JOIN** second*

    SELECT first.number_first,second.number_second  
      FROM first  
        LEFT OUTER JOIN second ON first.number_first = second.number_second;
    
*select form first **RIGHT JOIN** second*
    
    SELECT first.number_first,second.number_second  
      FROM first  
        RIGHT JOIN second ON first.number_first = second.number_second;
    
*select form first **RIGHT OUTER JOIN** second*
    
    SELECT first.number_first,second.number_second  
      FROM first  
        RIGHT OUTER JOIN second ON first.number_first = second.number_second;
    
*select form first **INNER JOIN** second*
    
    SELECT first.number_first,second.number_second  
      FROM first  
        INNER JOIN second ON first.number_first = second.number_second;
    
*select form first **LEFT OUTER JOIN** second*  
**UNION ALL**  
*select form first **RIGHT OUTER JOIN** second*
    
    SELECT first.number_first,second.number_second  
      FROM first  
        LEFT OUTER JOIN second ON first.number_first = second.number_second
    UNION ALL
    SELECT first.number_first,second.number_second  
      FROM first  
        RIGHT OUTER JOIN second ON first.number_first = second.number_second;

*select form first **LEFT OUTER JOIN** second*  
**UNION**  
*select form first **RIGHT OUTER JOIN** second*  
**WHERE**
   
    SELECT first.number_first,second.number_second  
      FROM first  
        LEFT OUTER JOIN second ON first.number_first = second.number_second
    UNION
    SELECT first.number_first,second.number_second  
      FROM first  
        RIGHT OUTER JOIN second ON first.number_first = second.number_second
          WHERE number_first IS NULL;