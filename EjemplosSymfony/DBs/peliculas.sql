-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2022 a las 10:33:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `IDGENERO` int(11) NOT NULL,
  `GENERO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`IDGENERO`, `GENERO`) VALUES
(1, 'Accion'),
(2, 'Humor'),
(3, 'Terror'),
(4, 'Drama'),
(5, 'Romántica'),
(6, 'Suspense'),
(7, 'Aventuras'),
(8, 'Ciencia Ficción'),
(9, 'Animación'),
(10, 'Western');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `IDPELICULA` int(11) NOT NULL,
  `IDDISTRIBUIDOR` int(11) DEFAULT NULL,
  `IDGENERO` int(11) DEFAULT NULL,
  `TITULO` varchar(255) DEFAULT NULL,
  `IDNACIONALIDAD` int(11) DEFAULT NULL,
  `ARGUMENTO` varchar(1550) DEFAULT NULL,
  `FOTO` varchar(50) DEFAULT NULL,
  `FECHA_ESTRENO` date DEFAULT NULL,
  `ACTORES` varchar(1550) DEFAULT NULL,
  `DIRECTOR` varchar(50) DEFAULT NULL,
  `DURACION` int(11) DEFAULT NULL,
  `PRECIO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`IDPELICULA`, `IDDISTRIBUIDOR`, `IDGENERO`, `TITULO`, `IDNACIONALIDAD`, `ARGUMENTO`, `FOTO`, `FECHA_ESTRENO`, `ACTORES`, `DIRECTOR`, `DURACION`, `PRECIO`) VALUES
