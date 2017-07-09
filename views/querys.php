<html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../css/style.css"  media="screen,projection"/>
      <link href="../materialize/icon.css" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Database Basics - Querys</title>
      <meta charset="UTF-8">
      <link rel="icon" type="image/png" href="../images/favicon/favicon.png">
    </head>

    <body>
 	 <nav>
	    <div style="margin-left: -380px;" class="nav-wrapper teal center-align">	
	       <img style="margin-top: 10px;" width="40" src="..	/images/ball.svg"> <a href="#" class="brand-logo">European Soccer Database</a>
	    </div>
 	</nav>
     <div style="margin-top: 100px;" class="container">
       <div class="card sticky-action">
   			<div class="card-content black-text">
              <span class="card-title">Consultas ao banco de dados [soccer]</span>
            </div>
    		<div class="card-action">
    			<div class="row">
				    <form method="POST" action="q_response.php" class="col s12">
				      <div class="row">
				        <div class="input-field col s12">
				          <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT team_long_name From team WHERE team_short_name = 'GEN';
                          </textarea>
				          <label for="textarea1">Nomes dos times que possuem a abreviação do nome iagual a 'GEN'</label>
				        </div>
				      </div>
				      <br>	
				      <div class="center-align">
				      	<button class="btn waves-effect waves-light" type="submit" name="action">Submeter
					    	<i class="material-icons right">done</i>
					  	</button>
					  </div>
				    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT player_name, birthday FROM player WHERE birthday LIKE '1990%' ORDER BY 2 ASC LIMIT 15;
                                </textarea>
                                <label for="textarea1">Os 15 jogadores mais velhos nascidos em 1990</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT m.datee, t1.team_long_name, m.home_team_goal, m.away_team_goal, t2.team_long_name
FROM match m JOIN team t1 ON m.home_team_api_id = t1.team_api_id JOIN team t2 ON m.away_team_api_id = t2.team_api_id
WHERE m.season = '2008/2009';</textarea>
                                <label for="textarea1">Todos os jogos da temp 2008/2009</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT COUNT(m.match_api_id)
FROM match m JOIN team t1 ON m.home_team_api_id = t1.team_api_id JOIN team t2 ON m.away_team_api_id = t2.team_api_id
WHERE (t1.team_long_name = 'Chelsea' AND t2.team_long_name = 'Arsenal') OR (t1.team_long_name = 'Arsenal' AND t2.team_long_name = 'Chelsea');</textarea>
                                <label for="textarea1">A quantidade de vezes que o "Chelsea" e o "Arsenal" se enfrentaram</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT DISTINCT p.player_name FROM player p JOIN player_attributes a ON p.player_api_id = a.player_api_id
WHERE a.preferred_foot = 'left' GROUP BY p.player_name ORDER BY 1;</textarea>
                                <label for="textarea1">Jogadores que chutam somente com a perna esquerda</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT l.name FROM league l JOIN match m ON l.id = m.league_id JOIN team t ON t.team_api_id = m.home_team_api_id
WHERE t.team_long_name = 'Chelsea'
GROUP BY 1;</textarea>
                                <label for="textarea1">Em qual liga o Chelsea joga</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT t.team_long_name FROM match m JOIN team t ON t.team_api_id = m.home_team_api_id JOIN country c ON c.id = m.country_id
WHERE c.name = 'England'
GROUP BY 1;</textarea>
                                <label for="textarea1">Quais times jogam no pais "England"</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>(SELECT p.player_name FROM match m JOIN team t ON t.team_api_id = m.home_team_api_id JOIN player p
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
GROUP BY 1);</textarea>
                                <label for="textarea1">Jogadores que jogaram no Chelsea na temporada 2008/2009</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT SUM(v) vitorias, season temporada
  FROM (SELECT COUNT(m.id) v, m.season FROM match m JOIN team t ON t.team_api_id = m.home_team_api_id
	WHERE t.team_long_name = 'Chelsea' AND m.home_team_goal > m.away_team_goal
	GROUP BY 2
	UNION
	SELECT COUNT(m.id) v, m.season FROM match m JOIN team t ON t.team_api_id = m.away_team_api_id
	WHERE t.team_long_name = 'Chelsea' AND m.home_team_goal < m.away_team_goal
	GROUP BY 2) vitorias
