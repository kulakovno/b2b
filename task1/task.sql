
SELECT U.name, COUNT(P.id) FROM test.users U
  JOIN test.phone_numbers P ON P.user_id = U.id
WHERE  U.gender = 2 AND TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(U.birth_date), NOW()) BETWEEN 18 AND 22
GROUP BY P.user_id;

#Добавим пару индексов
ALTER TABLE test.users ADD INDEX `bd` (`birth_date`);
ALTER TABLE test.phone_numbers ADD INDEX `uid` (`user_id`);