(1, 1, 4, 'Cadena Perpetua', 1, 'Acusado del asesinato de su mujer, Andrew Dufresne (Tim Robbins) es enviado a la prisión de Shawshank para ser encerrado de por vida. Con el paso de los años conseguirá ganarse la confianza del director del centro y el respeto de sus compañeros presidiarios, especialmente de Red (Morgan Freeman), el jefe de la mafia de los sobornos.', 'Cadena_Perpetua.jpg', '2022-07-27', 'Tim Robbins, Morgan Freeman, Bob Gunton, James Whitmore, Gil Bellows, William Sadler', 'Frank Darabont', 142, 14),
(2, 6, 3, 'El Resplandor', 1, 'Película de Terror basada en un novela de Stephen King', 'El_Resplandor.jpg', '2022-07-27', 'Jack Nicholson, Shelley Duvall, Danny Lloyd, Scatman Crothers, Barry Nelson, Philip Stone, Joe Turkel, Lia Beldman, Billie Gibson, Barry Denne, David Baxt, Manning Redwood, Kisa Burns, Louise Burns, Alison Coleridge, Norman Gay', 'Stanley Kubrick', 146, 16),
(3, 2, 9, 'El Rey Leon', 1, 'Narra la aventuras en la sabana africana de Simba, un pequeño león, heredero al trono, que se exilia al ser injustamente acusado de la muerte de su padre, pero que hace buenas amistades y regresa para recuperar lo que es suyo.', 'El_Rey_Leon.jpg', '2022-07-27', '', 'Rob Minkoff, Roger Allers', 87, 17),
(4, 4, 1, 'Gangs Of New York', 1, 'Reconstrucción de la historia de Nueva York a principio de siglo', 'Gangs_Of_New_York.jpg', '2022-07-27', 'Leonardo DiCaprio, Daniel Day-Lewis, Cameron Diaz, Jim Broadbent, John C. Reilly, Henry Thomas, Brendan Gleeson, Liam Neeson, David Hemmings, Stephen Graham, Gary Lewis', 'Martin Scorsese', 168, 21),
(5, 8, 7, 'Indiana Jones y el Templo Maldito', 1, '1935. Shanghai. El intrépido arqueólo Indiana Jones, tras meterse en jaleos en un local nocturno, consigue escapar, junto a una bella cantante, en compañía de su joven acompañante, un chico oriental con el que siempre está discutiendo. Tras un accidentado vuelo, los tres acaban en la India, donde intentarán ayudar a los habitantes de un pequeño poblado, cuyos niños han sido raptados.', 'Indiana_Jones_y_el_Templo_Maldito.jpg', '2022-07-27', 'Harrison Ford, Kate Capshaw, Ke Huy Quann, Amrish Puri, Dan Aykroyd, Philip Stone, Roshan Seth, David Yip', 'Steven Spielberg', 118, 21),
(6, 3, 1, 'A todo gas', 1, 'Pelicula de flipaillos con coches', 'A_Todo_Gas.jpg', '2022-07-27', 'Paul Walker, Vin Diesel, Michelle Rodriguez, Jordana Brewster, Rick Yune, Chad Lindberg, Johnny Strong, Ted Levine', 'Rob Cohen', 109, 15),
(7, 5, 2, 'Torrente, el brazo tonto de la ley', 2, 'Torrente es un policía español, fascista, machista, racista, alcohólico y del Atleti. En su mismo inmueble vive un chaval, Rafi, al que le gustan las peliculas de acción y las pistolas, y que vive con su madre y su prima Amparito, una ninfómana. Juntos, Torrente y Rafi, patrullarán por la noche las calles de la ciudad.', 'torrente.jpg', '2022-07-27', 'Santiago Segura, Javier Cámara, Neus Asensi, Chus Lampreave, Tony Leblanc, Daniel Monzón, Nuria Carbonell, Carlos Lucas, Santiago Barullo, Julio Sanjuán, Carlos Perea, Jorge Sanz, Fernando Trueba, El Gran Wyoming, Gabino Diego, Espartaco Santoni', 'Santiago Segura', 97, 18),
(8, 8, 1, 'La Roca', 1, 'Francis Hummel pretende que se indemnice a las familias de los soldados muertos en misiones secretas. Tras robar 16 misiles equipados con gas venenoso, toma Alcatraz y amenaza con lanzarlos sobre San Francisco. Para resolver la situación, el F.B.I. envía a la isla a un especialista en armamento biológico y al único fugado de la famosa prisión.', 'La_Roca.jpg', '2022-07-27', 'Sean Connery, Nicolas Cage, Ed Harris, Michael Biehn, William Forsythe, John Spencer, David Morse, Vanessa Marcil, John C. McGinley, James Caviezel (AKA Jim Caviezel), Tony Todd, Bokeem Moodbine', 'Michael Bay', 125, 18),
(9, 6, 3, 'Al Final De La Escalera', 5, 'Un Psicologo experimenta en su casa fenomenos paranormales después de la muerte de su mujer e hija', 'Al_Final_De_La_Escalera.jpg', '2022-07-27', 'George C. Scott, Trish Van Devere, Melvyn Douglas, John Colicos, Jean Marsh, Barry Morse, Madeleine Thornton-Sherwood, Helen Burns, Ruth Springford', 'Peter Medak', 109, 17),
(10, 1, 3, 'Los Otros', 2, 'En la segunda guerra mundial una mujer comienza a tener visiones mientras espera la vuelta de su marido del frente', 'Los_Otros.jpg', '2022-07-27', 'Nicole Kidman, Fionnula Flanagan, Christopher Eccleston, Alakina Mann, James Bentley, Eric Sykes, Elaine Cassidy, Renée Asherson', 'Alejandro Amenábar', 104, 19),
(11, 8, 2, 'Los Padres de Ella', 1, 'Disparatada comedia sobre un joven algo patoso que, tras anunciar su compromiso, tiene que pasar unos días con los padres de su novia. Robert de Niro interpreta al padre de la novia, un hombre protector que ha trabajado para la CIA, lo que da pie a numerosas y cómicas escenas. Obtuvo un gran éxito de taquilla.', 'Los_Padres_de_ella.jpg', '2022-07-27', 'Robert De Niro, Ben Stiller, Blythe Danner, Teri Polo, James Rebhorn, Jon Abrahams, Owen Wilson, Nicole Dehuff', 'Jay Roach', 108, 15),
(12, 8, 8, 'Matrix', 1, 'Un programador pirata recibe un día una misteriosa visita... Nada más se debe contar de la sinopsis de Matrix.', 'Matrix.jpg', '2022-07-27', 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss, Hugo Weaving, Joe Pantoliano, Marcus Chong, Paul Goddard, Mary Alice', 'Andy Wachowski, Larry Wachowski', 131, 19),
(13, 1, 2, 'Mejor Imposible', 1, 'Melvin Udall, un escritor obsesivo y maniático, es uno de los seres más desagradables y desagradecidos que uno pueda tener como vecino. Pero, un buen día, tiene que hacerse cargo de un perro al que odia a muerte. La presencia en su vida del animal ablandará su corazón.', 'Mejor_Imposible.jpg', '2022-07-27', 'Jack Nicholson, Helen Hunt, Greg Kinnear, Cuba Gooding Jr., Skeet Ulrich, Shirley Knight, Jesse James, Lawrence Kasdan', 'James L. Brooks', 138, 20),
(14, 6, 8, 'Regreso al Futuro', 1, 'Marty McFly, un joven estudiante de Hill Valley High. es amigo de un excéntrico científico que ha inventado una máquina del tiempo con la sorprendente forma de un coche \"DeLorean\". Durante la prueba son sorprendidos por unos terroristas árabes y es Marty quien se traslada al año 1955. En esa dimensión, conoce a una joven pareja, Lorraine Baines y George McFly, que, en el futuro, serán sus padres. La situación se complica cuando es su propia madre quien se enamora de él.', 'Regreso_al_futuro.jpg', '2022-07-27', 'Michael J. Fox, Christopher Lloyd, Lea Thompson, Crispin Glover, Claudia Wells, Thomas F. Wilson, Billy Zane, Sachi Parker', 'Robert Zemeckis', 116, 20),
(15, 3, 2, 'Snatch. Cerdos y diamantes', 4, 'Franky es una ladrón de diamantes que tiene que entregar una enorme pieza a su jefe Avi, pero en el camino es tentado por Boris para apostar en un combate ilegal de boxeo. En realidad, es una trampa para atracarle por lo que, cuando Avi se entera, contrata a Tony para encontrar a Franky y el diamante. Pronto se descubre el triste destino de Franky, y la caza y captura de la gema desaparecida lleva a todo el mundo a un juego de locos que corre el riesgo de descontrolarse.', 'Snatch.jpg', '2022-07-27', 'Brad Pitt, Dennis Farina, Benicio del Toro, Vinnie Jones, Rade Serbedzija, Stephen Graham, Ewen Bremner, Jason Statham, Sorcha Cusack, Sam Douglas, Austin Drage, Andy Beckwith, Jason Flemyng', 'Guy Ritchie', 104, 16),
(16, 4, 5, 'La Princesa Prometida', 1, 'Habiendo marchado en busca de fortuna, y después de 5 años de ausencia, Westley retorna a su tierra para casarse con su amada Buttercup, a la que juró amor eterno y verdadero. Para recuperarla, tendrá que enfrentarse a serios obstáculos (Vizzini y sus esbirros), pero, una vez superados éstos, aún quedará lo peor: el príncipe Humperdinck pretende desposar a la desdichada Buttercup, pese a que ésta no le ama, ya que le sigue queriendo a él.', 'La_Princesa_Prometida.jpg', '2022-07-27', 'Robin Wright Penn, Cary Elwes, Mandy Patinkin, Chris Sarandon, Wallace Shawn, Billy Crystal, Carol Kane, Peter Falk, Peter Cook, Fred Savage, Mel Smith, Christopher Guest, André the Giant, Mel Smith', 'Rob Reiner', 98, 14),
(17, 4, 4, 'Leyendas de Pasión', 1, 'Narra la historia de tres hermanos, de caracteres muy diferentes, que viven con su padre -un militar retirado desencantado de la sociedad- en un apartado rancho de Montana. La Primera Guerra Mundial y una bella mujer cambiarán el destino de cada uno para siempre.', 'Leyendas_de_Pasion.jpg', '2022-07-27', 'Brad Pitt, Anthony Hopkins, Julia Ormond, Aidan Quinn, Henry Thomas, Karina Lombard, Tantoo Cardinal, Gordon Tootoosis, Paul Desmond', 'Edward Zwick', 134, 12),
(18, 7, 9, 'Buscando a Nemo', 1, 'El pequeño Nemo, un pequeño pececillo hijo único, muy querido y protegido por su padre, ha sido sacado de la gran barrera del arrecife australiano y ahora vive en una pequeña pecera en la oficina de un dentista de Sidney. El tímido padre de Nemo se embarcará en una peligrosa aventura con Dory al rescate de su hijo. Pero Nemo y sus nuevos amigos tienen también un astuto plan para escapar de la pecera y volver al mar.', 'Buscando_a_Nemo.jpg', '2022-07-27', '', 'Andrew Stanton , Lee Unkrich', 101, 23),
(19, 8, 8, 'La Guerra de las Galaxias', 1, 'La princesa Leia, líder del movimiento rebelde que desea reinstaurar la República en la galaxia en los tiempos ominosos del Imperio, es capturada por las malévolas Fuerzas Imperiales, capitaneadas por el implacable Darth Vader, el sirviente más fiel del emperador. El intrépido Luke Skywalker, ayudado por Han Solo, capitán de la nave espacial \"El Halcón Milenario\", y los androides, R2D2 y C3PO, serán los encargados de luchar contra el enemigo y rescatar a la princesa para volver a instaurar la justicia en el seno de la Galaxia.', 'La_Guerra_de_las_galaxias.jpg', '2022-07-27', 'Mark Hamill, Harrison Ford, Carrie Fisher, Peter Cushing, Alec Guinness, David Prowse, Peter Mayhew, Anthony Daniels, Kenny Baker, Phil Brown, Shelagh Fraser, Alex McCrindle, Jack Purvis', 'George Lucas', 121, 24),
(20, 2, 7, 'Piratas del Caribe: la maldición de la Perla Negra', 1, 'La historia transcurre en el Mar Caribe en el siglo XVIII. El aventurero capitán Jack Sparrow (Johnny Depp) recorre las aguas caribeñas. Pero su andanzas terminan cuando su enemigo, el Capitán Barbossa (Geoffrey Rush) le roba su barco, el Perla Negra, y ataca la ciudad de Port Royal, secuestrando a Elizabeth Swann (Keira Knightley), hija del Gobernador (Jonathan Pryce). Will Turner (Orlando Bloom), el amigo de la infancia de Elizabeth, se une a Jack para rescatarla y recuperar el Perla Negra. Pero el prometido de Elizabeth, Comodoro Norrington (Jack Davenport) los persigue a bordo del HMS Dauntless. Además, Barbossa y su tripulación son víctimas de un conjuro por el que están condenados a vivir eternamente, y a transformarse cada noche en esqueletos vivientes, en fantasmas guerreros. El conjuro sólo puede romperse si devuelven lo que robaron: una pieza de oro azteca, y saldan una deuda de sangre. El rescate de la bella Elizabeth será una tarea difícil, pues la maldición es real y será difícil enfrentarse con quienes no pueden morir...', 'Piratas_Del_Caribe.jpg', '2022-07-27', 'Johnny Depp, Geoffrey Rush, Orlando Bloom, Keira Knightley, Jonathan Price, Jack Davenport, Mackenzie Crook, Naomie Harris', 'Gore Verbinski', 143, 18),
(21, 4, 7, 'Los Goonies', 1, 'Mikey es un muchacho de trece años que, junto con su hermano mayor y sus amigos, que se hacen llamar \"Los Goonies\", deciden subir a jugar al desván de su casa, donde su padre guarda antigüedades. Allí encuentran el mapa de un tesoro... Simpática película de aventura para adolescentes, con historia de Steven Spielberg y guión de Chris Columbus.', 'Los_Goonies.jpg', '2022-07-27', 'Corey Feldman, Martha Plimpton, Joe Pantoliano, Sean Astin, Josh Brolin, Jeff Cohen, Kerri Green, Ke Huy Quan, Anne Ramsey', 'Richard Donner', 111, 19),
(22, 8, 8, 'El Imperio Contraataca', 1, 'Tras un ataque sorpresa de las tropas imperiales a la alianza rebelde, Luke Skywalker parte en busca de Yoda, el maestro Yedi para que le enseñe los secretos de la fuerza.', 'EL_IMPERIO_CONTRAATACA.jpg', '2022-07-27', 'Mark Hamill, Harrison Ford, Carrie Fisher, Alec Guinness, Billy Dee Williams, Anthony Daniels, David Prowse, Kenny Baker', 'Irvin Kershner', 124, 21),
(23, 1, 2, 'Las Aventuras de Ford Fairlane', 1, 'Andrew Dice Clay es Ford Fairlane, el detective más sexy (y más descarado de Los Ángeles). Tomar Sambucas sin parar con las estrellas del rock y alternar con tías buenas a todas horas es un duro trabajo... pero alguien tiene que hacerlo. Pero cuando la estrella del Heavy, Bobby Black, muere en mitad de una actuación, el trabajo de Ford da un peligroso giro. Andrew Dice Clay es Ford Fairlane, el detective más sexy (y más descarado de Los Ángeles). Tomar Sambucas sin parar con las estrellas del rock y alternar con tías buenas a todas horas es un duro trabajo... pero alguien tiene que hacerlo. Pero cuando la estrella del Heavy, Bobby Black, muere en mitad de una actuación, el trabajo de Ford da un peligroso giro.', 'Las_aventuras_de_Ford_Fairlane.jpg', '2022-07-27', 'Andrew Dice Clay, Wayne Newton, Priscilla Presley, Lauren Holly, Maddie Corman, Gilbert Gottfried, David Patrick Kelly, Robert Englund, Ed ONeill', 'Renny Harlin', 104, 12),
(24, 3, 1, 'Le Llaman Bodhi', 1, 'Un joven agente del FBI se introduce en los ambientes del surf como primer paso para desmantelar una organización delictiva.  Asi conoce al lider del grupo, Bodhi, un hombre que vive al límite y cuya personalidad acaba atrayendo al policía a su forma de ver el mundo.', 'lellamanbodhi.jpg', '2022-07-27', 'Keanu Reeves, Patrick Swayze, Gary Busey, Lori Petty, James LeGros, John Philbin, John McGinley', 'Kathryn Bigelow', 125, 15),
(25, 4, 2, 'Dos tontos muy tontos', 1, 'Lloyd y Harry son dos amigos bastantes idiotas cuyas vidas son un auténtico desastre. El primero trabaja como chófer de una limousine, mientras que su amigo se dedica a transportar perros. Un día sus existencias se complican aún más cuando Lloyd se enamora de una chica adinerada que desaparece dejando olvidado un maletín. A partir de ese instante Lloyd embarcará a Harry en un viaje por todo el país para devolver el maletín a su amada.', 'dostontosmuytontos.jpg', '2022-07-27', 'Jim Carrey, Jeff Daniels, Bruce Dern, Lauren Holly, Teri Garr, Charles Rocket, Karen Duffy, Mik Starr, Victoria Rowell, Cam Neely, Felton Perry', 'Peter Farrelly', 106, 18),
(26, 5, 1, 'The Italian Job', 1, 'El plan era impecable... se ejecutó a la perfección... tenían libre la vía de escape. El único factor de riesgo que la mente maestra del crimen Charlie Croker (Mark Whalberg) no pudo prevenir procedía de uno de los miembros de la banda, que estaba formada por su contacto interno Steve (Edward Norton), el genio de los ordenadores Lyle (Seth Green), el conductor Rob el Guapo (Jason Statham), el experto en explosivos Oido-Izquierdo (Mos Def) y el veterano reventador de cajas fuertes John Bridger (Donald Sutherland). Después de dar un asombroso golpe millonario en un palazzo veneciano fuertemente custodiado, Charlie y la banda se quedan asombrados al descubrir que uno de ellos les ha traicionado. Ahora la cosa ya no tiene que ver con el botín sino con la venganza... Entra en escena la bella con nervios de acero Stella (Charlize Theron), una experta reventadora de cajas fuertes que se une a Charlie y a la banda cuando regresan a California en pos del traidor. Su plan para recuperar el oro es simple, recuperar lo que es suyo.', 'THEITALIANJOB.jpg', '2022-07-27', 'Mark Wahlberg, Edward Norton, Charlize Theron, Seth Green, Jason Statham, Donald Sutherland', 'F. Gary Gray', 104, 20),
(27, 6, 4, 'Dirty Dancing', 1, 'En el verano de 1963, la joven Baby (Jennifer Gray), pasa sus vacaciones con sus padres en un resort, Una noche, ella se acerca al alojamiento de los funcionarios del lugar, encantada por la música que venia del lugar. Y es alli donde se encuentra con Johnny (Patrick Swayze), el instructor de baile del hotel, un hombre lleno de encanto y glamur. De ese encuentro, surge un irresistible romance entre los dos.', 'dirtydancing.jpg', '2022-07-27', 'Patrick Swayze, Jennifer Grey, Cynthia Rhodes, Jerry Orbach, Jane Brucker, Jack Weston, Lonny Price', 'Emile Ardolino', 97, 15),
(28, 7, 6, 'El Efecto Mariposa', 1, 'Evan Treborn ha perdido la noción del tiempo. Desde una edad muy temprana, momentos cruciales en su vida han desaparecido en el agujero negro del olvido; su infancia se ha visto marcada por una serie de acontecimientos aterradores que no es capaz de recordar. Lo que queda es el fantasma de los recuerdos y las vidas rotas que le rodean: las de sus amigos de la niñez, Kayleigh, Lenny y Tommy. Durante todo su infancia Evan asistió a sesiones de terapia con un psicólogo que le animaba a escribir un diario con todos los detalles de su vida cotidiana. Más adelante, en la universidad, decide leer uno de sus diarios y de repente e inexplicablemente se encuentra en el pasado. Finalmente se da cuenta de que los diarios que guarda debajo de la cama son un vehículo para regresar al pasado y recuperar sus recuerdos.', 'elefectomariposa.jpg', '2022-07-27', 'Ashton Kutcher, Amy Smart, Kevin Schmidt, Melora Walters', 'Eric Bress y J. Mackye Gruber', 113, 16),
(29, 3, 1, 'Las Cronicas de Riddick', 1, 'Los planetas, uno tras otro, caen ante un ejército infernal de necróferos, guerreros que en sus conquistas ofrecen una elección muy simple a los mundos que asolan: convertirse o morir. Los que se atreven a rechazar su dominio esperan en vano que alguien o algo interrumpa el progreso de los necróferos. Pero, a veces, la única forma de detener el mal no es con el bien, sino con otro tipo de demonio. No queda más remedio que sacar a una figura inesperada de su exilio y pedirle que se una a la contienda. Se trata de Riddick (Vin Diesel) al que le importa un comino quién gobierna el universo mientras le dejen tranquilo. Desde que hace años huyó de un planeta dejado de la mano de Dios (y lleno de criaturas) en el sistema planetario Tauro, el fugitivo no ha vuelto a mirar atrás. Divide su tiempo entre evitar que le cap-turen y deshacerse de los mercenarios que van tras él. Este ejército compuesto por un único hombre sólo quiere salvar el pellejo. Si alguien se cruza en su camino, no tendrá inconveniente en quitarle de en medio. Pero algo está cambiando y la futura confrontación empuja a Riddick a participar en una serie de batallas épicas donde se juega el todo por el todo.', 'lascronicasderiddick.jpg', '2022-07-27', 'Vin Diesel, Colm Feore, Thandie Newton, Judi Dench, Karl Urban, Alexa Davalos', 'David Twohy', 115, 20),
(30, 5, 1, 'Spiderman 2', 1, 'Han pasado dos años desde que el tranquilo Peter Parker (Tobey Maguire) dejó a su amor de toda la vida, Mary Jane Watson (Kirsten Dunst) y decidió seguir el camino de la responsabilidad como Spider-Man. Peter debe afrontar nuevos desafíos mientras lucha contra \"el don y la maldición\" de sus poderes equilibrando sus identidades duales como el escurridizo superhéroe Spider-Man y la vida como estudiante universitario. Las relaciones con las personas que más aprecia están ahora en peligro de ser descubiertas con la aparición del poderoso villano de múltiples tentáculos Doctor Octopus, \"Doc Ock\" (Alfred Molina). Su atracción de siempre por M.J. se hace incluso más fuerte mientras lucha contra el impulso de abandonar su vida secreta y declarar su amor. Mientras tanto, M.J. ha seguido con su vida. Se ha embarcado en su carrera de actriz y tiene un nuevo hombre en su vida. La relación de Peter con su mejor amigo Harry Osborn (James Franco) se ha ensombrecido por la creciente venganza de Harry contra Spider-Man, al que considera responsable de la muerte de su padre. La vida de Peter se convierte en aún más complicada cuando ha de enfrentarse con su poderoso nuevo enemigo, el Dr. Otto Octavius (Molina) - \"Doc Ock\". Peter debe aprender ahora a aceptar su destino y a utilizar todos sus talentos como superhéroe para detener a este loco diabólico de ocho brazos.', 'spiderman2.jpg', '2022-07-27', 'Tobey Maguire, Kirsten Dunst, Alfred Molina, James Franco, Elizabeth Banks, Bruce Campbell, Rosemary Harris, J.K. Simmons, Vanessa Ferlito', 'Sam Raimi', 127, 21),
(31, 4, 2, 'Y si no, nos enfadamos', 6, 'Kid y Ben, amigos pero rivales, participan en una carrera de coches cuyo premio es un estupendo \"dune-buggy\", un minibólido rojo con capota amarilla. Después de innumerables peripecias, Kid y Ben llegan juntos a la meta, por lo que el minibólido les pertenece a los dos. Kid propone que se lo jueguen a \"cervezas y salchichas\".', 'y_si_no_nos_enfadamos.jpg', '2022-07-27', 'Terence Hill, Bud Spencer, Deogratias Huerta, John Sharp, Patty Shepard, Manuel de Blas, Luis Barbero, Donald Pleasence, Emilio Laguna', 'Marcello Fondato', 92, 22),
(32, 1, 7, 'Willow', 1, 'Cuento medieval con brujas, enanos y poderes mágicos. En las mazmorras del castillo de la malvada reina hechicera Bavmorda, una prisionera da a luz una niña que, de acuerdo a una antigua profecía, pondrá fin al reinado de la hechicera. La comadrona salva a la niña de la ira de Bavmorda, pero se ve obligada a arrojar su cuna al río cuando es alcanzada por sus perros de presa. La corriente le hace alcanzar un pueblo de enanos en donde es adoptada por el valiente Willow.', 'willow.jpg', '2022-07-27', 'Val Kilmer, Joanne Whalley-Kilmer, Warwick Davis, Jean Marsh, Patricia Hayes, Billy Barty, Pat Roach', 'Ron Howard', 120, 25),
(33, 3, 1, 'Top Gun', 1, 'El top Tom vuela y, de paso, enamora a la profe. Así de simple. De menos a más: el póster de esta entretenida película forró millones de carpetas de quinceañeras, las solicitudes para entrar en la aviación militar americana sufrieron un considerable aumento, la película (simple y vacía, comercial y previsible) se convirtió en un icono de la juventud sin ideas que había en los años ochenta, y Tom Cruise se consagró como una estrella de cine que no ha dejado de brillar.', 'top_gun.jpg', '2022-07-27', 'Tom Cruise, Kelly McGillis, Tom Skerritt, Anthony Edwards, Val Kilmer, Meg Ryan, Michael Ironside, John Stockwell, Rick Rossovich, Tim Robbins', 'Tony Scott', 110, 18),
(34, 1, 1, 'Rambo', 1, 'John Rambo, antiguo boina verde, va a visitar a un antiguo compañero de armas y recibe la noticia de que éste ha muerto como consecuencia de los efectos de la guerra. A pocos días, la policía detiene a Rambo por vagabundo y se ensaña con él. Entonces recuerda las torturas que sufrió en Vietnan y reacciona violentamente.', 'rambo.jpg', '2022-07-27', 'Sylvester Stallone, Richard Crenna, Brian Dennehy, David Caruso, Jack Starrett, Michael Talbott, Chris Fulkey', 'Ted Kotcheff', 97, 15),
(35, 7, 5, 'La Historia Interminable', 3, 'Escondido en el desván de su colegio, Bastian devora durante las horas de clase un libro enigmático, ”La historia interminable”, que relata la paulatina destrucción del Reino de Fantasía. Una especie de ”Nada” misteriosa destruye todo el país y a todas las criaturas que lo habitan. A medida que avanza en su lectura, Bastian se da cuenta de que la salvación de Fantasía depende de él. De que consiga entrar dentro del libro...', 'historia_interminable.jpg', '2022-07-27', 'Barret Oliver, Noah Hathaway, Moses Gunn, Tami Stronach, Patricia Hayes, Sydney Bromley', 'Wolfgang Petersen', 94, 14),
(36, 7, 8, 'Terminator 2: el juicio final', 1, 'Sarah Connor, la madre soltera del rebelde John Connor, está ingresada en un psiquiátrico. Tras haber sido informada por un viajero del tiempo de que su hijo se convertiría en el salvador de la humanidad del futuro amenazada por un diabólico mundo de máquinas, se ha convertido en una especie de guerrera que ha educado a John en tácticas de supervivencia, pero todos creen que está loca y que es peligrosa, por lo que está encerrada. Cuando un nuevo androide mejorado proveniente del futuro, un T-1000, llega para asesinar a John, un viejo modelo T-800 será enviado para protegerle.', 'terminator2.jpg', '2022-07-27', 'Arnold Schwarzenegger, Linda Hamilton, Edward Furlong, Robert Patrick, Earl Boen, Joe Morton', 'James Cameron', 135, 21),
(37, 2, 1, 'Volar por los aires', 1, 'Un peligroso terrorista provoca diversas explosiones en el centro de Boston. Un policía especializado en desactivar explosivos emprende la caza del criminal por toda la ciudad. En esta lucha el policía ve cómo renacen en él sus temores de antaño, mientras que el terrorista utiliza a la familia del policía para chantajearle.', 'volar_por_los_aires.jpg', '2022-07-27', 'Jeff Bridges , Tommy Lee Jones , Lloyd Bridges , Forest Whitaker', 'Stephen Hopkins', 120, 19),
(38, 2, 2, 'Los Bingueros', 2, 'Amadeo es un mediocre empleado de banca que nunca alcanzará ese tranquilo nivel económico con el que todo el mundo sueña. Tampoco Fermín tiene muy seguro su futuro. Cobra el paro y hace chapuzas vendiendo libros y haciendo contratos de entierros pagados a plazos. Por distintas razones llegan a la conclusión de que el bingo puede llegar a ser la solución de sus males, y ambos personajes se conocen en la cola de entradas a un local del bingo. Aúnan sus esfuerzo,s pero ni siquiera así logran sacar dinero al juego. Pero ya están atrapados por el vicio. Y siguen jugando aunque para ello tengan que recurrir a todo tipo de trucos para lograr el dinero necesario...', 'los_bingueros.jpg', '2022-07-27', 'Fernando Esteso, Andrés Pajares, Antonio Ozores, África Prat, Isabel Luque, Florinda Chico, Norma Duval, Pilar Muñoz, Rafael Alonso, Luis Barbero', 'Mariano Ozores', 90, 12),
(39, 6, 1, 'Sospechosos Habituales', 1, 'Dave Kujan, un agente especial que trabaja para el servicio de aduanas de EEUU, está investigando las consecuencias de un incendio a bordo de un barco en el puerto de San Pedro de Los Ángeles, con un balance de 27 víctimas mortales, todas aparentemente asesinadas. La única fuente de información de Kujan es Roger Kint, un estafador lisiado que sobrevivió al incendio. Kint cuenta que todo comenzó 6 semanas atrás en Nueva York cuando 5 delincuentes, 5 \"sospechosos habituales\", fueron detenidos para una rueda de reconocimiento referente al robo de un camión de armas...', 'sospechosos_habituales.jpg', '2022-07-27', 'Kevin Spacey, Chazz Palminteri, Benicio del Toro, Gabriel Byrne, Stephen Baldwin, Pete Postlethwaite, Giancarlo Esposito, Dan Hedaya, Suzy Amis, Kevin Pollak', 'Bryan Singer', 105, 15),
(40, 2, 1, 'Depredador', 1, 'Un comando de mercenarios es contratados por la CIA para rescatar a unos pilotos apresados por las guerrillas en la selva Centroamericana. La misión resulta satisfactoria, pero durante su viaje de regreso se dan cuenta de que algo invisible está dándoles caza uno a uno. Ese algo resulta ser un cazador alienígena que se queda con las calaveras de sus víctimas como trofeos.', 'depredador.jpg', '2022-07-27', 'Arnold Schwarzenegger, Carl Weathers, Elpidia Carrillo, Bill Duke, Kevin Peter Hall, Sonny Landham, R.G. Armstrong', 'John McTiernan', 107, 12),
(41, 4, 10, 'Por un puñado de dólares', 6, 'Tras la muerte de Juárez, en México dominan la injusticia y el terror. Joe llega al pueblo fronterizo de San Miguel, donde dos familias se disputan el poder, y entra al servicio del clan Rojo. Una noche Joe es testigo del intercambio de oro por armas entre mexicanos y soldados de la Unión.', 'por_un_puñado_de_dolares.jpg', '2022-07-27', 'Clint Eastwood, Marianne Koch, Gian Mª Volonte, Jose Calvo', 'Sergio Leone', 101, 14),
(42, 5, 2, 'Porky´s', 1, 'En Florida, durante la década de los cincuenta, un grupo de pícaros adolescentes que van juntos a la escuela descubren el sexo y el amor. Para dar rienda suelta a sus necesidade intentan entrar en un local de alterne, pero, al negarles la entrada el dueño del establecimiento, conciben todo tipo de gamberradas contra él. A partir de entonces le harán la vida imposible con tal de lograr tener acceso a las chicas.', 'porkys.jpg', '2022-07-27', 'Roger Wilson, Bill Hindman, Jack Mulcahy, Mark Herrier, Wyatt Knight, Susan Clark, Art Hindle, Wayne Maunder', 'Bob Clark', 98, 16),
(43, 6, 10, 'Cometieron dos errores', 6, 'Jed Cooper va a ser ahorcado acusado de haber robado ganado. En el último instante, es salvado por un comisario a las órdenes del juez Fentom. Cooper es aconsejado por el juez para que se olvide del pasado y le ofrece un puesto como comisario de todo el territorio ocupándose de las misiones más complicadas y trayendo a los acusados para que sean juzgados por el propio juez. La vida de Cooper, sin embargo, está marcada por la cicatriz que le dejó la soga en el cuello, y además un día es atacado por cinco de los nueve hombres, quedando malherido. Raquel le atiende y le pide que descubra quien mató a su marido y luego la ultrajó. Cuando se repone de sus heridas, Cooper es autorizado por el juez para que se encargue de la detención de los cinco bandidos que le atacaron.', 'cometieron_dos_errores.jpg', '2022-07-27', 'Clint Eastwood, Inger Stevens, Ed Begley, Pat Hingle, Ben Johnson, Charles McGraw, Ruth White, Bruce Dern', 'Ted Post', 105, 18),
(44, 7, 9, 'La bella y la bestia', 1, 'Bella es una hermosa campesina que vive con su padre, un viejo inventor, en un pequeño pueblo. Un día su padre es secuestrado por una horrible bestia que es el dueño y señor de un inmenso castillo. A cambio de su liberación, el monstruo le exigirá un deseo que deberá cumplir o morir.', 'bella_y_bestia.jpg', '2022-07-27', '', 'Gary Trousdale, Kirk Wise', 84, 19),
(45, 7, 9, 'La Sirenita', 1, 'Lila es la princesa de las sirenas. Está a punto de celebrarse su fiesta de cumpleaños y su mayor ilusión sería la de poder visitar a los humanos, puesto que nunca los ha visto. Ayudada por la bruja Cassandra, Lila conseguirá subir a la superficie donde salvará de morir ahogada a un hermoso príncipe cuyo barco acaba de naufragar y del que se enamorará perdidamente. No obstante el príncipe es finalmente recogido del mar por una ambiciosa princesa cuyo padre, el Rey, le dice que en compensación debe casarse con ella. Mientras tanto, Lila ha vuelto al fondo del mar y le pide a Cassandra que la convierta en ser humano para poderse casar con el príncipe. Pero Cassandra sólo la convertirá en humana con una condición: si finalmente no se casa con el príncipe, se convertirá en espuma marina. Ella acepta y va en busca del príncipe, quien también se enamora de ella. Pero el padre de la princesa despechada entrará en guerra con el del príncipe si éste no se casa con su ambiciosa hija.', 'la_sirenita.jpg', '2022-07-27', '', 'Ron Clements, John Musker', 76, 20),
(46, 6, 7, 'Karate Kid', 1, 'Daniel llega a Los Angeles y encara la difícil tarea de hacer nuevos amigos. Se hace objeto de las burlas de los \"Cobras\", una temerosa banda de estudiantes de karate, cuando se relaciona con Ali, la ex-novia del jefe de los \"Cobras\". Deseoso de contraatacar, para impresionar a su nueva amiga, le pide ayuda a su amigo Miyagi, un maestro de las artes marciales, para que le enseñe karate.', 'karate_kid.jpg', '2022-07-27', 'Ralph Macchio, Pat Morita, Elizabeth Shue, Martin Kove', 'John G. Avildsen', 122, 21),
(47, 4, 7, 'Conan el Bárbaro', 1, 'Un niño habitante de una aldea bárbara graba en sus memoria los rostros y distintivos de aquellos guerreros que han exterminado a su familia, entregándole a él a unos mercaderes de esclavos.', 'conan_el_barbaro.jpg', '2022-07-27', 'Arnold Schwarzenegger, James Earl Jones, Max von Sydow, Sandahl Bergman, Ben Davidson, Gerry Lopez, Mako, Valérie Quennessen, William Smith, Luis Barboo', 'John Milius', 130, 15),
(48, 2, 8, 'Tron', 1, 'Un hacker es dividido en moléculas y transportado a las entrañas de un ordenador en el que un malvado programa controla los comportamientos a su antojo.', 'tron.jpg', '2022-07-27', 'Jeff Bridges, Bruce Boxleitner, David Warner, Cindy Morgan, Barnard Hughes, Dan Shor, Peter Jurasik, Tony Stephano', 'Steven Lisberger', 96, 18),
(49, 4, 6, 'Juegos de Guerra', 1, 'A David Lughtman, estudiante de diecisiete años, le han suspendido varias asignaturas. Pero haciendo uso de su gran habilidad con las computadoras, logra cambiar las notas y aprobar el curso. Un día, jugando con su máquina, David entra en contacto con \"Joshua\", la computadora del Departamento de Defensa de los Estados Unidos, y decide \"jugar a la guerra\". El muchacho cree que es un juego más pero, sin darse cuenta, desafía a \"Joshua\" a un escalofriante juego de guerra termonuclear mundial. Entre las dos máquinas planean desplegar todas las estrategias y opciones para una Tercera Guerra Mundial.', 'juegos_de_guerra.jpg', '2022-07-27', 'Matthew Broderick, Dabney Coleman, John Wood, Ally Sheedy, Barry Corbin, Juanin Clay, Kent Williams, Dennis Lipscomb', 'John Badham', 114, 12),
(50, 9, 8, 'Avatar', 1, 'Año 2154. Jake Sully (Sam Worthington), un ex-marine condenado a vivir en una silla de ruedas, sigue siendo, a pesar de ello, un auténtico guerrero. Precisamente por ello ha sido designado para ir a Pandora, donde algunas empresas están extrayendo un mineral extraño que podría resolver la crisis energética de la Tierra. Para contrarrestar la toxicidad de la atmósfera de Pandora, se ha creado el programa Avatar, gracias al cual los humanos \"conductores\" mantienen sus conciencias unidas a un avatar: un cuerpo biológico controlado de forma remota que puede sobrevivir en el aire letal. Esos cuerpos han sido creados con ADN humano, mezclado con ADN de los nativos de Pandora, los Navi. Convertido en avatar, Jake puede caminar otra vez. Su misión consiste en infiltrarse entre los Navi, que se han convertido en el mayor obstáculo para la extracción del mineral. Pero cuando Neytiri, una bella Navi (Zoe Saldana), salva la vida de Jake, todo cambia: Jake es admitido en su clan, tras superar muchas pruebas. Mientras, los hombres esperan que la información obtenida por Jake les sea útil.', 'avatar.jpg', '2022-07-27', 'Sam Worthington, Zoe Saldana, Sigourney Weaver, Stephen Lang, Michelle Rodríguez, Giovanni Ribisi, Joel Moore, Wes Studi, CCH Pounder, Laz Alonso, Dileep Rao', 'James Cameron', 161, 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`IDGENERO`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`IDPELICULA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
