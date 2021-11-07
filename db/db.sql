CREATE DATABASE IF NOT EXISTS mvc_tenis;

USE mvc_tenis;

CREATE TABLE IF NOT EXISTS jugadores (
    id_jugador INT AUTO_INCREMENT PRIMARY KEY,
    nombre_jugador VARCHAR(255) NOT NULL,
    nacionalidad_jugador VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS torneos (
    id_torneo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_torneo VARCHAR(255) NOT NULL,
    fecha VARCHAR(255) NOT NULL,
    pais VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS fases (
    id_fase INT AUTO_INCREMENT PRIMARY KEY,
    fase VARCHAR(255) NOT NULL,
    orden INT NOT NULL
);

CREATE TABLE IF NOT EXISTS partidos (
    id_partido INT AUTO_INCREMENT PRIMARY KEY,
    id_torneo INT NOT NULL,
    id_ganador INT NOT NULL,
    id_perdedor INT NOT NULL,
    resultado VARCHAR(255) NOT NULL,
    id_fase INT NOT NULL,
    CONSTRAINT fk_id_ganador FOREIGN KEY(id_ganador) REFERENCES jugadores(id_jugador) ON DELETE CASCADE ON UPDATE RESTRICT,
    CONSTRAINT fk_id_perdedor FOREIGN KEY(id_perdedor) REFERENCES jugadores(id_jugador) ON DELETE CASCADE ON UPDATE RESTRICT,
    CONSTRAINT fk_id_torneo FOREIGN KEY(id_torneo) REFERENCES torneos(id_torneo) ON DELETE CASCADE ON UPDATE RESTRICT,
    CONSTRAINT fk_id_fase FOREIGN KEY(id_fase) REFERENCES fases(id_fase)
);

INSERT INTO jugadores(nombre_jugador, nacionalidad_jugador) VALUES('Novak Djokovic', 'Polaco');
INSERT INTO jugadores(nombre_jugador, nacionalidad_jugador) VALUES('Daniil Medvedev', 'Ruso');
INSERT INTO jugadores(nombre_jugador, nacionalidad_jugador) VALUES('Aslan Karatsev', 'Ruso');
INSERT INTO jugadores(nombre_jugador, nacionalidad_jugador) VALUES('Stefanos Tsitsipas', 'Griego');
INSERT INTO jugadores(nombre_jugador, nacionalidad_jugador) VALUES('Alexander Zverev', 'Alemán');
INSERT INTO jugadores(nombre_jugador, nacionalidad_jugador) VALUES('Andrey Rublev', 'Ruso');
INSERT INTO jugadores(nombre_jugador, nacionalidad_jugador) VALUES('Rafael Nadal', 'Española');
INSERT INTO jugadores(nombre_jugador, nacionalidad_jugador) VALUES('Matteo Berrettini', 'Italiano');
INSERT INTO jugadores(nombre_jugador, nacionalidad_jugador) VALUES('Dominic Thiem', 'Mejicano');
INSERT INTO jugadores(nombre_jugador, nacionalidad_jugador) VALUES('Mikael Ymer', 'Sueco');

INSERT INTO torneos(nombre_torneo, fecha, pais) VALUES('Abierto de Australia', '2021-10-10', 'Australia');
INSERT INTO torneos(nombre_torneo, fecha, pais) VALUES('New York Open', '2020-02-02', 'Estados Unidos');
INSERT INTO torneos(nombre_torneo, fecha, pais) VALUES('Singapore Tennis Open', '2020-08-28', 'Singapur');

INSERT INTO fases(fase, orden) VALUES('Octavos de final', 1);
INSERT INTO fases(fase, orden) VALUES('Cuartos de final', 2);
INSERT INTO fases(fase, orden) VALUES('Semifinales', 3);
INSERT INTO fases(fase, orden) VALUES('Final', 4);

INSERT INTO partidos(id_torneo, id_ganador, id_perdedor, resultado, id_fase) VALUES(1, 1, 3, '6 6 4', 2);
INSERT INTO partidos(id_torneo, id_ganador, id_perdedor, resultado, id_fase) VALUES(2, 2, 7, '4 6 3', 1);
INSERT INTO partidos(id_torneo, id_ganador, id_perdedor, resultado, id_fase) VALUES(3, 4, 6, '2 3 2', 3);
INSERT INTO partidos(id_torneo, id_ganador, id_perdedor, resultado, id_fase) VALUES(1, 4, 2, '5 6 1', 1);
INSERT INTO partidos(id_torneo, id_ganador, id_perdedor, resultado, id_fase) VALUES(1, 1, 6, '0 6 2', 1);
INSERT INTO partidos(id_torneo, id_ganador, id_perdedor, resultado, id_fase) VALUES(1, 7, 3, '6 6 1', 2);
INSERT INTO partidos(id_torneo, id_ganador, id_perdedor, resultado, id_fase) VALUES(1, 1, 2, '6 6 1', 3);
INSERT INTO partidos(id_torneo, id_ganador, id_perdedor, resultado, id_fase) VALUES(1, 5, 6, '6 6 1', 4);
INSERT INTO partidos(id_torneo, id_ganador, id_perdedor, resultado, id_fase) VALUES(2, 10, 8, '5 6 0', 2);
INSERT INTO partidos(id_torneo, id_ganador, id_perdedor, resultado, id_fase) VALUES(2, 9, 8, '2 3 6', 3);
INSERT INTO partidos(id_torneo, id_ganador, id_perdedor, resultado, id_fase) VALUES(3, 10, 5, '2 6 4', 2);
INSERT INTO partidos(id_torneo, id_ganador, id_perdedor, resultado, id_fase) VALUES(3, 2, 9, '4 4 6', 4);
