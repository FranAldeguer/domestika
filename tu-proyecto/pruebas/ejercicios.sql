############
# BLOQUE 1 #
############
https://parzibyte.me/blog/2018/02/06/ejercicios-resueltos-consultas-sql-mysql/#Bloque_1

#1. Listar los nombres de los usuarios
SELECT nombre FROM `tblusuarios`;

#2. Calcular el saldo máximo de los usuarios de sexo “Mujer”
SELECT MAX(saldo) FROM tblusuarios WHERE sexo = "M";

#3. Listar nombre y teléfono de los usuarios con teléfono NOKIA, BLACKBERRY o SONY
SELECT nombre, telefono, marca FROM tblusuarios WHERE marca="SAMSUNG" OR marca="BLACKBERRY" OR marca="SONY";

#4. Contar los usuarios sin saldo o inactivos
SELECT COUNT(*) FROM tblusuarios WHERE saldo = 0 OR activo = 0;

#5. Listar el login de los usuarios con nivel 1, 2 o 3
SELECT usuario FROM tblusuarios WHERE nivel IN (1, 2, 3);

#6. Listar los números de teléfono con saldo menor o igual a 300
SELECT telefono FROM tblusuarios WHERE saldo <= 300;

#7. Calcular la suma de los saldos de los usuarios de la compañia telefónica NEXTEL
SELECT SUM(saldo) FROM tblusuarios WHERE compañia = "NEXTEL";

#8. Contar el número de usuarios por compañía telefónica
SELECT compañia, COUNT(*) FROM tblusuarios GROUP BY compañia;

#9. Contar el número de usuarios por nivel
SELECT nivel, COUNT(*) FROM tblusuarios GROUP BY nivel;

#10. Listar el login de los usuarios con nivel 2
SELECT usuario FROM tblusuarios WHERE nivel = 2;

#11. Mostrar el email de los usuarios que usan gmail
SELECT email FROM tblusuarios WHERE email LIKE "%gmail%";

#12. Listar nombre y teléfono de los usuarios con teléfono LG, SAMSUNG o MOTOROLA
SELECT nombre, telefono FROM tblusuarios WHERE marca IN("LG", "SAMSUNG", "MOTOROLA");


############
# BLOQUE 2 #
############
https://parzibyte.me/blog/2018/02/06/ejercicios-resueltos-consultas-sql-mysql/#Bloque_2

#1. Listar nombre y teléfono de los usuarios con teléfono que no sea de la marca LG o SAMSUNG
SELECT nombre, telefono, marca FROM tblusuarios WHERE marca NOT IN("LG", "SAMSUNG");

#2. Listar el login y teléfono de los usuarios con compañia telefónica IUSACELL
SELECT usuario, telefono FROM tblusuarios WHERE compañia = "IUSACELL";

#3. Listar el login y teléfono de los usuarios con compañia telefónica que no sea TELCEL
SELECT usuario, telefono, compañia FROM tblusuarios WHERE compañia != "TELCEL";

#4. Calcular el saldo promedio de los usuarios que tienen teléfono marca NOKIA
SELECT avg(saldo) FROM tblusuarios where marca = "NOKIA";

#5. Listar el login y teléfono de los usuarios con compañia telefónica IUSACELL o AXEL
SELECT usuario, telefono, compañia FROM tblusuarios WHERE compañia IN ("IUSACELL", "AXEL");

#6. Mostrar el email de los usuarios que no usan yahoo
select nombre, email FROM tblusuarios where email NOT LIKE ("%yahoo%");

#7. Listar el login y teléfono de los usuarios con compañia telefónica que no sea TELCEL o IUSACELL
SELECT usuario, telefono, compañia FROM tblusuarios WHERE compañia NOT IN ("TELCEL", "IUSACELL");

#8. Listar el login y teléfono de los usuarios con compañia telefónica UNEFON
SELECT usuario, telefono, compañia FROM tblusuarios WHERE compañia = "UNEFON";

#9. Listar las diferentes marcas de celular en orden alfabético descendentemente
SELECT marca FROM tblusuarios group by marca ASC;

