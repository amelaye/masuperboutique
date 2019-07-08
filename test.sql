SET @id_livre = 1;
SET @req = CONCAT('SELECT * FROM livre WHERE id_livre = ', @id_livre);
PREPARE mon_livre
FROM @req;