GROUP BY 2 ORDER BY 2;</textarea>
                                <label for="textarea1">A quantida de vitórias do Chelsea na temporada 2008/2009</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT AVG(g) media
  FROM (SELECT AVG(m.home_team_goal) g FROM match m JOIN team t ON t.team_api_id = m.home_team_api_id
	WHERE t.team_long_name = 'Chelsea' AND m.season = '2009/2010'
	UNION
	SELECT AVG(m.away_team_goal) g FROM match m JOIN team t ON t.team_api_id = m.away_team_api_id
	WHERE t.team_long_name = 'Chelsea' AND m.season = '2009/2010') gols;</textarea>
                                <label for="textarea1">A media de gols do Chelsea por partida na temporada 2009/2010</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT DISTINCT p.player_name nome, a.overall_rating pontuacao FROM player p JOIN player_attributes a ON p.player_api_id = a.player_api_id
WHERE a.overall_rating > 0 --Para garantir o preenchimento da coluna overall_rating
ORDER BY 2 DESC LIMIT 1;</textarea>
                                <label for="textarea1">Jogador mais bem avaliado</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT p.player_name FROM match m JOIN country c ON m.country_id = c.id JOIN player p
ON (m.home_player_1 = p.player_api_id or m.home_player_2 = p.player_api_id or m.home_player_3 = p.player_api_id or m.home_player_4 = p.player_api_id
 or m.home_player_5 = p.player_api_id or m.home_player_6 = p.player_api_id or m.home_player_7 = p.player_api_id or m.home_player_8 = p.player_api_id
 or m.home_player_9 = p.player_api_id or m.home_player_10 = p.player_api_id or m.home_player_11 = p.player_api_id
 or m.away_player_1 = p.player_api_id or m.away_player_2 = p.player_api_id or m.away_player_3 = p.player_api_id or m.away_player_4 = p.player_api_id
 or m.away_player_5 = p.player_api_id or m.away_player_6 = p.player_api_id or m.away_player_7 = p.player_api_id or m.away_player_8 = p.player_api_id
 or m.away_player_9 = p.player_api_id or m.away_player_10 = p.player_api_id or m.away_player_11 = p.player_api_id)
WHERE m.season = '2008/2009' AND c.name = 'England'
GROUP BY 1 ORDER BY 1;</textarea>
                                <label for="textarea1">Jogadores que jogaram em "England" na temporada "2008/2009"</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT t.team_long_name FROM match AS m JOIN team t ON m.home_team_api_id = t.team_api_id JOIN player p
ON (m.home_player_1 = p.player_api_id or m.home_player_2 = p.player_api_id or m.home_player_3 = p.player_api_id or m.home_player_4 = p.player_api_id
 or m.home_player_5 = p.player_api_id or m.home_player_6 = p.player_api_id or m.home_player_7 = p.player_api_id or m.home_player_8 = p.player_api_id
 or m.home_player_9 = p.player_api_id or m.home_player_10 = p.player_api_id or m.home_player_11 = p.player_api_id)
WHERE p.player_name LIKE '%Cristiano Ronaldo%' GROUP BY 1;</textarea>
                                <label for="textarea1">Em quais times da Europa o "Cristiano Ronaldo" jogou?</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT DISTINCT p.player_name, a.finishing FROM player_attributes a JOIN player p ON p.player_api_id = a.player_api_id
WHERE a.finishing > 0 ORDER BY 2 DESC LIMIT 5;</textarea>
                                <label for="textarea1">Os 5 melhores finalizadores</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 100px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT DISTINCT p.player_name, a.heading_accuracy FROM player_attributes a JOIN player p ON p.player_api_id = a.player_api_id
WHERE a.heading_accuracy > 0
ORDER BY 2 DESC LIMIT 10;</textarea>
                                <label for="textarea1">Os 10 melhores cabeceadores</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col s12">
                            <div class="card teal">
                                <div class="card-content white-text center-align">
                                    <span class="card-title">Consultas extras</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form style="margin-top: 30px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT DISTINCT p.player_name, a.dribbling FROM player_attributes a JOIN player p ON p.player_api_id = a.player_api_id