#10. Listar las diferentes compañias en orden alfabético aleatorio
SELECT compañia FROM tblusuarios group by compañia order by rand();

#11. Listar el login de los usuarios con nivel 0 o 2
SELECT usuario, nivel FROM tblusuarios WHERE nivel IN(0, 2);

#12. Calcular el saldo promedio de los usuarios que tienen teléfono marca LG
SELECT avg(saldo) FROM tblusuarios WHERE marca = "LG";

############
# BLOQUE 3 #
############
https://parzibyte.me/blog/2018/02/06/ejercicios-resueltos-consultas-sql-mysql/#Bloque_3

#1. Listar el login de los usuarios con nivel 1 o 3
SELECT usuario, nivel FROM tblusuarios WHERE nivel IN (1, 3);

#2. Listar nombre y teléfono de los usuarios con teléfono que no sea de la marca BLACKBERRY
SELECT nombre, telefono, marca FROM tblusuarios WHERE marca != "BLACKBERRY";

#3. Listar el login de los usuarios con nivel 3
select usuario, nivel FROM tblusuarios WHERE nivel = 3;

#4. Listar el login de los usuarios con nivel 0
select usuario, nivel FROM tblusuarios WHERE nivel = 0;

#5. Listar el login de los usuarios con nivel 1
select usuario, nivel FROM tblusuarios WHERE nivel = 1;

#6. Contar el número de usuarios por sexo
SELECT sexo, count(sexo) FROM tblusuarios GROUP BY sexo;

#7. Listar el login y teléfono de los usuarios con compañia telefónica AT&T
SELECT usuario, telefono, compañia FROM tblusuarios WHERE compañia = "AT&T";

#8. Listar las diferentes compañias en orden alfabético descendentemente
SELECT compañia FROM tblusuarios group by compañia order by compañia DESC;

#9. Listar el logn de los usuarios inactivos
SELECT usuario FROM tblusuarios WHERE NOT activo;

#10. Listar los números de teléfono sin saldo
SELECT telefono, saldo FROM tblusuarios WHERE saldo <= 0;

#11. Calcular el saldo mínimo de los usuarios de sexo “Hombre”
SELECT MIN(saldo) FROM tblusuarios WHERE sexo = "H";

#12. Listar los números de teléfono con saldo mayor a 300
SELECT telefono, saldo FROM tblusuarios WHERE saldo > 300;

############
# BLOQUE 4 #
############
https://parzibyte.me/blog/2018/02/06/ejercicios-resueltos-consultas-sql-mysql/#Bloque_4

#1. Contar el número de usuarios por marca de teléfono
SELECT marca, count(*) as total FROM tblusuarios group by marca;

#2. Listar nombre y teléfono de los usuarios con teléfono que no sea de la marca LG
SELECT nombre, telefono FROM tblusuarios WHERE marca != "LG";

#3. Listar las diferentes compañias en orden alfabético ascendentemente
SELECT compañia FROM tblusuarios group by compañia ORDER BY compañia ASC;

#4. Calcular la suma de los saldos de los usuarios de la compañia telefónica UNEFON
SELECT SUM(saldo) FROM tblusuarios WHERE compañia = "UNEFON";

#5. Mostrar el email de los usuarios que usan hotmail
SELECT email FrOM tblusuarios WHERE email LIKE ("%hotmail%");

#6. Listar los nombres de los usuarios sin saldo o inactivos
SELECt nombre, saldo, activo FROM tblusuarios WHERE saldo <= 0 OR NOT activo;

#7. Listar el login y teléfono de los usuarios con compañia telefónicaIUSACELL o TELCEL
SELECT usuario, telefono, compañia FROM tblusuarios WHERE compañia IN ("IUSACELL", "TELCEL");

#8. Listar las diferentes marcas de celular en orden alfabético ascendentemente
SELECT marca FROM tblusuarios GROUP By marca ORDER BY marca ASC;

#9. Listar las diferentes marcas de celular en orden alfabético aleatorio
SELECT marca FROM tblusuarios group by marca ORDER BY RAND();

