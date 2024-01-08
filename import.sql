DROP DATABASE IF EXISTS `nieuwspagina_zometeen`;

CREATE DATABASE `nieuwspagina_zometeen`;

USE `nieuwspagina_zometeen`;


CREATE TABLE `nieuwsberichten` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titel VARCHAR(100) NOT NULL,
    categorie ENUM('economie', 'sport', 'media_en_cultuur', 'overig') NOT NULL,
    datum_geplaatst DATETIME NOT NULL,
    inhoud1 TEXT NOT NULL,
    inhoud2 TEXT NOT NULL,
    afbeelding_naam VARCHAR(100)
);

CREATE TABLE `opmerkingen` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_nieuwsbericht INT NOT NULL,
    naam_gebruiker VARCHAR(100) NOT NULL,
    opmerking TEXT NOT NULL,
    datum_geplaatst DATETIME NOT NULL
);

CREATE TABLE `advertenties` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(100) NULL,
    afbeelding_naam VARCHAR(100)
);

INSERT INTO nieuwsberichten (titel, categorie, datum_geplaatst, inhoud1, inhoud2, afbeelding_naam) VALUES
('Software developers tekort!', 'economie', '2023-01-09', 'Onlangs zijn er veel bedrijven die verlangen naar software developers, maar het aanbod is er niet. Teveel bedrijven gaan failet omdat ze geen ervaren/goede software developers in hun bedrijven hebben.', ' Dit is een groot economisch probleem. Een van de grotere oorzaken is een gebrek aan talent, veel mensen hebben het talent er niet voor om een software developer te worden. Het is ook voor de jongeren en de mensen die de opleiding volgen de moeilijkste van het ROC college.
Zelfs wanneer bedrijven erin slagen om softwareontwikkelaars te vinden om uit te kiezen, staan ze voor de volgende uitdagingen: de softwareontwikkelaars hebben niet genoeg ervaring, ze beschikken niet over alle technische vaardigheden die nodig zijn voor het werk, ze hebben niet de juiste soft skills (communicatie, probleemoplossing, teamwerk, leiderschap, arbeidsethos, flexibiliteit), ze hebben geen formele opleiding en ze hebben te hoge salarisverwachtingen.
', 'SDTekort'),
('Stuk meer salaris voor supermarkt medewerkers.', 'economie', '2022-08-12', 'Werkgevers in de supermarktbranche zijn bereid de lonen van zo’n 300.000 werknemers met 9% te verhogen. Vakbond FNV eist 14,3%.', '“We willen werknemers die te maken hebben met hoge kosten, een steun in de rug bieden”, zegt directeur Patricia Hoogstraten van het Vakcentrum. “Ook de jeugdlonen moeten omhoog.” De huidige cao loopt 1 julie af, dus voor werkgevers en vakbonden is et tijd om snel tot een goed akkoord te komen.', 'SMSalaris'),
('Mourinho belaagt scheidsrechter in parkeergarage.', 'sport', '2022-08-18', 'José Mourinho was woedend na de verloren Europa League-finale tegen Sevilla. Vooral de Engelse scheidsrechter moest het ontgelden, omdat hij volgens Mourinho ‘niet had gefloten bij een duidelijke strafschop’.', 'Beelden tonen hoe hij in de parkeerplaats te keer gaat tegen de scheidsrechter. “Je bent een f*cking schande”, riep hij een, waarna er ook beledigingen in het italiaans volgden. Mourinho leed zijn eerste nederlaag als coach in een Europese finale. Zijn zilveren medaille gaf hij na afloop aan een fan.', 'Scheidsrechter'),
('Van der Sar verklaart vertrek bij Ajax: ‘je hebt als algemeen directeur continu druk’.', 'sport', '2022-10-28', 'Edwin van der Sar heeft dinsdag zijn vertrek als algemeen directeur bij Ajax toegelicht. Niet alleen het rampzalige seizoen van de recordkampioen, maar ook de constante druk heeft hem doen besluiten te stoppen.', '“je hebt als algemeen directeur continu druk op je. Wat dat betreft zijn de dingen die johan cruijff heeft gezegd toen hij me vroeg waarheid geworden. Op een gegeven moment is het genoeg en dan moet je naar jezelf kijken”, vertelde Van der Sar in zijn laatste interview met Ajax TV. Van der Sar maakte eerder op dinsdag bekend na elf jaar te vertrekken uit de directie van Ajax. De 52-jarige oud-doelman was sinds november 2016 algemeen directeur van de club, die afgelopen seizoen tegenvallend presteerde. Van der Sar is naar eigen zeggen “op”.', 'VoetbalspelerVertrekt'),
('Mocro maffia-acteur Robert de Hoog: ‘Acteren is niet altijd dankbaar werk’.', 'media_en_cultuur', '2023-02-24', 'Hij was slechts achttien jaar oud toen hij een prestigieuze gouden Kalf ontving voor zijn rol in de film skin. Daarna volgden vele rollen voor de inmiddels 34-jarige Robert de Hoog. Maar bij het grote publiek is hij vooral bekend als Rinus ‘Tatta’ massing in Mocro Maffia.', '“Ik speel Taata als sinds 2018, dus het voelt als thuiskomen”, zegt De Hoog in gesprek met NU.nl. “Zodra mijn haar achterover wordt gekamd, ben ik hem.” De acteur is gefascineerd door de onderwereld en vonf het daarom leuk mee te denken over de invulling van Tatta. DE hoog heeft de rol dan ook grotendeels zelf gecreëerd. “Ik heb bedacht hoe Tatta eruitziet, beweegt en loopt.” Het is heel tof om te zien dat iedereen hem heeft omarmd.', 'Acteur'),
('Jeugdprogramma Taarten van Abel krijgt vervolg met nieuwe presentator.', 'media_en_cultuur', '2023-04-18', 'Taarten van Abel krijgt definitief een vervolg. In april stopte Siemon de Jong na twintig jaar met de presentatie van het jeugdprogramma. De VPRO is nu op zoek naar een nieuwe presentator.', 'De voorlopige titel van het programma is Taarten van Abel. De naam is gebaseerd op het beroemde schilderij de toern van babel, dat in de vorm van een taart wordt afgebeeld in de leader van het programma. Het nieuwe seizoen zal in 2024 van start gaan. In Taarten van Abel werd De Jong door een kind uitgenodigd om een taart te bakken voor een speciaal persoon. Tijdens het bakken en versieren van het gebak komen de levensvragen van de kinderen aan bod.', 'Taart'),
('Al Pacino (83) en zijn 29-jarige vriendin verwachten een kind.', 'overig', '2023-05-06', 'De 83-jarige acteur Al Pacino wordt voor de vierde keer vader. Zijn 29-jarige vriendin Noor Alfallah bevalt volgende maand van hun kind.', 'De vriendin van pacino is acht maanden zwanger, meldt TMZ. De acteur en alfallah zijn sinds april vorig jaar samen. Alfallah had tot 2018 een relatie met de nu 79-jarige The Rolling Stones-zangre Mick Jagger. Kort daarna was ze samen met de 61-jarige Amerikaanse miljardair en investeerder Nicolas Berggruen. Pacino kreeg zijn eerste twee kinderen met Beverly D’Angelo. Jan Tarrant is de moeder van zijn derde kind. Pacino is niet de enige acteur die op hoge leeftijd opnieuw vader geworden. Zo heeft zijn ‘the godfather-’ en ‘the irishman’- collega Robert De Niro eerder deze maand op 79-jarige leeftijd zijn zevende kind gekregen. Zijn vriendin tiffany chen is in april bevallen van hun dochter.', 'AlPacino'),
('Amazon-oprichter Jeff Bezos is verloofd met vriendin Lauren Sánchez.', 'overig', '2023-05-07', 'Jeff Bezos heeft zijn vriendin Lauren Sánchez ten huwelijk gevraagd. De 59-jarige Amerikaanse miljardair ging op vakantie in spanje op zijn knieën voor de 53-jarige Sánchez. Meldt entertainmentwebsite TMZ.', 'Op foto’s is te zien dat Sánchez een grote diamant om haar ringvinger heeft. Het grote moment vond enkele dagen eerder al plaats. Daarbij waren geen andere mensen aanwezig, zodat het stel het nieuws geheim kon houden. Bezos en Sánchez varen momenteel met een jacht langs de Franse Riviéra, waar ze vanaf de spaanse eilanden naartoe zijn gereisd. Bezos werd bekend als oprichter van Amazon.com. Naar verluidt heeft hij een vermogen van zeker 139 miljard dollar (128 miljard euro). Sánchez vergaarde in de Verenigde Staten bekendheid als presentatrice en nieuwslezer, onder meer bij de zender FOX.', 'JeffBezos');

INSERT INTO advertenties (naam, afbeelding_naam) VALUES
('Auto_kopen', 'auto'),
('Berg_vakantie', 'berg'),
('Afstandbediening', 'fireTVStick'),
('Pokemon', 'pokemon'),
('Uzumaki_Ramen', 'ramen'),
('woke_ramen', 'woke'),
('Winkelcentrum', 'shoppingcart');


CREATE TABLE gebruikersgegevens (
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    voornaam VARCHAR(100) NOT NULL,
    Achternaam VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL
);