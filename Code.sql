Cambios de Procedure


DECLARE c_NombreC VARCHAR(150); 
	DECLARE c_Id, Id VARCHAR(10) DEFAULT "0"; 
	DECLARE c_title, c_puntos, t_day, t_Total, t_count, errores INT DEFAULT 0;
	DECLARE c_ttpsa FLOAT DEFAULT 0;
	DECLARE c_start DATE;
	DECLARE CSQL TEXT DEFAULT "(";

	DECLARE data_cursor CURSOR FOR 
			SELECT T1.NombreC, T0.IdTb, T0.title, T0.puntos, T0.`start`,
			(SELECT SUM(puntos)/COUNT(IdTb) FROM calendar WHERE IdTb = T0.IdTb AND `start` BETWEEN c_FINI AND c_FFIN) AS TT_Puntos
			FROM calendar T0 INNER JOIN `work` T1 ON T0.IdTb = T1.IdTb
			WHERE T1.Activo = 0 AND  T1.Cargo = WCARGO AND T1.Horario = WHORARIO AND T0.`start` BETWEEN c_FINI AND c_FFIN
			ORDER BY T0.IdTb, T0.`start`;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET errores = 1;
	
	OPEN data_cursor;
		DELETE FROM rptsemana;

		IF FOUND_ROWS() > 0 THEN
		   read_data: LOOP
				FETCH data_cursor INTO c_NombreC, c_Id, c_title, c_puntos, c_start, c_ttpsa;
				
				IF errores = 1 THEN
					LEAVE read_data;
				END IF;
				
				IF CSQL = "(" THEN
					IF DAY(c_start) = DAY(c_FINI) THEN
						SET CSQL = CONCAT(CSQL, "'", c_NombreC, "',", c_title, ",", c_puntos);
					ELSE
						SET CSQL = CONCAT(CSQL, "'", c_NombreC, "',0,0");
					END IF;
					
					SET Id = c_Id;
					SET t_day = DAY(c_start);
					SET t_Total = c_ttpsa;
				ELSE
					IF Id <> c_Id THEN
						IF t_count != 6 THEN
							simple_loop: LOOP
								SET t_count = t_count+1;

								SET CSQL = CONCAT(CSQL, ",0,0");
								
								IF t_count = 6 THEN
									LEAVE simple_loop;
								END IF;
							END LOOP simple_loop;
						END IF;

						SET CSQL = CONCAT(CSQL, ",", t_Total, ",0,0),('", c_NombreC, "'");

						SET Id = c_Id;
						SET t_day = DAY(c_start);
						SET t_Total = c_ttpsa;
						SET t_count = 0;
					END IF;
					
					IF t_day = DAY(c_start) THEN
						SET CSQL = CONCAT(CSQL, ",", c_title, ",", c_puntos);
					ELSE
						SET CSQL = CONCAT(CSQL, ",0,0");
					END IF;
				END IF;
				SET t_day = t_day+1;
				SET t_count = t_count+1;
			END LOOP read_data;
		END IF;
	CLOSE data_cursor;

Select CSQL;