INSERT INTO `mrfbermejobd`.`amiebro`
(`camatmie`,
`capatmie`,
`cacelmie`,
`cacidmie`,
`cadirmie`,
`caestmie`,
`ceestciv`,
`cafecnac`,
`cafotmie`,
`canommie`,
`facodciu`,
`facodpro`,
`pacodmie`,
`caurlfot`)
VALUES
('VILLENA',
'MAMANI',
'69317832',
'7222862',
'/B. MOTO MENDEZ',
TRUE,
'SOLTERO',
31/03/1994,
'',
'MARCO',
'CIU-000001',
'PRO-000001',
'MBR-000001',
'/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000011MARCOS260820044215.jpg');
SELECT * FROM mrfbermejobd.amiebro;

INSERT INTO `mrfbermejobd`.`num_correlativo`
(`codigo`,
`correlativo`)
VALUES
('MBR',
'1');

INSERT INTO `mrfbermejobd`.`ausurio`
(`caconusu`,
`catipusu`,
`canomusu`,
`facodmie`,
`pacodusu`)
VALUES
('123',
'ADMINISTRADOR',
'marck45',
'MBR-000001',
'USU-000001');



UPDATE `mrfbermejobd`.`amiebro`
SET
`cafecnac` = '1994-03-31'
WHERE `pacodmie` = 'MBR-000001';

SELECT caconusu, 
						  catipusu, 
                          canomusu, 
                          pacodusu, 
                          facodmie, 
                          caestusu,
                          canommie,
                          capatmie,
                          camatmie,
                          caurlfot
                    FROM  ausurio , 
                          amiebro  
                    WHERE 
                          pacodmie=facodmie
                    and   caestusu=TRUE
                    and   caconusu='123'      
                    and   canomusu='marck45';
                    
SELECT camatmie, 
capatmie, 
cacelmie, 
cacidmie, 
cadirmie, 
caestmie, 
ceestciv, 
cafecnac, 
caurlfot, 
canommie, 
pacodmie, 
facodciu, 
facodpro,
pacodpro,
canompro,
pacodciu,
canomciu
FROM amiebro, aproion, aciudad  
where facodpro=pacodpro 
and caestmie=true
and facodciu=pacodciu
order by pacodmie desc LIMIT 15

SELECT SUM(`camoning`) as total, DATE_FORMAT(cafecing, '%m') as mes
FROM aconing
GROUP by DATE_FORMAT(cafecing, '%M')

SELECT * FROM amiebro;

#agrupar tipo de ingresos y subtotales
SELECT `catiping`, SUM(`camoning`) as catoting 
FROM `aconing`, `aconfin`, `aarqcaj` 
WHERE aconfin.pacodapo=aconing.pacodeco
and aconfin.facodcaj=aarqcaj.pacodcaj
GROUP BY aconing.catiping;

#agrupar descripcion de egrsos y subtotales
SELECT `cadesegr`, format(SUM(`camonegr`), 2) as catotegr 
FROM `aconegr`, `aconfin`, `aarqcaj` 
WHERE aconfin.pacodapo=aconegr.pacodegr
and aconfin.facodcaj=aarqcaj.pacodcaj
GROUP BY aconegr.cadesegr

#seleccion de egresos porcentuales
SELECT cadesefe, format((SUM(camoning)/100)*cacanefe, 2) as total
FROM `aegrefij`, aconing, aconfin, aarqcaj
WHERE catipcan='PORCENTUAL'
and aconing.pacodeco=aconfin.pacodapo
AND aconfin.facodcaj=aarqcaj.pacodcaj
GROUP BY cadesefe