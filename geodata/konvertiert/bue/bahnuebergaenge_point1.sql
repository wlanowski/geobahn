 DROP TABLE IF EXISTS bahnuebergaenge_point;
 CREATE TABLE bahnuebergaenge_point (
mifcode                          Char(11), 
strecke_nr                       Integer, 
richtung                         Char(8), 
km_i                             Integer, 
km_l                             Char(56), 
bezeichnun                       Char(200), 
techn_sich                       Char(120), 
strassenar                       Char(160), 
geogr_laen                       Numeric(13,8), 
geogr_brei                       Numeric(13,8));
insert into bahnuebergaenge_point values('xka_mrk_831',1000,'0',117310013,'173,1 + 13','Bü 173.114 Flensburg-Weiche - Flensb. Gr','Schrankenabschluss','Strasse',9.39961214,54.75994100);
insert into bahnuebergaenge_point values('xka_mrk_831',1000,'0',117730060,'177,3 + 60','Bü 177.36 Flensburg-Weiche - Flensb. Gr','Schrankenabschluss','Strasse',9.37456587,54.79452802);
insert into bahnuebergaenge_point values('xka_mrk_831',1000,'0',117840036,'178,4 + 36','Bü 178.436 Flensburg-Weiche - Flensb. Gr','Schrankenabschluss','Strasse',9.36938291,54.80371842);
insert into bahnuebergaenge_point values('xka_mrk_831',1000,'0',117910013,'179,1 + 13','Bü 179.113 Flensburg-Weiche - Flensb. Gr','Nicht technisch gesichert','Strasse',9.36611999,54.80950055);
insert into bahnuebergaenge_point values('xka_mrk_831',1000,'0',117950053,'179,5 + 53','Bü 179.552 Flensburg-Weiche - Flensb. Gr','Nicht technisch gesichert','Strasse',9.36399819,54.81325834);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',100110082,'1,1 + 82','Bü 1.182 Jübek - Husum','Nicht technisch gesichert','Strasse',9.38829438,54.56460650);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',100190033,'1,9 + 33','Bü 1.933 Jübek - Husum','Nicht technisch gesichert','Strasse',9.37712632,54.56278580);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',100240071,'2,4 + 71','Bü 2.471 Jübek - Husum','Nicht technisch gesichert','Strasse',9.36914607,54.56143366);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',100410018,'4,1 + 18','Bü 4.118 Jübek - Husum','Lichtzeichen / Blinklicht','Strasse',9.34471834,54.55729254);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',100440028,'4,4 + 28','Bü 4.428 Jübek - Husum','Lichtzeichen / Blinklicht','Strasse',9.34012106,54.55651260);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',100510004,'5,1 + 4','Bü 5.104 Jübek - Husum','Schrankenabschluss','Strasse',9.33009691,54.55481061);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',100610069,'6,1 + 69','Bü 6.169 Jübek - Husum','Nicht technisch gesichert','Strasse',9.31549994,54.55056545);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',100820057,'8,2 + 57','Bü 8.259 Jübek - Husum','Nicht technisch gesichert','Strasse',9.28970912,54.53930335);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',100930027,'9,3 + 27','Bü 9.329 Jübek - Husum','Schrankenabschluss','Strasse',9.27650865,54.53352555);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',100960004,'9,6 + 4','Bü 9.606 Jübek - Husum','Nicht technisch gesichert','Fuss- und Radwege',9.27309535,54.53203440);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',101060009,'10,6 + 9','Bü 10.611 Jübek - Husum','Nicht technisch gesichert','Strasse',9.26236480,54.52556797);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',101210038,'12,1 + 38','Bü 12.144 Jübek - Husum','Schrankenabschluss','Strasse',9.24818551,54.51459363);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',101330052,'13,3 + 52','Bü 13.345 Jübek - Husum','Nicht technisch gesichert','Strasse',9.23690458,54.50589044);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',101430050,'14,3 + 50','Bü 14.348 Jübek - Husum','Schrankenabschluss','Strasse',9.22340824,54.50229305);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',101500080,'15,0 + 80','Bü 15.08 Jübek - Husum','Nicht technisch gesichert','Strasse',9.21222610,54.50152898);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',101580015,'15,8 + 15','Bü 15.82 Jübek - Husum','Schrankenabschluss','Strasse',9.20095661,54.50077204);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',101660015,'16,6 + 15','Bü 16.615 Jübek - Husum','Nicht technisch gesichert','Strasse',9.19005452,54.49773946);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',101740070,'17,4 + 70','Bü 17.47 Jübek - Husum','Nicht technisch gesichert','Strasse',9.18145827,54.49195631);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',102040046,'20,4 + 46','Bü 20.446 Jübek - Husum','Schrankenabschluss','Strasse',9.14025796,54.48047101);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',102180003,'21,8 + 3','Bü 21.8 Jübek - Husum','Nicht technisch gesichert','Strasse',9.12002295,54.47775478);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',102270087,'22,7 + 87','Bü 22.786 Jübek - Husum','Nicht technisch gesichert','Fuss- und Radwege',9.10485044,54.47769566);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',102290061,'22,9 + 61','Bü 22.961 Jübek - Husum','Nicht technisch gesichert','Fuss- und Radwege',9.10221148,54.47799215);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',102310088,'23,1 + 88','Bü 23.192 Jübek - Husum','Schrankenabschluss','Strasse',9.09893808,54.47870055);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',102460099,'24,6 + 99','Bü 24.7 Jübek - Husum','Schrankenabschluss','Strasse',9.07602289,54.47779239);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',102500040,'25,0 + 40','Bü 25.04 Jübek - Husum','Schrankenabschluss','Strasse',9.07207917,54.47585688);
insert into bahnuebergaenge_point values('xka_mrk_831',1011,'0',102570039,'25,7 + 39','Bü 25.737 Jübek - Husum','Nicht technisch gesichert','Strasse',9.06328723,54.47237516);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',100420052,'4,2 + 52','Bü 4.25 Kiel-Hassee C. - Flensburg','Schrankenabschluss','Strasse',10.09173495,54.31982174);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',100560096,'5,6 + 96','Bü 5.7 Kiel-Hassee C. - Flensburg','Schrankenabschluss','Strasse',10.08268201,54.33167000);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',100790010,'7,9 + 10','Bü 7.91 Kiel-Hassee C. - Flensburg','Schrankenabschluss','Strasse',10.09160272,54.35038911);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',101360012,'13,6 + 12','Bü 13.615 Kiel-Hassee C. - Flensburg','Schrankenabschluss','Strasse',10.02971868,54.37018574);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',101440023,'14,4 + 23','Bü 14.421 Kiel-Hassee C. - Flensburg','Nicht technisch gesichert','Strasse',10.02094404,54.37536404);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',101550012,'15,5 + 12','Bü 15.511 Kiel-Hassee C. - Flensburg','Lichtzeichen / Blinklicht','Strasse',10.01072854,54.38309409);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',101610092,'16,1 + 92','Bü 16.19 Kiel-Hassee C. - Flensburg','Nicht technisch gesichert','Strasse',10.00475024,54.38810262);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',101650001,'16,5 + 1','Bü 16.497 Kiel-Hassee C. - Flensburg','Nicht technisch gesichert','Strasse',10.00202666,54.39038417);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',101710043,'17,1 + 43','Bü 17.147 Kiel-Hassee C. - Flensburg','Schrankenabschluss','Strasse',9.99637480,54.39511771);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',101860038,'18,6 + 38','Bü 18.64 Kiel-Hassee C. - Flensburg','Schrankenabschluss','Strasse',9.98319545,54.40613415);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',101890077,'18,9 + 77','Bü 18.98 Kiel-Hassee C. - Flensburg','Schrankenabschluss','Strasse',9.98016235,54.40860848);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',101920049,'19,2 + 49','Bü 19.25 Kiel-Hassee C. - Flensburg','Schrankenabschluss','Strasse',9.97777703,54.41061804);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',102000032,'20,0 + 32','Bü 20.04 Kiel-Hassee C. - Flensburg','Nicht technisch gesichert','Strasse',9.96971754,54.41578771);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',102070012,'20,7 + 12','Bü 20.71 Kiel-Hassee C. - Flensburg','Nicht technisch gesichert','Strasse',9.96172467,54.41973896);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',102100013,'21,0 + 13','Bü 21.019 Kiel-Hassee C. - Flensburg','Nicht technisch gesichert','Strasse',9.95818645,54.42148799);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',102150078,'21,5 + 78','Bü 21.58 Kiel-Hassee C. - Flensburg','Lichtzeichen / Blinklicht','Strasse',9.95154538,54.42477166);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',102240021,'22,4 + 21','Bü 22.425 Kiel-Hassee C. - Flensburg','Schrankenabschluss','Strasse',9.94162648,54.42967164);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',102470022,'24,7 + 22','Bü 24.73 Kiel-Hassee C. - Flensburg','Nicht technisch gesichert','Strasse',9.91111022,54.43754053);
insert into bahnuebergaenge_point values('xka_mrk_831',1020,'0',102520030,'25,2 + 30','Bü 25.23 Kiel-Hassee C. - Flensburg','Nicht technisch gesichert','Strasse',9.90335677,54.43769908);