WHERE a.dribbling > 0
ORDER BY 2 DESC LIMIT 3;</textarea>
                                <label for="textarea1">Os 3 melhores dribladores registrados no DB</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

                    <form style="margin-top: 30px;" style="margin-top: 30px;" method="POST" action="q_response.php" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="query" class="materialize-textarea" required>SELECT DISTINCT p.player_name, a.free_kick_accuracy FROM player_attributes a JOIN player p ON p.player_api_id = a.player_api_id
WHERE a.free_kick_accuracy > 0
ORDER BY 2 DESC LIMIT 3;</textarea>
                                <label for="textarea1">Os 3 melhores cobradores de falta</label>
                            </div>
                        </div>
                        <br>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
                                <i class="material-icons right">done</i>
                            </button>
                        </div>
                    </form>

			  </div>
    		</div>
 	    </div>
 	    <div style="margin-left: 1024px;" class="target">
		 	<ul class="collapsible" data-collapsible="accordion">
			    <li>
			      <div class="collapsible-header blue accent-2"><i class="material-icons">live_help</i>Tabelas</div>
			      
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="material-icons">view_list</i>Country</div>
			      <div class="collapsible-body">
			      		 <ul>
			              <li class="collection-item">id</li>
			              <li class="collection-item">name</li>
			            </ul>
			      </div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="material-icons">view_list</i>League</div>
			      <div class="collapsible-body">
			      	 <ul>
			              <li class="collection-item">id</li>
			              <li class="collection-item">country_id</li>
			              <li class="collection-item">nome</li>
			          </ul>
			      </div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="material-icons">view_list</i>Match</div>
			      <div class="collapsible-body">
			      	 <ul>
			              <li class="collection-item">id</li>
			              <li class="collection-item">country_id</li>
			              <li class="collection-item">league_id</li>
			              <li class="collection-item">season</li>
			              <li class="collection-item">stage</li>
			              <li class="collection-item">date</li>
			              <li class="collection-item">...</li>
			          </ul>
			      </div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="material-icons">view_list</i>Player</div>
			      <div class="collapsible-body">
			      	 <ul>
			              <li class="collection-item">id</li>
			              <li class="collection-item">player_name</li>
			              <li class="collection-item">birthday</li>
			              <li class="collection-item">height</li>
			              <li class="collection-item">weight</li>
			              <li class="collection-item">...</li>
			          </ul>
			      </div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="material-icons">view_list</i>Player_Attributes</div>
			      <div class="collapsible-body">
			      	 <ul>
			              <li class="collection-item">id</li>
			              <li class="collection-item">date</li>
			              <li class="collection-item">overall_rating</li>
			              <li class="collection-item">pontential</li>
			              <li class="collection-item">preferred_foot</li>
			              <li class="collection-item">attacking_work_rate</li>
			              <li class="collection-item">defensive_work_rate</li>
			              <li class="collection-item">...</li>
			          </ul>
			      </div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="material-icons">view_list</i>Team</div>
			      <div class="collapsible-body">
			      	 <ul>
			              <li class="collection-item">id</li>
			              <li class="collection-item">team_long_name</li>
			              <li class="collection-item">team_short_name</li>
			              <li class="collection-item">...</li>
			          </ul>
			      </div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="material-icons">view_list</i>Team_Attributes</div>
			      <div class="collapsible-body">
			      	 <ul>
			              <li class="collection-item">id</li>
			              <li class="collection-item">date</li>
			              <li class="collection-item">...</li>
			          </ul>
			      </div>
			    </li>
  			</ul>
 	    </div>
       	<div style="margin-top: 30px;" class="left-align">
       		<a href="javascript:history.back()" class="waves-effect waves-teal btn-flat"><span aria-hidden="true">←</span> Voltar</a>
       	</div>

     </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../jquery/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
      <script type="text/javascript">
      	$(document).ready(function(){
		    $('.parallax').parallax();
		    $('.target').pushpin({
		      top: 0,
		      bottom: 7000,
		      offset: 155
		    });
		    $('.collapsible').collapsible();
	    });
      </script>
    </body>
 </html>