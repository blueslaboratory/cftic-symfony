CREATE TABLE DISTRIBUIDORAS(
	DISTRIBUIDORA varchar(40) PRIMARY KEY,
    IMAGEN varchar(20),
    INTERNET varchar(35)
)ENGINE=InnoDB;

INSERT INTO DISTRIBUIDORAS VALUES('20 th Centyry Fox','20century.jpg','http://www.fox.es/');
INSERT INTO DISTRIBUIDORAS VALUES('Aurum','aurum.gif','http://www.aurum.es/');
INSERT INTO DISTRIBUIDORAS VALUES('Columbia Tristar','columbia.jpg','http://www.columbia-tristar.es/');
INSERT INTO DISTRIBUIDORAS VALUES('Filmax','filmax.gif','http://www.filmax.com/');
INSERT INTO DISTRIBUIDORAS VALUES('Lauren Films','laurenfilmx.gif','http://www.laurenfilm.es/');
INSERT INTO DISTRIBUIDORAS VALUES('Lola Films','lolafilms.gif','http://www.lolafilms.com/');
INSERT INTO DISTRIBUIDORAS VALUES('MGM','mgm.jpg','http://www.mgm.com/');
INSERT INTO DISTRIBUIDORAS VALUES('Miramax','miramax.jpg','http://www.miramax.com/');
INSERT INTO DISTRIBUIDORAS VALUES('New Line Cinema','newlinecinema.jpg','http://www.newline.com/');
INSERT INTO DISTRIBUIDORAS VALUES('Tri-Pictures','tripictures.gif','http://www.tripictures.com/');
INSERT INTO DISTRIBUIDORAS VALUES('UIP - Paramount,Universal y Dreamworks','paramount.jpg','http://www.uip.es/');
INSERT INTO DISTRIBUIDORAS VALUES('Walt Disney','waltdisney.jpg','http://www.disney.com/');
INSERT INTO DISTRIBUIDORAS VALUES('Warner Bross','warner.gif','http://www.warnerbros.com/');

COMMIT;