#10. Listar el login y teléfono de los usuarios con compañia telefónica IUSACELL o UNEFON
select usuario, telefono, compañia FROM tblusuarios WHERE compañia IN ("IUSACELL", "UNEFON");

#11. Listar nombre y teléfono de los usuarios con teléfono que no sea de la marca MOTOROLA o NOKIA
SELECT nombre, telefono, marca FROM tblusuarios WHERE marca NOT IN ("MOTOROLA", "NOKIA");

#12. Calcular la suma de los saldos de los usuarios de la compañia telefónica TELCEL
SELECT SUM(saldo) FROM tblusuarios WHERE compañia = "TELCEL";

#################################
# EJERCICIOS DISCO DURO DE ROER #
#################################
https://www.discoduroderoer.es/ejercicios-propuestos-y-resueltos-de-consultas-mysql-empleados-y-departamentos/

#1. Obtener los datos completos de los empleados.
select * from empleados;

#2. Obtener los datos completos de los departamentos.
select * from departamentos;

#3. Obtener los datos de los empleados con cargo ‘Secretaria’.
Select * FROM empleados WHERE lower(cargoE) = "secretaria";

#4. Obtener el nombre y salario de los empleados.
select nomEmp, salEmp FROM empleados;

#5. Obtener los datos de los empleados vendedores, ordenado por nombre.
Select * from empleados WHERE lower(cargoE) = "vendedor" order by nomEmp ASC;

#6. Listar el nombre de los departamentos.
select nombreDpto from departamentos group by nombreDpto;

#7. Obtener el nombre y cargo de todos los empleados, ordenado por salario.
select nomEmp, cargoE, salEmp from empleados order by salEmp DESC;

#8. Listar los salarios y comisiones de los empleados del departamento 2000, ordenado por comisión.
select salEmp, comisionE from empleados where codDepto = 2000 order by comisionE;

#9. Listar todas las comisiones.
select comisionE from empleados group by comisionE;

#10. Obtener el valor total a pagar que resulta de sumar a los empleados del departamento 3000 una bonificación de 500.000, en orden alfabético del empleado
select nomEmp, salEmp, (salEmp + 500000) as total from empleados where codDepto = 3000 order by nomEmp;

#11. Obtener la lista de los empleados que ganan una comisión superior a su sueldo.
Select nomemp, salemp, comisione from empleados WHERE salEmp < comisionE;

#12. Listar los empleados cuya comisión es menor o igual que el 30% de su sueldo.
select nomemp, salemp, comisione from empleados WHERE comisionE <= (salEmp*0.3);

#13.Elabore un listado donde para cada fila, figure ‘Nombre’ y ‘Cargo’ antes del valor respectivo para cada empleado.
select "Nombre", nomEmp, "Cargo", cargoE from empleados;

#14. Hallar el salario y la comisión de aquellos empleados cuyo número de documento de identidad es superior al ‘19.709.802’.
select salEmp, comisionE, nDIEmp from empleados WHERE nDIEmp > "19.709.802";

#15. Muestra los empleados cuyo nombre empiece entre las letras J y Z (rango). Liste estos empleados y su cargo por orden alfabético.
select * from empleados WHERE lower(nomEmp) between "j" and "z" order by nomEmp;

#16. Listar el salario, la comisión, el salario total (salario + comisión), documento de identidad del empleado y nombre, de aquellos empleados que tienen comisión superior a 1.000.000, ordenar el informe por el número del documento de identidad
select salEmp, comisionE, (salEmp + comisionE) as "Salario total", nDIEmp, nomEmp from empleados WHERE comisionE > 1000000 order by nDIEmp;

#17. Obtener un listado similar al anterior, pero de aquellos empleados que NO tienen comisión
select salEmp, comisionE, (salEmp + comisionE) as "Salario total", nDIEmp, nomEmp from empleados WHERE comisionE = 0 order by nDIEmp;

#18. Hallar los empleados cuyo nombre no contiene la cadena “MA”
select * from empleados where lower(nomEmp) not like ("%ma%");

