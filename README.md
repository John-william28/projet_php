CONTEXTE

Vous	êtes	missionné	pour	créer	une	application	web	permettant	à	une	bibliothèque	locale	
de	moderniser	sa	gestion	des	livres	et	de	simplifier	la	gestion	des	favoris	pour	les	
utilisateurs.	Ce	projet	vise	à	rendre	le	catalogue	accessible	en	ligne	et	à	permettre	aux	
utilisateurs	de	personnaliser	leur	expérience.	
Objectifs généraux du projet 
1.	Rendre	le	catalogue	de	livres	accessible	en	ligne.	
2.	Permettre	aux	utilisateurs	de	s'inscrire,	se	connecter,	et	personnaliser	leur	expérience	via	
un	tableau	de	bord.	
3.	Offrir	une	gestion	simple	et	intuitive	des	livres	favoris.	
4.	Assurer	la	sécurité	des	données	des	utilisateurs	et	des	sessions.	
Organisation et étapes 
Le	TP	est	découpé	en	quatre	étapes	principales	avec	des	objectifs	précis	et	des	consignes	
claires.
		
Étape 1 : Afficher les livres disponibles 

Objectif	:	Créer	une	page	d'accueil	qui	affiche	la	liste	des	livres	disponibles	dans	la	
bibliothèque.	

Consignes	:	
1.	Créez	une	base	de	données	`bibliotheque`	avec	une	table	`livres`	contenant	les	colonnes	
suivantes	:	id,	titre,	auteur.	
2.	Insérez	quelques	livres	dans	la	table	pour	vos	tests	(par	exemple	:	'1984',	'Le	Petit	
Prince').	
3.	Créez	un	fichier	`index.php`	qui	se	connecte	à	la	base	de	données,	récupère	les	livres	
disponibles,	et	affiche	chaque	livre	sous	forme	de	liste.	
4.	Ajoutez	des	liens	pour	s'inscrire	et	se	connecter.
   
Étape 2 : Créer un système d’inscription 

Objectif	:	Permettre	à	un	utilisateur	de	créer	un	compte	pour	accéder	à	son	tableau	de	bord.	

Consignes	:	

1.	Créez	une	table	`utilisateurs`	avec	les	colonnes	suivantes	:	id,	nom,	email,	password.	
2.	Créez	un	fichier	`register.php`	pour	afficher	un	formulaire	HTML	et	enregistrer	un	
utilisateur	dans	la	base	de	données	après	vérification.	
3.	Hachez	le	mot	de	passe	avant	de	l’enregistrer.	
4.	Redirigez	l'utilisateur	vers	la	page	de	connexion	après	l'inscription.
   
Étape 3 : Système de connexion et tableau de bord 

Objectif	:	Permettre	à	un	utilisateur	de	se	connecter	et	d'accéder	à	son	tableau	de	bord	
personnalisé.	

Consignes	:	

1.	Créez	un	fichier	`login.php`	pour	afficher	un	formulaire	HTML	permettant	de	vérifier	les	
informations	de	connexion.	
2.	Initialisez	une	session	pour	l’utilisateur	connecté.	
3.	Créez	un	fichier	`dashboard.php`	pour	afficher	un	message	de	bienvenue	et	permettre	à	
l’utilisateur	de	se	déconnecter,	éditer	son	compte	et	voir	les	livres	disponibles.	
Étape 4 : Gestion des favoris

Objectif	:	Permettre	à	un	utilisateur	de	gérer	ses	livres	favoris	dans	son	tableau	de	bord.	

Consignes	:	

1.	Créez	une	table	`favoris`	avec	les	colonnes	suivantes	:	id,	utilisateur_id,	livre_id.	
2.	Modifiez	le	tableau	de	bord	pour	ajouter	un	bouton	'Ajouter	aux	favoris'	à	côté	de	chaque	
livre.	
3.	Ajoutez	une	section	'Mes	favoris'	qui	affiche	uniquement	les	livres	favoris	de	l’utilisateur	
connecté.	
4.	Gérez	les	interactions	utilisateur	avec	des	formulaires	HTML.	
Étape 5 : Permettre aux utilisateurs d’ajouter des livres 
Objectif : Permettre à chaque utilisateur connecté d’ajouter un livre au catalogue de la 
bibliothèque. Les livres ajoutés seront accessibles à tous les utilisateurs.	
1. Modifiez la table livres pour inclure une colonne utilisateur_id afin de suivre qui a ajouté 
chaque livre. 
2. Mise à jour du tableau de bord (dashboard.php) : 
• Ajoutez un formulaire pour permettre à l’utilisateur connecté de saisir : 
• Le titre du livre. 
• L’auteur du livre. 
• Lorsque l’utilisateur soumet le formulaire, le livre est ajouté à la table livres avec 
l’utilisateur_id du créateur. 
3. Validation des données : 
• Vérifiez que le titre et l’auteur ne sont pas vides avant d’ajouter le livre. 
• Affichez un message d’erreur si les champs ne sont pas correctement remplis. 
4. Affichage dans le tableau de bord : 
• Après l’ajout, affichez un message de confirmation et mettez à jour la liste des livres 
pour inclure le nouveau livre. 
Extensions 
1. Ajouter	une	barre	de	recherche	pour	filtrer	les	livres	par	titre	ou	auteur	(Page	
d’accueil	et	dashboard).	
2.	Ajouter	une	pagination	pour	afficher	les	livres	par	pages	si	la	liste	est	longue.	
Structure	des	fichiers	du	projet 
• Voici	la	structure	des	fichiers	pour	organiser	le	projet.	Ces	fichiers	doivent	être	
placés	dans	un	dossier	appelé	'bibliotheque'	:	
bibliotheque/	
├──	index.php										
├──	register.php							
├──	login.php										
(Page	d'accueil	avec	les	livres	disponibles)	
(Page	d'inscription	des	utilisateurs)	
(Page	de	connexion	des	utilisateurs)	
├──	dashboard.php						(Tableau	de	bord	utilisateur	pour	gérer	les	favoris	et	éditer	
son	compte)	
├──	classes/	
│			├──	Livre.php						(Classe	pour	la	gestion	des	livres)	
│			├──	Utilisateur.php	(Classe	pour	la	gestion	des	utilisateurs)		
• │			├──	Favoris.php						(Classe	pour	la	gestion	des	favoris)	
├──	db.php													
(Fichier	de	connexion	à	la	base	de	données)	
├──	logout.php									
(Fichier	pour	gérer	la	déconnexion)
