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