#19. Obtener los nombres de los departamentos que no sean “Ventas” ni “Investigación” NI ‘MANTENIMIENTO’.
select nombreDpto from departamentos WHERE lower(nombreDpto) not in ("ventas", "investigación", "mantenimiento");

#20. Obtener el nombre y el departamento de los empleados con cargo ‘Secretaria’ o ‘Vendedor’, que no trabajan en el departamento de “PRODUCCION”, cuyo salario es superior a $1.000.000, ordenados por fecha de incorporación.
select nomEmp, nombreDpto
FROM empleados, departamentos
WHERE lower(cargoE) in ("secretaria", "vendedor")
	AND lower(departamentos.nombreDpto) != "producción"
	AND salEmp > 1000000
	AND empleados.codDepto = departamentos.codDepto
order by fecIncorporacion;

#21. Obtener información de los empleados cuyo nombre tiene exactamente 11 caracteres
SELECT * FROM empleados where length(nomEmp) = 11;

#22. Obtener información de los empleados cuyo nombre tiene al menos 11 caracteres
SELECT * FROM empleados where length(nomEmp) >= 11;

#23. Listar los datos de los empleados cuyo nombre inicia por la letra ‘M’, su salario es mayor a $800.000 o reciben comisión y trabajan para el departamento de ‘VENTAS’
select e.* from empleados e, departamentos d WHERE lower(e.nomEmp) like "m%" AND (e.salEmp > 800000 or e.comisionE > 0) and lower(d.nombreDpto) = "ventas" and e.codDepto = d.codDepto;

#24. Obtener los nombres, salarios y comisiones de los empleados que reciben un salario situado entre la mitad de la comisión la propia comisión.
select nomEmp, salEmp, comisionE From empleados WHERE salEmp between comisionE*0.5 AND comisionE;

#25. Mostrar el salario más alto de la empresa.
select max(salEmp) from empleados;

#26. Mostrar cada una de las comisiones y el número de empleados que las reciben. Solo si tiene comision.
select comisione, count(*) From empleados group by comisione;

#27. Mostrar el nombre del último empleado de la lista por orden alfabético.
select max(nomemp) from empleados order by nomEmp ASC;

#28. Hallar el salario más alto, el más bajo y la diferencia entre ellos.
select max(salEmp) as "salario maximo", min(salEmp) as "salario minimo", (max(salEmp) - min(salEmp)) as "diferencia max y min" from empleados;

#29. Mostrar el número de empleados de sexo femenino y de sexo masculino, por departamento.
select codDepto, sexEmp, count(*) from empleados group by sexEmp, codDepto order by codDepto;

#30. Hallar el salario promedio por departamento.
select codDepto, avg(salEmp) from empleados group by codDepto;

#31. Mostrar la lista de los empleados cuyo salario es mayor o igual que el promedio de la empresa. Ordenarlo por departamento.
select nomemp, coddepto, salemp from empleados where salemp >= (SELECT avg(salEmp) FROM empleados) order by codDepto;

#32. Hallar los departamentos que tienen más de tres empleados. Mostrar el número de empleados de esos departamentos.
select codDepto, count(*) as total from empleados group by codDepto having count(*) > 3;

#33. Mostrar el código y nombre de cada jefe, junto al número de empleados que dirige. Solo los que tengan mas de dos empleados (2 incluido).ç
SELECT nDIEmp, nomEmp, count(*) from empleados group by jefeID having jefeID = nDIEmp;

#34. Hallar los departamentos que no tienen empleados
SELECT d.nombreDpto, count(*) from empleados e, departamentos d WHERE e.codDepto = d.codDepto group by e.codDepto having count(*) = 0;

#35. Mostrar el nombre del departamento cuya suma de salarios sea la más alta, indicando el valor de la suma.
SELECT d.nombreDpto, sum(e.salEmp) from empleados e, departamentos d WHERE e.codDepto = d.codDepto group by d.nombreDpto order by sum(e.salEmp) DESC limit 1;
