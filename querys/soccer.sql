
--1)nomes dos times que possuem a abreviação do nome iagual a 'GEN'
SELECT team_long_name From team WHERE team_short_name = 'GEN';

--2)15 jogadores mais velhos nascidos em 1990
SELECT player_name, birthday FROM player WHERE birthday LIKE '1990%' ORDER BY 2 ASC LIMIT 15;

--3)todos os jogos da temp 2008/2009
SELECT m.datee, t1.team_long_name, m.home_team_goal, m.away_team_goal, t2.team_long_name 
FROM match m JOIN team t1 ON m.home_team_api_id = t1.team_api_id JOIN team t2 ON m.away_team_api_id = t2.team_api_id 
WHERE m.season = '2008/2009';

--4)a qtd de vezes q o "Chelsea" e o "Arsenal" se enfrentaram
SELECT COUNT(m.match_api_id) 
FROM match m JOIN team t1 ON m.home_team_api_id = t1.team_api_id JOIN team t2 ON m.away_team_api_id = t2.team_api_id 
WHERE (t1.team_long_name = 'Chelsea' AND t2.team_long_name = 'Arsenal') OR (t1.team_long_name = 'Arsenal' AND t2.team_long_name = 'Chelsea');

--5)jogadores q chutam somente com a perna esquerda
SELECT DISTINCT p.player_name FROM player p JOIN player_attributes a ON p.player_api_id = a.player_api_id 
WHERE a.preferred_foot = 'left' GROUP BY p.player_name ORDER BY 1;

--6)dizer em qual liga o Chelsea joga
SELECT l.name FROM league l JOIN match m ON l.id = m.league_id JOIN team t ON t.team_api_id = m.home_team_api_id
WHERE t.team_long_name = 'Chelsea'
GROUP BY 1;

--7)Quais times jogam no pais "England"
SELECT t.team_long_name FROM match m JOIN team t ON t.team_api_id = m.home_team_api_id JOIN country c ON c.id = m.country_id
WHERE c.name = 'England'
GROUP BY 1;

--8)Jogadores que jogaram no Chelsea na temporada 2008/2009
(SELECT p.player_name FROM match m JOIN team t ON t.team_api_id = m.home_team_api_id JOIN player p 
ON (m.home_player_1 = p.player_api_id or m.home_player_2 = p.player_api_id or m.home_player_3 = p.player_api_id or m.home_player_4 = p.player_api_id
 or m.home_player_5 = p.player_api_id or m.home_player_6 = p.player_api_id or m.home_player_7 = p.player_api_id or m.home_player_8 = p.player_api_id
 or m.home_player_9 = p.player_api_id or m.home_player_10 = p.player_api_id or m.home_player_11 = p.player_api_id)
WHERE t.team_long_name = 'Chelsea' AND m.season = '2008/2009'
GROUP BY 1) 
UNION 
(SELECT p.player_name FROM match m JOIN team t ON t.team_api_id = m.away_team_api_id JOIN player p 
ON (m.away_player_1 = p.player_api_id or m.away_player_2 = p.player_api_id or m.away_player_3 = p.player_api_id or m.away_player_4 = p.player_api_id
 or m.away_player_5 = p.player_api_id or m.away_player_6 = p.player_api_id or m.away_player_7 = p.player_api_id or m.away_player_8 = p.player_api_id
 or m.away_player_9 = p.player_api_id or m.away_player_10 = p.player_api_id or m.away_player_11 = p.player_api_id)
WHERE t.team_long_name = 'Chelsea' AND m.season = '2008/2009'
GROUP BY 1);

--9)A qtd de vitórias do Chelsea na temporada 2008/2009
SELECT SUM(v) vitorias, season temporada
  FROM (SELECT COUNT(m.id) v, m.season FROM match m JOIN team t ON t.team_api_id = m.home_team_api_id
	WHERE t.team_long_name = 'Chelsea' AND m.home_team_goal > m.away_team_goal
	GROUP BY 2
	UNION 
	SELECT COUNT(m.id) v, m.season FROM match m JOIN team t ON t.team_api_id = m.away_team_api_id
	WHERE t.team_long_name = 'Chelsea' AND m.home_team_goal < m.away_team_goal
	GROUP BY 2) vitorias
