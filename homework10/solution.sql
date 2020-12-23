#1 Подсчитать количество книг каждого автора (наименований).
# Столбцы ответа: Имя автора, общее количество книг

SELECT author.NAME, count(BOOK_ID) as TOTAL_BOOKS
FROM author INNER JOIN author_book
ON author_book.AUTHOR_ID = author.ID GROUP BY author_book.AUTHOR_ID;



#2 Подсчитать суммарный остаток книг каждого автора во всех магазинах.
# Столбцы ответа: Имя автора, Город магазина, Суммарный остаток книг

SELECT NAME, CITY, sum(QUANTITY) as TOTAL_BOOKS
FROM (
    SELECT store.CITY, book_store.BOOK_ID, book_store.QUANTITY
    FROM book_store INNER JOIN store
    ON store.ID = book_store.STORE_ID) AS fst
INNER JOIN (
    SELECT author_book.BOOK_ID, author.NAME
    FROM author_book INNER JOIN author
    ON author_book.AUTHOR_ID = author.ID) AS  scd
ON scd.BOOK_ID = fst.BOOK_ID
GROUP BY NAME, CITY;



#3 Вывести среднюю стоимость книг издательства «Азбука».
# Столбцы ответа: Название книги, средняя стоимость.

SELECT BOOKNAME_STORE.NAME, AVG(BOOKNAME_STORE.PRICE) AS AZB_AVARAGE FROM
    (SELECT NAME, BOOK_ID, PRICE FROM book_store
    INNER JOIN book
    ON BOOK_ID=book.ID) AS BOOKNAME_STORE
WHERE BOOKNAME_STORE.BOOK_ID IN
      (SELECT ID FROM book
       WHERE PUBLISHER_ID=(
                SELECT ID FROM publisher
                WHERE NAME='Азбука' LIMIT 1))
GROUP BY BOOKNAME_STORE.NAME;




#4 Вывести стоимость книг издательства «Азбука» в каждом магазине.
# Столбцы ответа: Город, Название книги, стоимость

SELECT st.CITY, ft.BOOK_NAME, st.PRICE FROM
    (SELECT book.ID, book.NAME as BOOK_NAME FROM book RIGHT JOIN
    (SELECT ID FROM publisher WHERE NAME='Азбука' LIMIT 1) AS pubs
    ON book.PUBLISHER_ID = pubs.ID) AS ft
LEFT JOIN
    (SELECT book_store.BOOK_ID, store.CITY, book_store.PRICE FROM book_store
    INNER JOIN store on store.ID = book_store.STORE_ID) as st ON st.BOOK_ID = ft.ID;



#5 Вывести разницу между остатком книг в Калининграде и Черняховске.
# Столбцы ответа: Название книги, остаток в Калининграде, остаток в Черняховске, Разница.

SELECT book.NAME, qtable.FIRST_STORE, qtable.SECOND_STORE, (qtable.FIRST_STORE - qtable.SECOND_STORE) as DIFFERENCE
from book
INNER JOIN
    (
        SELECT ft.BOOK_ID as BOOK_ID, ft.QUANTITY as FIRST_STORE, COALESCE(st.QUANTITY,0) as SECOND_STORE  FROM
            (SELECT book_store.BOOK_ID, store.CITY as STORE_NAME, book_store.QUANTITY FROM
                book_store INNER JOIN store ON book_store.STORE_ID = store.ID WHERE store.CITY = 'Калининград') AS ft
                LEFT JOIN
            (SELECT book_store.BOOK_ID, store.CITY as STORE_NAME, book_store.QUANTITY FROM
                book_store INNER JOIN store ON book_store.STORE_ID = store.ID WHERE store.CITY = 'Черняховск') AS st
            ON st.BOOK_ID = ft.BOOK_ID
        ) AS qtable
ON book.ID = qtable.BOOK_ID;