GROUP BY 2 ORDER BY 2;

--10)A media de gols do Chelsea por partida na temporada 2009/2010
SELECT AVG(g) media
  FROM (SELECT AVG(m.home_team_goal) g FROM match m JOIN team t ON t.team_api_id = m.home_team_api_id
	WHERE t.team_long_name = 'Chelsea' AND m.season = '2009/2010'
	UNION
	SELECT AVG(m.away_team_goal) g FROM match m JOIN team t ON t.team_api_id = m.away_team_api_id
	WHERE t.team_long_name = 'Chelsea' AND m.season = '2009/2010') gols;

--11)Jogador mais bem avaliado
SELECT DISTINCT p.player_name nome, a.overall_rating pontuacao FROM player p JOIN player_attributes a ON p.player_api_id = a.player_api_id 
WHERE a.overall_rating > 0 --Para garantir o preenchimento da coluna overall_rating
ORDER BY 2 DESC LIMIT 1;

--12)Jogadores q jogaram em "England" na temporada "2008/2009"
SELECT p.player_name FROM match m JOIN country c ON m.country_id = c.id JOIN player p 
ON (m.home_player_1 = p.player_api_id or m.home_player_2 = p.player_api_id or m.home_player_3 = p.player_api_id or m.home_player_4 = p.player_api_id
 or m.home_player_5 = p.player_api_id or m.home_player_6 = p.player_api_id or m.home_player_7 = p.player_api_id or m.home_player_8 = p.player_api_id
 or m.home_player_9 = p.player_api_id or m.home_player_10 = p.player_api_id or m.home_player_11 = p.player_api_id 
 or m.away_player_1 = p.player_api_id or m.away_player_2 = p.player_api_id or m.away_player_3 = p.player_api_id or m.away_player_4 = p.player_api_id
 or m.away_player_5 = p.player_api_id or m.away_player_6 = p.player_api_id or m.away_player_7 = p.player_api_id or m.away_player_8 = p.player_api_id
 or m.away_player_9 = p.player_api_id or m.away_player_10 = p.player_api_id or m.away_player_11 = p.player_api_id)
WHERE m.season = '2008/2009' AND c.name = 'England'
GROUP BY 1 ORDER BY 1;

--13)Em quais times da Europa o "Cristiano Ronaldo" jogou?
SELECT t.team_long_name FROM match AS m JOIN team t ON m.home_team_api_id = t.team_api_id JOIN player p 
ON (m.home_player_1 = p.player_api_id or m.home_player_2 = p.player_api_id or m.home_player_3 = p.player_api_id or m.home_player_4 = p.player_api_id
 or m.home_player_5 = p.player_api_id or m.home_player_6 = p.player_api_id or m.home_player_7 = p.player_api_id or m.home_player_8 = p.player_api_id
 or m.home_player_9 = p.player_api_id or m.home_player_10 = p.player_api_id or m.home_player_11 = p.player_api_id)
WHERE p.player_name LIKE '%Cristiano Ronaldo%' GROUP BY 1;

--14)Os 5 melhores finalizadores
SELECT DISTINCT p.player_name, a.finishing FROM player_attributes a JOIN player p ON p.player_api_id = a.player_api_id 
WHERE a.finishing > 0 ORDER BY 2 DESC LIMIT 5;

--15)Os 10 melhores cabeceadores
SELECT DISTINCT p.player_name, a.heading_accuracy FROM player_attributes a JOIN player p ON p.player_api_id = a.player_api_id 
WHERE a.heading_accuracy > 0
ORDER BY 2 DESC LIMIT 10;

--Consultas extras
--select * from player_attributes limit 10;

--16)Os 3 melhores dribladores registrados no BD
SELECT DISTINCT p.player_name, a.dribbling FROM player_attributes a JOIN player p ON p.player_api_id = a.player_api_id 
WHERE a.dribbling > 0
ORDER BY 2 DESC LIMIT 3;

--17)Os 3 melhores cobradores de falta
SELECT DISTINCT p.player_name, a.free_kick_accuracy FROM player_attributes a JOIN player p ON p.player_api_id = a.player_api_id 
WHERE a.free_kick_accuracy > 0
ORDER BY 2 DESC LIMIT 3;
