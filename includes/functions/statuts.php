<?php

define('COLIPOSTE_LIVRAISON_RETARD', 'RETARD'); 
define('COLIPOSTE_LIVRAISON', 'LIVRE');
define('COLIPOSTE_LIVRAISON_OK', 'DELAI RESPECTE');
define('COLIPOSTE_LIVRAISON_TRANSIT', 'EN TRANSIT');
define('COLIPOSTE_LIVRAISON_INTERNATIONAL', 'DELAI INTERNATIONAL');
define('COLIPOSTE_RECLAMATION_DEMANDE', 'RECLAMATION FAITE');
define('COLIPOSTE_RECLAMATION_REMBOURSE', 'REMBOURSE');
define('COLIPOSTE_NO_INFORMATION', 'INCONNU');
define('COLIPOSTE_ERREUR_MD5', 'MD5 INCONNU');


// Mise à jour des statuts

// Ajout automatique statut inconnu 22-12-2011
$status['6f143c220f5af47b17276cec61b0d003']['description'] = 'Votre colis est livré.';
$status['6f143c220f5af47b17276cec61b0d003']['remboursable'] = 'true';
$status['6f143c220f5af47b17276cec61b0d003']['initial_transit'] = 'false';
$status['6f143c220f5af47b17276cec61b0d003']['email'] = 'false';

// Ajout automatique statut inconnu 22-12-2011
$status['1791bb080a8edbf3d693cdfdc0c7d064']['description'] = 'Votre colis est pris en charge par La Poste. Il est en cours d\'acheminement';
$status['1791bb080a8edbf3d693cdfdc0c7d064']['remboursable'] = 'true';
$status['1791bb080a8edbf3d693cdfdc0c7d064']['initial_transit'] = 'true';
$status['1791bb080a8edbf3d693cdfdc0c7d064']['email'] = 'false';

// Ajout automatique statut inconnu 22-12-2011
$status['f27f6922a4ddd60caebcdc857b631eea']['description'] = 'La livraison de votre colis à été reportée pour absence du destinataire ou cas de force majeure.';
$status['f27f6922a4ddd60caebcdc857b631eea']['remboursable'] = 'true';
$status['f27f6922a4ddd60caebcdc857b631eea']['initial_transit'] = 'true';
$status['f27f6922a4ddd60caebcdc857b631eea']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['b90ec881f410a655a096053b3235fa14']['description'] = 'Votre colis est livré au gardien ou a un des voisins.';
$status['b90ec881f410a655a096053b3235fa14']['remboursable'] = 'true';
$status['b90ec881f410a655a096053b3235fa14']['initial_transit'] = 'false';
$status['b90ec881f410a655a096053b3235fa14']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['66c430d471a42803c9a478637568ae97']['description'] = 'Votre colis est disponible au bureau de poste. Le destinataire une fois l\'avis d\'instance reçu, dispose de 15 jours consécutifs pour retirer le colis sur présentation d\'une pièce d\'identité.';
$status['66c430d471a42803c9a478637568ae97']['remboursable'] = 'true';
$status['66c430d471a42803c9a478637568ae97']['initial_transit'] = 'true';
$status['66c430d471a42803c9a478637568ae97']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['ed59cf21dd3192034e81d27acb7399d0']['description'] = 'L\'adresse de votre colis est incomplète, nous recherchons la partie non renseignée pour le livrer.';
$status['ed59cf21dd3192034e81d27acb7399d0']['remboursable'] = 'false';
$status['ed59cf21dd3192034e81d27acb7399d0']['initial_transit'] = 'true';
$status['ed59cf21dd3192034e81d27acb7399d0']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['0f7f5548c2caac394d1ac8b3338e413d']['description'] = 'Votre colis est en attente de distribution et sera livré prochainement.';
$status['0f7f5548c2caac394d1ac8b3338e413d']['remboursable'] = 'true';
$status['0f7f5548c2caac394d1ac8b3338e413d']['initial_transit'] = 'true';
$status['0f7f5548c2caac394d1ac8b3338e413d']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['6037404e4583d55b94c58ea62bb53ab5']['description'] = 'Votre colis est arrivé dans le pays de destination.';
$status['6037404e4583d55b94c58ea62bb53ab5']['remboursable'] = 'false';
$status['6037404e4583d55b94c58ea62bb53ab5']['initial_transit'] = 'true';
$status['6037404e4583d55b94c58ea62bb53ab5']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['4e40b66bd61470ecc1800a649929daff']['description'] = 'L\'emballage de votre colis a été renforcé pour assurer sa livraison';
$status['4e40b66bd61470ecc1800a649929daff']['remboursable'] = 'true';
$status['4e40b66bd61470ecc1800a649929daff']['initial_transit'] = 'true';
$status['4e40b66bd61470ecc1800a649929daff']['email'] = 'false';

// Ajout automatique statut inconnu 22-12-2011
$status['0f1bbbf84298ed0f45becde7de1d5e16']['description'] = 'Votre colis est disponible dans votre bureau de poste. Le destinataire dispose de 15 jours consécutifs pour retirer son colis sur présentation d\'une pièce d\'identité et de l\'avis d\'instance.';
$status['0f1bbbf84298ed0f45becde7de1d5e16']['remboursable'] = 'true';
$status['0f1bbbf84298ed0f45becde7de1d5e16']['initial_transit'] = 'true';
$status['0f1bbbf84298ed0f45becde7de1d5e16']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['c70442dcb3999ec3d0fd23d06a9c84a2']['description'] = 'Votre colis a été déposé au bureau de poste d\'expédition';
$status['c70442dcb3999ec3d0fd23d06a9c84a2']['remboursable'] = 'true';
$status['c70442dcb3999ec3d0fd23d06a9c84a2']['initial_transit'] = 'true';
$status['c70442dcb3999ec3d0fd23d06a9c84a2']['email'] = 'false';

// Ajout automatique statut inconnu 22-12-2011
$status['77a74aa7695d8ad3b2163e9774c98c16']['description'] = 'Votre colis est pris en charge par La Poste, il est en cours d\'acheminement.';
$status['77a74aa7695d8ad3b2163e9774c98c16']['remboursable'] = 'true';
$status['77a74aa7695d8ad3b2163e9774c98c16']['initial_transit'] = 'true';
$status['77a74aa7695d8ad3b2163e9774c98c16']['email'] = 'false';

// Ajout automatique statut inconnu 22-12-2011
$status['7532509e7b50df5ec75945569fd5e732']['description'] = 'Le destinataire était absent lors de la livraison. Votre colis sera présenté à nouveau le prochain jour ouvré';
$status['7532509e7b50df5ec75945569fd5e732']['remboursable'] = 'true';
$status['7532509e7b50df5ec75945569fd5e732']['initial_transit'] = 'true';
$status['7532509e7b50df5ec75945569fd5e732']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['edf397feb65761b65cd8458a10dee10c']['description'] = 'Votre colis est prêt à être livré';
$status['edf397feb65761b65cd8458a10dee10c']['remboursable'] = 'true';
$status['edf397feb65761b65cd8458a10dee10c']['initial_transit'] = 'true';
$status['edf397feb65761b65cd8458a10dee10c']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['60d58776d0e7bf2e2f01b0b90d26788d']['description'] = 'Votre colis est arrivé sur son site de distribution';
$status['60d58776d0e7bf2e2f01b0b90d26788d']['remboursable'] = 'true';
$status['60d58776d0e7bf2e2f01b0b90d26788d']['initial_transit'] = 'true';
$status['60d58776d0e7bf2e2f01b0b90d26788d']['email'] = 'false';

// Ajout automatique statut inconnu 22-12-2011
$status['c818161eef66de6925c9097ca31e6950']['description'] = 'Votre colis est en cours de livraison dans le bureau de poste du destinataire.';
$status['c818161eef66de6925c9097ca31e6950']['remboursable'] = 'true';
$status['c818161eef66de6925c9097ca31e6950']['initial_transit'] = 'true';
$status['c818161eef66de6925c9097ca31e6950']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['4f33f2c73a18c764ba4f920ac0ffb455']['description'] = 'Votre colis a été remis au gardien';
$status['4f33f2c73a18c764ba4f920ac0ffb455']['remboursable'] = 'true';
$status['4f33f2c73a18c764ba4f920ac0ffb455']['initial_transit'] = 'false';
$status['4f33f2c73a18c764ba4f920ac0ffb455']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['39e00481677ff2eb1c211101e7cd1952']['description'] = 'Votre colis a été remis à un voisin';
$status['39e00481677ff2eb1c211101e7cd1952']['remboursable'] = 'true';
$status['39e00481677ff2eb1c211101e7cd1952']['initial_transit'] = 'false';
$status['39e00481677ff2eb1c211101e7cd1952']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['b90ec881f410a655a096053b3235fa14']['description'] = 'Votre colis est livré au gardien ou a un des voisins.';
$status['b90ec881f410a655a096053b3235fa14']['remboursable'] = 'true';
$status['b90ec881f410a655a096053b3235fa14']['initial_transit'] = 'false';
$status['b90ec881f410a655a096053b3235fa14']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['f27f6922a4ddd60caebcdc857b631eea']['description'] = 'La livraison de votre colis à été reportée pour absence du destinataire ou cas de force majeure.';
$status['f27f6922a4ddd60caebcdc857b631eea']['remboursable'] = 'true';
$status['f27f6922a4ddd60caebcdc857b631eea']['initial_transit'] = 'true';
$status['f27f6922a4ddd60caebcdc857b631eea']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['93149c6e12c85c2901096bf777463a33']['description'] = 'Le destinataire était absent lors de la livraison. Votre colis sera presenté une nouvelle fois le prochain jour ouvré';
$status['93149c6e12c85c2901096bf777463a33']['remboursable'] = 'true';
$status['93149c6e12c85c2901096bf777463a33']['initial_transit'] = 'true';
$status['93149c6e12c85c2901096bf777463a33']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['c034bb3ebdd153f8ce7550c0d931cce3']['description'] = 'Votre colis est livré au gardien ou à un des voisins.';
$status['c034bb3ebdd153f8ce7550c0d931cce3']['remboursable'] = 'true';
$status['c034bb3ebdd153f8ce7550c0d931cce3']['initial_transit'] = 'false';
$status['c034bb3ebdd153f8ce7550c0d931cce3']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['45f4811048f7084ffe10dad4828c388e']['description'] = 'Colis livré';
$status['45f4811048f7084ffe10dad4828c388e']['remboursable'] = 'true';
$status['45f4811048f7084ffe10dad4828c388e']['initial_transit'] = 'false';
$status['45f4811048f7084ffe10dad4828c388e']['email'] = 'false';

// Ajout automatique statut inconnu 22-12-2011
$status['16eca9dce5981c409ec4bf07f27d8493']['description'] = 'Votre colis a été déposé au bureau de poste d\'expédition.';
$status['16eca9dce5981c409ec4bf07f27d8493']['remboursable'] = 'true';
$status['16eca9dce5981c409ec4bf07f27d8493']['initial_transit'] = 'true';
$status['16eca9dce5981c409ec4bf07f27d8493']['email'] = 'false';

// Ajout automatique statut inconnu 22-12-2011
$status['60d58776d0e7bf2e2f01b0b90d26788d']['description'] = 'Votre colis est arrivé sur son site de distribution';
$status['60d58776d0e7bf2e2f01b0b90d26788d']['remboursable'] = 'true';
$status['60d58776d0e7bf2e2f01b0b90d26788d']['initial_transit'] = 'true';
$status['60d58776d0e7bf2e2f01b0b90d26788d']['email'] = 'false';

// Ajout automatique statut inconnu 22-12-2011
$status['0f7f5548c2caac394d1ac8b3338e413d']['description'] = 'Votre colis est en attente de distribution et sera livré prochainement.';
$status['0f7f5548c2caac394d1ac8b3338e413d']['remboursable'] = 'true';
$status['0f7f5548c2caac394d1ac8b3338e413d']['initial_transit'] = 'true';
$status['0f7f5548c2caac394d1ac8b3338e413d']['email'] = 'true';

// Ajout automatique statut inconnu 22-12-2011
$status['3c07a055c0f993b072458aa99ae3cd7e']['description'] = 'distribué';
$status['3c07a055c0f993b072458aa99ae3cd7e']['remboursable'] = 'false';
$status['3c07a055c0f993b072458aa99ae3cd7e']['initial_transit'] = 'false';
$status['3c07a055c0f993b072458aa99ae3cd7e']['email'] = 'false';

// Ajout automatique statut inconnu 22-12-2011
$status['71bd311dbc32a18b230190d129755646']['description'] = 'Votre colis a été déposé au bureau de poste après l\'heure limite de dépôt. Il sera expédié dès le prochain jour ouvré.';
$status['71bd311dbc32a18b230190d129755646']['remboursable'] = 'true';
$status['71bd311dbc32a18b230190d129755646']['initial_transit'] = 'true';
$status['71bd311dbc32a18b230190d129755646']['email'] = 'false';

// Ajout automatique statut inconnu 01-02-2012
$status['40f83a2b22354e9e2c7dc4d410b4d53d']['description'] = 'Votre colis est sorti du bureau d\'échange. Il est en cours d\'acheminement dans le pays de destination';
$status['40f83a2b22354e9e2c7dc4d410b4d53d']['remboursable'] = 'false';
$status['40f83a2b22354e9e2c7dc4d410b4d53d']['initial_transit'] = 'true';
$status['40f83a2b22354e9e2c7dc4d410b4d53d']['email'] = 'false';

// Ajout automatique statut inconnu 04-04-2012
$status['0eedc3cad0b4a79631b9a8ff8765968a']['description'] = 'Aucun produit ne correspond à votre recherche.';
$status['0eedc3cad0b4a79631b9a8ff8765968a']['remboursable'] = 'false';
$status['0eedc3cad0b4a79631b9a8ff8765968a']['initial_transit'] = 'true';
$status['0eedc3cad0b4a79631b9a8ff8765968a']['email'] = 'false';

// Ajout automatique statut inconnu 06-06-2012
$status['dbee6c16f3fabc12b271e96ae78616f0']['description'] = 'Envoi remis au destinataire au point de retrait';
$status['dbee6c16f3fabc12b271e96ae78616f0']['remboursable'] = 'true';
$status['dbee6c16f3fabc12b271e96ae78616f0']['initial_transit'] = 'false';
$status['dbee6c16f3fabc12b271e96ae78616f0']['email'] = 'true';

// Ajout automatique statut inconnu 15-09-2012
$status['7863381786362bd560adbe8dac5e9159']['description'] = 'Votre colis s\'apprête à sortir du pays d\'origine';
$status['7863381786362bd560adbe8dac5e9159']['remboursable'] = 'false';
$status['7863381786362bd560adbe8dac5e9159']['initial_transit'] = 'true';
$status['7863381786362bd560adbe8dac5e9159']['email'] = 'false';

// Ajout automatique statut inconnu 10-11-2012
$status['0fbf2618f3fff8f238d089fb345528e9']['description'] = 'Distribué';
$status['0fbf2618f3fff8f238d089fb345528e9']['remboursable'] = 'true';
$status['0fbf2618f3fff8f238d089fb345528e9']['initial_transit'] = 'false';
$status['0fbf2618f3fff8f238d089fb345528e9']['email'] = 'false';

// Ajout automatique statut inconnu 26-01-2013
$status['49bc0021760d0ca08de66ed23e35ec5e']['description'] = 'Envoi prêt chez l\'expéditeur';
$status['49bc0021760d0ca08de66ed23e35ec5e']['remboursable'] = 'true';
$status['49bc0021760d0ca08de66ed23e35ec5e']['initial_transit'] = 'true';
$status['49bc0021760d0ca08de66ed23e35ec5e']['email'] = 'false';

// Ajout automatique statut inconnu 26-01-2013
$status['83ef1aef4a2a3577f1352d9589007155']['description'] = 'Livraison effectuée';
$status['83ef1aef4a2a3577f1352d9589007155']['remboursable'] = 'true';
$status['83ef1aef4a2a3577f1352d9589007155']['initial_transit'] = 'false';
$status['83ef1aef4a2a3577f1352d9589007155']['email'] = 'false';

// Ajout automatique statut inconnu 26-01-2013
$status['1dd89636e26c022b43557e6ea5ada20f']['description'] = 'Votre colis a été remis au gardien ou à l\'accueil.';
$status['1dd89636e26c022b43557e6ea5ada20f']['remboursable'] = 'true';
$status['1dd89636e26c022b43557e6ea5ada20f']['initial_transit'] = 'false';
$status['1dd89636e26c022b43557e6ea5ada20f']['email'] = 'true';

// Ajout automatique statut inconnu 27-01-2013
$status['fe9e0448d2ab38ad4008d1873a6d2874']['description'] = 'La livraison de votre colis a été reportée pour absence du destinataire ou cas de force majeure';
$status['fe9e0448d2ab38ad4008d1873a6d2874']['remboursable'] = 'true';
$status['fe9e0448d2ab38ad4008d1873a6d2874']['initial_transit'] = 'true';
$status['fe9e0448d2ab38ad4008d1873a6d2874']['email'] = 'true';

// Ajout automatique statut inconnu 31-01-2013
$status['1312a45d0bc76fcd53c6e3d2f1f33fce']['description'] = 'Le colis est disponible dans le Point de Retrait choisi par le Destinataire. Le destinataire va recevoir une notification par mail et/ou par SMS pour lui permettre de retirer le colis.';
$status['1312a45d0bc76fcd53c6e3d2f1f33fce']['remboursable'] = 'true';
$status['1312a45d0bc76fcd53c6e3d2f1f33fce']['initial_transit'] = 'true';
$status['1312a45d0bc76fcd53c6e3d2f1f33fce']['email'] = 'true';

// Ajout automatique statut inconnu 31-01-2013
$status['c7e24151cd70f36d8d72233de00f0363']['description'] = 'Le colis n\'a pu être remis à son Destinataire lors de notre passage et il en a été informé. Le colis sera adressé au Bureau de Poste du Destinataire.';
$status['c7e24151cd70f36d8d72233de00f0363']['remboursable'] = 'true';
$status['c7e24151cd70f36d8d72233de00f0363']['initial_transit'] = 'true';
$status['c7e24151cd70f36d8d72233de00f0363']['email'] = 'true';

// Ajout automatique statut inconnu 31-01-2013
$status['b98620b70e05e4a407f6192b530b1dd2']['description'] = 'Envoi en cours de livraison';
$status['b98620b70e05e4a407f6192b530b1dd2']['remboursable'] = 'true';
$status['b98620b70e05e4a407f6192b530b1dd2']['initial_transit'] = 'true';
$status['b98620b70e05e4a407f6192b530b1dd2']['email'] = 'false';


// Ajout automatique statut inconnu 31-01-2013
//$status['eed0ba71aa1088d6847ffe23983f0eaa']['description'] = 'Votre colis est arrivé dans le pays de destination';
//$status['eed0ba71aa1088d6847ffe23983f0eaa']['remboursable'] = 'true';
//$status['eed0ba71aa1088d6847ffe23983f0eaa']['initial_transit'] = 'false';
///$status['eed0ba71aa1088d6847ffe23983f0eaa']['email'] = 'true';

// Ajout automatique statut inconnu 31-01-2013
$status['b3a40cf12b7b879c1cbcf7d9e6f16fbc']['description'] = 'Votre colis est prêt à être expédié, il n\'est pas encore pris en charge par La Poste.';
$status['b3a40cf12b7b879c1cbcf7d9e6f16fbc']['remboursable'] = 'true';
$status['b3a40cf12b7b879c1cbcf7d9e6f16fbc']['initial_transit'] = 'true';
$status['b3a40cf12b7b879c1cbcf7d9e6f16fbc']['email'] = 'false';

// Ajout automatique statut inconnu 31-01-2013
$status['4d6891872a1a3e451b5479ffc61847f8']['description'] = 'Tri effectué dans l\'agence de départ';
$status['4d6891872a1a3e451b5479ffc61847f8']['remboursable'] = 'true';
$status['4d6891872a1a3e451b5479ffc61847f8']['initial_transit'] = 'true';
$status['4d6891872a1a3e451b5479ffc61847f8']['email'] = 'false';

// Ajout automatique statut inconnu 31-01-2013
$status['0582a025a219bef5657f8f43986e8c8b']['description'] = 'Votre colis est disponible dans le point de retrait \"La Poste\" sélectionné. Le destinataire dispose de 10 jours ouvrables pour retirer son colis sur présentation de son bon de retrait et d\'une pièce d\'identité.';
$status['0582a025a219bef5657f8f43986e8c8b']['remboursable'] = 'true';
$status['0582a025a219bef5657f8f43986e8c8b']['initial_transit'] = 'true';
$status['0582a025a219bef5657f8f43986e8c8b']['email'] = 'true';

// Ajout automatique statut inconnu 31-01-2013
$status['991e10961069ff3f476c35c37531d55d']['description'] = 'Envoi mis à disposition au point de retrait';
$status['991e10961069ff3f476c35c37531d55d']['remboursable'] = 'true';
$status['991e10961069ff3f476c35c37531d55d']['initial_transit'] = 'true';
$status['991e10961069ff3f476c35c37531d55d']['email'] = 'true';

// Ajout automatique statut inconnu 31-01-2013
$status['8b71c77353099ce0f50682bb22be0151']['description'] = 'Votre colis est disponible chez le commerçant sélectionné. Le destinataire dispose de 10 jours ouvrables pour retirer son colis sur présentation d\'une pièce d\'identité et du bon de retrait.';
$status['8b71c77353099ce0f50682bb22be0151']['remboursable'] = 'true';
$status['8b71c77353099ce0f50682bb22be0151']['initial_transit'] = 'true';
$status['8b71c77353099ce0f50682bb22be0151']['email'] = 'true';

// Ajout automatique statut inconnu 31-01-2013
$status['3dbca234d80425a6d8a3106237b9a06f']['description'] = 'Votre colis a été remis au gardien ou à un des voisins';
$status['3dbca234d80425a6d8a3106237b9a06f']['remboursable'] = 'true';
$status['3dbca234d80425a6d8a3106237b9a06f']['initial_transit'] = 'false';
$status['3dbca234d80425a6d8a3106237b9a06f']['email'] = 'true';

// Ajout automatique statut inconnu 01-02-2013

$status['dafef0900ecafea20477bb687d2efba8']['description'] = 'Envoi réceptionné par le point de retrait.';
$status['dafef0900ecafea20477bb687d2efba8']['remboursable'] = 'true';
$status['dafef0900ecafea20477bb687d2efba8']['initial_transit'] = 'true';
$status['dafef0900ecafea20477bb687d2efba8']['email'] = 'true';

// Ajout automatique statut inconnu 04-02-2013

$status['2d8d71f66306103a5c0ac2c593f631e3']['description'] = 'Le colis ne peut actuellement être livré au Destinataire : L\'adresse de livraison est incomplète, nous recherchons la partie non renseignée pour le livrer. Le destinataire peut contacter notre service client pour apporter les compléments nécessaires.';
$status['2d8d71f66306103a5c0ac2c593f631e3']['remboursable'] = 'true';
$status['2d8d71f66306103a5c0ac2c593f631e3']['initial_transit'] = 'true';
$status['2d8d71f66306103a5c0ac2c593f631e3']['email'] = 'true';

// Ajout automatique statut inconnu 11-02-2013

$status['e6624bc6cc6d94327f64435343ad0af6']['description'] = 'Votre colis est en attente de distribution et sera livré prochainement';
$status['e6624bc6cc6d94327f64435343ad0af6']['remboursable'] = 'true';
$status['e6624bc6cc6d94327f64435343ad0af6']['initial_transit'] = 'true';
$status['e6624bc6cc6d94327f64435343ad0af6']['email'] = 'false';

// Ajout automatique statut inconnu 23-02-2013

$status['82fcd7f604d235dd3a16a3aec90ddb53']['description'] = 'Livraison prévue lundi prochain';
$status['82fcd7f604d235dd3a16a3aec90ddb53']['remboursable'] = 'true';
$status['82fcd7f604d235dd3a16a3aec90ddb53']['initial_transit'] = 'true';
$status['82fcd7f604d235dd3a16a3aec90ddb53']['email'] = 'true';

// Ajout automatique statut inconnu 04-02-2013

$status['2d8d71f66306103a5c0ac2c593f631e3']['description'] = 'Le colis ne peut actuellement être livré au Destinataire : L\'adresse de livraison est incomplète, nous recherchons la partie non renseignée pour le livrer. Le destinataire peut contacter notre service client pour apporter les compléments nécessaires.';
$status['2d8d71f66306103a5c0ac2c593f631e3']['remboursable'] = 'true';
$status['2d8d71f66306103a5c0ac2c593f631e3']['initial_transit'] = 'true';
$status['2d8d71f66306103a5c0ac2c593f631e3']['email'] = 'true';

// Ajout automatique statut inconnu 15-02-2013

$status['e0e13c23195168ca434c7e73320e9104']['description'] = 'Votre colis est arrivé par erreur sur un site, il est en cours de réacheminement vers son site de distribution.';
$status['e0e13c23195168ca434c7e73320e9104']['remboursable'] = 'true';
$status['e0e13c23195168ca434c7e73320e9104']['initial_transit'] = 'true';
$status['e0e13c23195168ca434c7e73320e9104']['email'] = 'true';

// Ajout automatique statut inconnu 15-02-2013

$status['8dc134c70424a3d061a4a546541d1e2d']['description'] = 'Envoi présenté à l\'adresse indiquée mais destinataire absent';
$status['8dc134c70424a3d061a4a546541d1e2d']['remboursable'] = 'true';
$status['8dc134c70424a3d061a4a546541d1e2d']['initial_transit'] = 'true';
$status['8dc134c70424a3d061a4a546541d1e2d']['email'] = 'true';

// Ajout automatique statut inconnu 20-02-2013

$status['a598403faac63b73aef126b48a0ea8b9']['description'] = 'Envoi mis à disposition au point retrait';
$status['a598403faac63b73aef126b48a0ea8b9']['remboursable'] = 'true';
$status['a598403faac63b73aef126b48a0ea8b9']['initial_transit'] = 'true';
$status['a598403faac63b73aef126b48a0ea8b9']['email'] = 'true';

// Ajout automatique statut inconnu 28-02-2013

$status['6930055665beafbf28cfd7c8f08a6eb7']['description'] = 'Envoi déposé au bureau de poste';
$status['6930055665beafbf28cfd7c8f08a6eb7']['remboursable'] = 'true';
$status['6930055665beafbf28cfd7c8f08a6eb7']['initial_transit'] = 'true';
$status['6930055665beafbf28cfd7c8f08a6eb7']['email'] = 'true';

// Ajout automatique statut inconnu 01-03-2013

$status['d96f108accfe0f141db81afef18efd6a']['description'] = 'Tri effectué dans l\'agence de distribution';
$status['d96f108accfe0f141db81afef18efd6a']['remboursable'] = 'true';
$status['d96f108accfe0f141db81afef18efd6a']['initial_transit'] = 'true';
$status['d96f108accfe0f141db81afef18efd6a']['email'] = 'false';

// Ajout automatique statut inconnu 08-03-2013

$status['04eec4bc44bca425c1f5c448e91b3e10']['description'] = 'Envoi en transit';
$status['04eec4bc44bca425c1f5c448e91b3e10']['remboursable'] = 'true';
$status['04eec4bc44bca425c1f5c448e91b3e10']['initial_transit'] = 'true';
$status['04eec4bc44bca425c1f5c448e91b3e10']['email'] = 'false';

// Ajout automatique statut inconnu 30-03-2013

$status['36cc0e6f115a5c17dd89a97cec5ea162']['description'] = 'Votre colis est à disposition en boîte postale';
$status['36cc0e6f115a5c17dd89a97cec5ea162']['remboursable'] = 'true';
$status['36cc0e6f115a5c17dd89a97cec5ea162']['initial_transit'] = 'true';
$status['36cc0e6f115a5c17dd89a97cec5ea162']['email'] = 'true';

// Ajout automatique statut inconnu 04-04-2013

$status['b4402349fa2006727770b83b9aff1a4e']['description'] = 'Le colis n\'a pu être livré, il est retourné à l\'expéditeur';
$status['b4402349fa2006727770b83b9aff1a4e']['remboursable'] = 'true';
$status['b4402349fa2006727770b83b9aff1a4e']['initial_transit'] = 'true';
$status['b4402349fa2006727770b83b9aff1a4e']['email'] = 'true';

// Ajout automatique statut inconnu 08-04-2013

$status['ad75530600d79ac2ae88f20f7380a76a']['description'] = 'La livraison de votre colis a été reportée pour accès impossible ou conditions météorologiques défavorables.';
$status['ad75530600d79ac2ae88f20f7380a76a']['remboursable'] = 'true';
$status['ad75530600d79ac2ae88f20f7380a76a']['initial_transit'] = 'true';
$status['ad75530600d79ac2ae88f20f7380a76a']['email'] = 'true';

// Ajout automatique statut inconnu 15-05-2013

$status['04f2e4351fa8f3d42b532c8f2f9d4fdc']['description'] = 'Instruction de livraison reçue';
$status['04f2e4351fa8f3d42b532c8f2f9d4fdc']['remboursable'] = 'true';
$status['04f2e4351fa8f3d42b532c8f2f9d4fdc']['initial_transit'] = 'true';
$status['04f2e4351fa8f3d42b532c8f2f9d4fdc']['email'] = 'false';

// Ajout automatique statut inconnu 18-07-2013

$status['2cbd7a5aa4fdd22f32ec2d725f42a028']['description'] = 'Votre colis est en cours de livraison en point de retrait. Le destinataire va recevoir une notification par mail et/ou par SMS pour lui permettre de retirer le colis.';
$status['2cbd7a5aa4fdd22f32ec2d725f42a028']['remboursable'] = 'true';
$status['2cbd7a5aa4fdd22f32ec2d725f42a028']['initial_transit'] = 'true';
$status['2cbd7a5aa4fdd22f32ec2d725f42a028']['email'] = 'true';

// Ajout automatique statut inconnu 14-08-2013

$status['6264f5bf792b68034266025bad8dfe8a']['description'] = 'Votre colis est retenu par nos services dans l\'attente de son dédouanement.';
$status['6264f5bf792b68034266025bad8dfe8a']['remboursable'] = 'true';
$status['6264f5bf792b68034266025bad8dfe8a']['initial_transit'] = 'true';
$status['6264f5bf792b68034266025bad8dfe8a']['email'] = 'true';

// Ajout automatique statut inconnu 26-09-2013

$status['e2d2b6a1710a09b1c66d1b46ea2c01cf']['description'] = 'Votre colis est livré avec observation du destinataire qui signale que l\'emballage est modérément dégradé.';
$status['e2d2b6a1710a09b1c66d1b46ea2c01cf']['remboursable'] = 'true';
$status['e2d2b6a1710a09b1c66d1b46ea2c01cf']['initial_transit'] = 'false';
$status['e2d2b6a1710a09b1c66d1b46ea2c01cf']['email'] = 'false';

// Ajout automatique statut inconnu 01-10-2013

$status['ea6a260a3505b0946c48b484873fc753']['description'] = 'Votre colis n\'a pas été retiré au bureau de poste dans les délais d\'instance de 15 jours consécutifs, il est retourné à l\'expéditeur';
$status['ea6a260a3505b0946c48b484873fc753']['remboursable'] = 'true';
$status['ea6a260a3505b0946c48b484873fc753']['initial_transit'] = 'true';
$status['ea6a260a3505b0946c48b484873fc753']['email'] = 'true';

// Ajout automatique statut inconnu 01-10-2013

$status['ea6a260a3505b0946c48b484873fc753']['description'] = 'Votre colis n\'a pas été retiré au bureau de poste dans les délais d\'instance de 15 jours consécutifs, il est retourné à l\'expéditeur';
$status['ea6a260a3505b0946c48b484873fc753']['remboursable'] = 'true';
$status['ea6a260a3505b0946c48b484873fc753']['initial_transit'] = 'true';
$status['ea6a260a3505b0946c48b484873fc753']['email'] = 'true';

// Ajout automatique statut inconnu 22-11-2013

$status['78244c6898f0ba01f0434a2eface5336']['description'] = 'Votre colis a quitté le territoire';
$status['78244c6898f0ba01f0434a2eface5336']['remboursable'] = 'false';
$status['78244c6898f0ba01f0434a2eface5336']['initial_transit'] = 'true';
$status['78244c6898f0ba01f0434a2eface5336']['email'] = 'false';

// Ajout automatique statut inconnu 22-11-2013

$status['d47bb7195bca07471a7863fbc016b008']['description'] = 'Colis pris en charge dans notre réseau';
$status['d47bb7195bca07471a7863fbc016b008']['remboursable'] = 'true';
$status['d47bb7195bca07471a7863fbc016b008']['initial_transit'] = 'true';
$status['d47bb7195bca07471a7863fbc016b008']['email'] = 'false';


// Ajout automatique statut inconnu 19-02-2014
//$status['0c0152c1fa1ba4e0a7340c70739420a6']['description'] = 'Votre colis est livré.';
//$status['0c0152c1fa1ba4e0a7340c70739420a6']['remboursable'] = 'true';
//$status['0c0152c1fa1ba4e0a7340c70739420a6']['initial_transit'] = 'false';
//$status['0c0152c1fa1ba4e0a7340c70739420a6']['email'] = 'false';

// Ajout automatique statut inconnu 24-02-2014
$status['17593fdb47790ceec4e375e8f8a37dde']['description'] = 'Votre colis est disponible dans l\'espace Cityssimo sélectionné. Le destinataire dispose de 10 jours ouvrables pour retirer son colis, muni du numéro de retrait et de son code pin.';
$status['17593fdb47790ceec4e375e8f8a37dde']['remboursable'] = 'true';
$status['17593fdb47790ceec4e375e8f8a37dde']['initial_transit'] = 'true';
$status['17593fdb47790ceec4e375e8f8a37dde']['email'] = 'true';

// Ajout automatique statut inconnu 24-02-2014
$status['70715814cf004b60b00bd39f26495421']['description'] = 'Envoi déposé par l\'expéditeur';
$status['70715814cf004b60b00bd39f26495421']['remboursable'] = 'true';
$status['70715814cf004b60b00bd39f26495421']['initial_transit'] = 'true';
$status['70715814cf004b60b00bd39f26495421']['email'] = 'false';

// Ajout automatique statut inconnu 24-02-2014
$status['64644f30acd2b29bcdb94784f8a1f17b']['description'] = 'Réponse donnée par le destinataire : Livraison à un bureau d\'instance choisie';
$status['64644f30acd2b29bcdb94784f8a1f17b']['remboursable'] = 'true';
$status['64644f30acd2b29bcdb94784f8a1f17b']['initial_transit'] = 'true';
$status['64644f30acd2b29bcdb94784f8a1f17b']['email'] = 'false';

// Ajout automatique statut inconnu 24-02-2014
$status['d877d882c137ce401227db6171f382fc']['description'] = 'Le colis n\'a pu être livré au destinataire malgré nos recherches. Le colis est retourné à l\'Expéditeur.';
$status['d877d882c137ce401227db6171f382fc']['remboursable'] = 'true';
$status['d877d882c137ce401227db6171f382fc']['initial_transit'] = 'true';
$status['d877d882c137ce401227db6171f382fc']['email'] = 'true';

// Ajout automatique statut inconnu 24-02-2014
$status['8ef62869e710a827d00a6a8500e01db4']['description'] = 'Réponse donnée par le destinataire : Livraison à domicile à une date choisie.';
$status['8ef62869e710a827d00a6a8500e01db4']['remboursable'] = 'true';
$status['8ef62869e710a827d00a6a8500e01db4']['initial_transit'] = 'true';
$status['8ef62869e710a827d00a6a8500e01db4']['email'] = 'false';

// Ajout automatique statut inconnu 24-02-2014
$status['fc4474f441bdccf77acf16227d5976a4']['description'] = 'La livraison de votre colis a été reportée pour accès impossible.';
$status['fc4474f441bdccf77acf16227d5976a4']['remboursable'] = 'true';
$status['fc4474f441bdccf77acf16227d5976a4']['initial_transit'] = 'true';
$status['fc4474f441bdccf77acf16227d5976a4']['email'] = 'true';

// Ajout automatique statut inconnu 25-02-2014
$status['ca6b78b0e2514ca1aacf867f00ec6bde']['description'] = 'Enlèvement réalisé chez l\'expéditeur';
$status['ca6b78b0e2514ca1aacf867f00ec6bde']['remboursable'] = 'true';
$status['ca6b78b0e2514ca1aacf867f00ec6bde']['initial_transit'] = 'true';
$status['ca6b78b0e2514ca1aacf867f00ec6bde']['email'] = 'false';

// Ajout automatique statut inconnu 27-02-2014
$status['5391effead698da858a7faa593bbb15c']['description'] = 'Votre colis est disponible dans un autre point de retrait \"La Poste\" que celui choisi initialement. Le destinataire dispose de 10 jours ouvrables pour retirer son colis sur présentation de son bon de retrait et d\'une pièce d\'identité.';
$status['5391effead698da858a7faa593bbb15c']['remboursable'] = 'true';
$status['5391effead698da858a7faa593bbb15c']['initial_transit'] = 'true';
$status['5391effead698da858a7faa593bbb15c']['email'] = 'false';

// Ajout automatique statut inconnu 29-04-2014
$status['40a98cbbfcc148565818ade8d37bea55']['description'] = 'Destinataire informé par SMS ou mail';
$status['40a98cbbfcc148565818ade8d37bea55']['remboursable'] = 'true';
$status['40a98cbbfcc148565818ade8d37bea55']['initial_transit'] = 'true';
$status['40a98cbbfcc148565818ade8d37bea55']['email'] = 'true';

// Ajout automatique statut inconnu 29-04-2014
$status['569b82b0ccff93a0baa56625f6c0555b']['description'] = 'Le destinataire était absent lors de la livraison du colis. Rendez-vous sur http://www.colissimo.fr/monchoix pour donner vos nouvelles instructions.';
$status['569b82b0ccff93a0baa56625f6c0555b']['remboursable'] = 'true';
$status['569b82b0ccff93a0baa56625f6c0555b']['initial_transit'] = 'true';
$status['569b82b0ccff93a0baa56625f6c0555b']['email'] = 'true';

// Ajout automatique statut inconnu 29-04-2014
$status['42ae03da2909db3b40a1766d1f114e6e']['description'] = 'Destinataire absent lors de la livraison. En attente de réponse (interactivité).';
$status['42ae03da2909db3b40a1766d1f114e6e']['remboursable'] = 'true';
$status['42ae03da2909db3b40a1766d1f114e6e']['initial_transit'] = 'true';
$status['42ae03da2909db3b40a1766d1f114e6e']['email'] = 'true';

// Ajout automatique statut inconnu 19-05-2014
$status['e253ca3bd5fd7754c1a5d0f451703deb']['description'] = 'Envoi en cours d\'acheminement';
$status['e253ca3bd5fd7754c1a5d0f451703deb']['remboursable'] = 'true';
$status['e253ca3bd5fd7754c1a5d0f451703deb']['initial_transit'] = 'true';
$status['e253ca3bd5fd7754c1a5d0f451703deb']['email'] = 'false';

// Ajout automatique statut inconnu 19-05-2014
$status['47f0c55c53ef03a68f256261833d3dcc']['description'] = 'Envoi en instance au point de retrait';
$status['47f0c55c53ef03a68f256261833d3dcc']['remboursable'] = 'true';
$status['47f0c55c53ef03a68f256261833d3dcc']['initial_transit'] = 'true';
$status['47f0c55c53ef03a68f256261833d3dcc']['email'] = 'true';

// Ajout automatique statut inconnu 19-05-2014
$status['b839a001a0b58cc6c32525301045f0e4']['description'] = 'En raison d\'un défaut d\'adressage, votre colis est réacheminé vers un autre site de distribution.';
$status['b839a001a0b58cc6c32525301045f0e4']['remboursable'] = 'true';
$status['b839a001a0b58cc6c32525301045f0e4']['initial_transit'] = 'true';
$status['b839a001a0b58cc6c32525301045f0e4']['email'] = 'true';

// Ajout automatique statut inconnu 19-05-2014
$status['e578f52183fe3be6670c281b8badb54a']['description'] = 'Envoi en attente';
$status['e578f52183fe3be6670c281b8badb54a']['remboursable'] = 'true';
$status['e578f52183fe3be6670c281b8badb54a']['initial_transit'] = 'true';
$status['e578f52183fe3be6670c281b8badb54a']['email'] = 'false';

// Ajout automatique statut inconnu 19-05-2014
$status['e253ca3bd5fd7754c1a5d0f451703deb']['description'] = 'Envoi en cours d\'acheminement';
$status['e253ca3bd5fd7754c1a5d0f451703deb']['remboursable'] = 'true';
$status['e253ca3bd5fd7754c1a5d0f451703deb']['initial_transit'] = 'true';
$status['e253ca3bd5fd7754c1a5d0f451703deb']['email'] = 'false';

// Ajout automatique statut inconnu 19-05-2014
$status['8bc7334a07f3806c87e28eaa19caa8b3']['description'] = 'Votre colis est disponible dans un autre commerçant que celui choisi initialement. Le destinataire dispose de 10 jours ouvrables pour retirer son colis sur présentation d\'une pièce d\'identité et du bon de retrait.';
$status['8bc7334a07f3806c87e28eaa19caa8b3']['remboursable'] = 'true';
$status['8bc7334a07f3806c87e28eaa19caa8b3']['initial_transit'] = 'true';
$status['8bc7334a07f3806c87e28eaa19caa8b3']['email'] = 'true';

// Ajout automatique statut inconnu 19-05-2014
$status['7924260c63ebeb63d2cbc90ee093e5fe']['description'] = 'La livraison de votre colis a été reportée pour fermeture ou accès impossible.';
$status['7924260c63ebeb63d2cbc90ee093e5fe']['remboursable'] = 'true';
$status['7924260c63ebeb63d2cbc90ee093e5fe']['initial_transit'] = 'true';
$status['7924260c63ebeb63d2cbc90ee093e5fe']['email'] = 'true';

// Ajout automatique statut inconnu 04-06-2014
$status['5e76248fd6fda72f6fe7cfe9b2313eee']['description'] = 'L\'emballage de votre colis va être renforcé pour assurer sa livraison';
$status['5e76248fd6fda72f6fe7cfe9b2313eee']['remboursable'] = 'true';
$status['5e76248fd6fda72f6fe7cfe9b2313eee']['initial_transit'] = 'true';
$status['5e76248fd6fda72f6fe7cfe9b2313eee']['email'] = 'false';

// Ajout automatique statut inconnu 11-06-2014
$status['813dcee4505ae16fad1929ceb3edcdfd']['description'] = 'Envoi en cours de livraison au point de retrait';
$status['813dcee4505ae16fad1929ceb3edcdfd']['remboursable'] = 'true';
$status['813dcee4505ae16fad1929ceb3edcdfd']['initial_transit'] = 'true';
$status['813dcee4505ae16fad1929ceb3edcdfd']['email'] = 'false';

// Ajout automatique statut inconnu 16-06-2014
$status['e390531143d931f56a0d9f3d41331e4a']['description'] = 'Fin du traitement SAV Agence';
$status['e390531143d931f56a0d9f3d41331e4a']['remboursable'] = 'true';
$status['e390531143d931f56a0d9f3d41331e4a']['initial_transit'] = 'true';
$status['e390531143d931f56a0d9f3d41331e4a']['email'] = 'false';

// Ajout automatique statut inconnu 09-07-2014
$status['9f4a8196aa39da316bae671769e4e94a']['description'] = 'Identification du contenu de votre colis en cours, il est retenu par nos services';
$status['9f4a8196aa39da316bae671769e4e94a']['remboursable'] = 'true';
$status['9f4a8196aa39da316bae671769e4e94a']['initial_transit'] = 'true';
$status['9f4a8196aa39da316bae671769e4e94a']['email'] = 'false';

// Ajout automatique statut inconnu 23-07-2014
$status['d45ccd3efa354af800beeef8b0be2bc6']['description'] = 'Votre colis est pris en charge. Il est en cours d\'acheminement dans le pays de destination.';
$status['d45ccd3efa354af800beeef8b0be2bc6']['remboursable'] = 'true';
$status['d45ccd3efa354af800beeef8b0be2bc6']['initial_transit'] = 'true';
$status['d45ccd3efa354af800beeef8b0be2bc6']['email'] = 'false';

// Ajout automatique statut inconnu 23-07-2014
$status['1cf149653f3af36c56076136ca61d558']['description'] = 'Le colis ne peut actuellement être livré au Destinataire : L\'adresse de livraison est incomplète, nous recherchons la partie non renseignée pour le livrer. Le destinataire peut contacter notre service client pour apporter les compléments nécessaires.';
$status['1cf149653f3af36c56076136ca61d558']['remboursable'] = 'true';
$status['1cf149653f3af36c56076136ca61d558']['initial_transit'] = 'true';
$status['1cf149653f3af36c56076136ca61d558']['email'] = 'true';

// Ajout automatique statut inconnu 23-07-2014
$status['c6ce896edc1ac237bdfc15ae9d443a05']['description'] = 'La livraison est actuellement suspendue sur ce secteur. Le colis sera mis à disposition du destinataire dans son bureau de poste habituel.';
$status['c6ce896edc1ac237bdfc15ae9d443a05']['remboursable'] = 'true';
$status['c6ce896edc1ac237bdfc15ae9d443a05']['initial_transit'] = 'true';
$status['c6ce896edc1ac237bdfc15ae9d443a05']['email'] = 'true';

// Ajout automatique statut inconnu 25-07-2014
$status['2d066c57759990f6d6df1d62c73f8c29']['description'] = 'Echec de livraison suite à labsence du destinataire, avis de passage déposé.';
$status['2d066c57759990f6d6df1d62c73f8c29']['remboursable'] = 'true';
$status['2d066c57759990f6d6df1d62c73f8c29']['initial_transit'] = 'true';
$status['2d066c57759990f6d6df1d62c73f8c29']['email'] = 'true';

// Ajout automatique statut inconnu 25-07-2014
$status['f3e1933c1e2e86c4f9c66c3a87fed18b']['description'] = 'Echec de livraison, en attente d\'instructions pour nouvelle livraison';
$status['f3e1933c1e2e86c4f9c66c3a87fed18b']['remboursable'] = 'true';
$status['f3e1933c1e2e86c4f9c66c3a87fed18b']['initial_transit'] = 'true';
$status['f3e1933c1e2e86c4f9c66c3a87fed18b']['email'] = 'true';

// Ajout automatique statut inconnu 25-08-2014
$status['43126ce636417281c39473c3f60e9a39']['description'] = 'Le colis est réexpédié à la demande du destinataire, vers l\'adresse de son choix';
$status['43126ce636417281c39473c3f60e9a39']['remboursable'] = 'true';
$status['43126ce636417281c39473c3f60e9a39']['initial_transit'] = 'true';
$status['43126ce636417281c39473c3f60e9a39']['email'] = 'true';

// Ajout automatique statut inconnu 01-12-2014
$status['3e67b4b65be9efc5a14358e8810feff0']['description'] = 'Votre colis a quitté le bureau d\'échange, il est en cours d\'acheminement dans le pays de destination.';
$status['3e67b4b65be9efc5a14358e8810feff0']['remboursable'] = 'true';
$status['3e67b4b65be9efc5a14358e8810feff0']['initial_transit'] = 'true';
$status['3e67b4b65be9efc5a14358e8810feff0']['email'] = 'false';

// Ajout automatique statut inconnu 29-12-2014
$status['7853bfbe82b0262560d40de3f3f495d2']['description'] = 'Le colis est retourné à l\'expéditeur suite à un refus du destinataire';
$status['7853bfbe82b0262560d40de3f3f495d2']['remboursable'] = 'true';
$status['7853bfbe82b0262560d40de3f3f495d2']['initial_transit'] = 'true';
$status['7853bfbe82b0262560d40de3f3f495d2']['email'] = 'true';

// Ajout automatique statut inconnu 29-12-2014
$status['80ffc11ad1ceb9490e6d3bd18d9e38f9']['description'] = 'Votre colis est sorti de la douane.';
$status['80ffc11ad1ceb9490e6d3bd18d9e38f9']['remboursable'] = 'true';
$status['80ffc11ad1ceb9490e6d3bd18d9e38f9']['initial_transit'] = 'true';
$status['80ffc11ad1ceb9490e6d3bd18d9e38f9']['email'] = 'true';

// Ajout automatique statut inconnu 29-12-2014
$status['596a38690a9acee3456e36a6a91ab897']['description'] = 'Envoi en  attente d\'informations complémentaires de votre part';
$status['596a38690a9acee3456e36a6a91ab897']['remboursable'] = 'true';
$status['596a38690a9acee3456e36a6a91ab897']['initial_transit'] = 'true';
$status['596a38690a9acee3456e36a6a91ab897']['email'] = 'true';

// Ajout automatique statut inconnu 29-12-2014
$status['facf9a759e10a1adfa249ca7f717b77d']['description'] = 'Votre colis n\'a pas encore été remis à La Poste par l\'expediteur.';
$status['facf9a759e10a1adfa249ca7f717b77d']['remboursable'] = 'true';
$status['facf9a759e10a1adfa249ca7f717b77d']['initial_transit'] = 'true';
$status['facf9a759e10a1adfa249ca7f717b77d']['email'] = 'false';

// Ajout automatique statut inconnu 29-12-2014
$status['e34fea4398abc9f4d5b79e69b10175f2']['description'] = 'En attente d\'informations complémentaires pour nouvelle livraison';
$status['e34fea4398abc9f4d5b79e69b10175f2']['remboursable'] = 'true';
$status['e34fea4398abc9f4d5b79e69b10175f2']['initial_transit'] = 'true';
$status['e34fea4398abc9f4d5b79e69b10175f2']['email'] = 'true';

// Ajout automatique statut inconnu 28-01-2015
$status['a56b0cd94bd45a3f41dbc37809d7bfe4']['description'] = 'Votre colis n\'a pas pu être livré dans le point de retrait que vous avez sélectionné. Il sera représenté le prochain jour ouvré.';
$status['a56b0cd94bd45a3f41dbc37809d7bfe4']['remboursable'] = 'true';
$status['a56b0cd94bd45a3f41dbc37809d7bfe4']['initial_transit'] = 'true';
$status['a56b0cd94bd45a3f41dbc37809d7bfe4']['email'] = 'true';

// Ajout automatique statut inconnu 05-05-2015
$status['0443f352677b214ea037c67bd77fad47']['description'] = 'Votre colis n\'a pu être livré. Le destinataire peut nous faire part de son choix de livraison aujourd\'hui jusqu\'à minuit en cliquant ici.';
$status['0443f352677b214ea037c67bd77fad47']['remboursable'] = 'true';
$status['0443f352677b214ea037c67bd77fad47']['initial_transit'] = 'true';
$status['0443f352677b214ea037c67bd77fad47']['email'] = 'true';

// Ajout automatique statut inconnu 23-09-2015
$status['c21368b7dc18afd1da3f00e1c8238d09']['description'] = 'Votre colis n\'a pas pu être livré, il sera mis à disposition dans le bureau de Poste du destinataire.';
$status['c21368b7dc18afd1da3f00e1c8238d09']['remboursable'] = 'true';
$status['c21368b7dc18afd1da3f00e1c8238d09']['initial_transit'] = 'true';
$status['c21368b7dc18afd1da3f00e1c8238d09']['email'] = 'true';

// Ajout automatique statut inconnu 23-09-2015
$status['2b1c9b09e6b31c6783013fd5714fd8b6']['description'] = 'Votre colis a été livré au gardien.';
$status['2b1c9b09e6b31c6783013fd5714fd8b6']['remboursable'] = 'true';
$status['2b1c9b09e6b31c6783013fd5714fd8b6']['initial_transit'] = 'false';
$status['2b1c9b09e6b31c6783013fd5714fd8b6']['email'] = 'true';

// Ajout automatique statut inconnu 23-09-2015
$status['d5a354fba39c856c7288fd18d7bba14b']['description'] = 'Votre colis a été déposé dans un point postal.';
$status['d5a354fba39c856c7288fd18d7bba14b']['remboursable'] = 'true';
$status['d5a354fba39c856c7288fd18d7bba14b']['initial_transit'] = 'true';
$status['d5a354fba39c856c7288fd18d7bba14b']['email'] = 'true';

// Ajout automatique statut inconnu 23-09-2015
$status['c5fb41eaf73d181dd6035965ef351bb9']['description'] = 'Votre colis est à disposition dans le point de retrait choisi. Il est à retirer pendant 10 jours ouvrables sur présentation d\'une pièce d\'identité et du bon de retrait.';
$status['c5fb41eaf73d181dd6035965ef351bb9']['remboursable'] = 'true';
$status['c5fb41eaf73d181dd6035965ef351bb9']['initial_transit'] = 'true';
$status['c5fb41eaf73d181dd6035965ef351bb9']['email'] = 'true';

// Ajout automatique statut inconnu 23-09-2015
$status['a6dc7b0e5d31e89b47f7c2d89592cf43']['description'] = 'Votre colis est prêt à être expédié, il va être remis à La Poste.';
$status['a6dc7b0e5d31e89b47f7c2d89592cf43']['remboursable'] = 'true';
$status['a6dc7b0e5d31e89b47f7c2d89592cf43']['initial_transit'] = 'true';
$status['a6dc7b0e5d31e89b47f7c2d89592cf43']['email'] = 'false';

// Ajout automatique statut inconnu 23-09-2015
$status['beb30a9d015a8a18bbb6845c2385893d']['description'] = 'Votre colis est en cours d\'\'acheminement.';
$status['beb30a9d015a8a18bbb6845c2385893d']['remboursable'] = 'true';
$status['beb30a9d015a8a18bbb6845c2385893d']['initial_transit'] = 'true';
$status['beb30a9d015a8a18bbb6845c2385893d']['email'] = 'false';

// Ajout automatique statut inconnu 23-09-2015
$status['4301d8ce5e97ebfb03e55cbb44518467']['description'] = 'Votre colis est à disposition dans le point de retrait choisi. Il est à retirer pendant 10 jours ouvrables sur présentation d\'une pièce d\'identité et de l\'avis d\'instance.';
$status['4301d8ce5e97ebfb03e55cbb44518467']['remboursable'] = 'true';
$status['4301d8ce5e97ebfb03e55cbb44518467']['initial_transit'] = 'true';
$status['4301d8ce5e97ebfb03e55cbb44518467']['email'] = 'true';

// Ajout automatique statut inconnu 23-09-2015
$status['beb30a9d015a8a18bbb6845c2385893d']['description'] = 'Votre colis est en cours d\'\'acheminement.';
$status['beb30a9d015a8a18bbb6845c2385893d']['remboursable'] = 'true';
$status['beb30a9d015a8a18bbb6845c2385893d']['initial_transit'] = 'true';
$status['beb30a9d015a8a18bbb6845c2385893d']['email'] = 'false';

// Ajout automatique statut inconnu 23-09-2015
$status['139201d385d1f1aeaf69f6a7be65eb2e']['description'] = 'Votre colis est en cours de livraison en point de retrait.';
$status['139201d385d1f1aeaf69f6a7be65eb2e']['remboursable'] = 'true';
$status['139201d385d1f1aeaf69f6a7be65eb2e']['initial_transit'] = 'true';
$status['139201d385d1f1aeaf69f6a7be65eb2e']['email'] = 'true';

// Ajout automatique statut inconnu 23-09-2015
$status['195acea307411e49837672b4c8858789']['description'] = 'Votre colis est en préparation pour la livraison.';
$status['195acea307411e49837672b4c8858789']['remboursable'] = 'true';
$status['195acea307411e49837672b4c8858789']['initial_transit'] = 'true';
$status['195acea307411e49837672b4c8858789']['email'] = 'true';

// Ajout automatique statut inconnu 23-09-2015
$status['ce92d5235853baca87d46c5cc4725c43']['description'] = 'Votre colis est en cours d\'acheminement.';
$status['ce92d5235853baca87d46c5cc4725c43']['remboursable'] = 'true';
$status['ce92d5235853baca87d46c5cc4725c43']['initial_transit'] = 'true';
$status['ce92d5235853baca87d46c5cc4725c43']['email'] = 'false';

// Ajout automatique statut inconnu 23-09-2015
$status['cf2209cd91a51762e996800420c89e18']['description'] = 'Votre colis n\'a pas pu être livré car le destinataire était absent. Il sera remis en livraison le prochain jour ouvré.';
$status['cf2209cd91a51762e996800420c89e18']['remboursable'] = 'true';
$status['cf2209cd91a51762e996800420c89e18']['initial_transit'] = 'true';
$status['cf2209cd91a51762e996800420c89e18']['email'] = 'true';

// Ajout automatique statut inconnu 23-09-2015
$status['beb30a9d015a8a18bbb6845c2385893d']['description'] = 'Votre colis est en cours d\'\'acheminement.';
$status['beb30a9d015a8a18bbb6845c2385893d']['remboursable'] = 'true';
$status['beb30a9d015a8a18bbb6845c2385893d']['initial_transit'] = 'true';
$status['beb30a9d015a8a18bbb6845c2385893d']['email'] = 'false';

// Ajout automatique statut inconnu 23-09-2015
$status['f71480c6b402bbe4dd3eeead3fc8ad03']['description'] = 'Votre colis est livré au voisin indiqué sur l\'avis déposé dans la boîte aux lettres du destinataire.';
$status['f71480c6b402bbe4dd3eeead3fc8ad03']['remboursable'] = 'true';
$status['f71480c6b402bbe4dd3eeead3fc8ad03']['initial_transit'] = 'false';
$status['f71480c6b402bbe4dd3eeead3fc8ad03']['email'] = 'false';

// Ajout automatique statut inconnu 23-09-2015
$status['78470a363ae5cd61bfb189fc0c33e873']['description'] = 'Votre colis a été livré au gardien ou à un voisin.';
$status['78470a363ae5cd61bfb189fc0c33e873']['remboursable'] = 'true';
$status['78470a363ae5cd61bfb189fc0c33e873']['initial_transit'] = 'false';
$status['78470a363ae5cd61bfb189fc0c33e873']['email'] = 'true';

// Ajout automatique statut inconnu 25-09-2015
$status['2f4becc3622cd885a8333a8423ec257c']['description'] = 'Votre colis est disponible dans un point de retrait différent de celui choisi initialement. Le destinataire en a été informé par email. Le colis est à retirer pendant 10 jours ouvrables sur présentation d\'une pièce d\'identité et du bon de retrait.';
$status['2f4becc3622cd885a8333a8423ec257c']['remboursable'] = 'true';
$status['2f4becc3622cd885a8333a8423ec257c']['initial_transit'] = 'true';
$status['2f4becc3622cd885a8333a8423ec257c']['email'] = 'true';

// Ajout automatique statut inconnu 25-09-2015
$status['beb30a9d015a8a18bbb6845c2385893d']['description'] = 'Votre colis est en cours d\'\'acheminement.';
$status['beb30a9d015a8a18bbb6845c2385893d']['remboursable'] = 'true';
$status['beb30a9d015a8a18bbb6845c2385893d']['initial_transit'] = 'true';
$status['beb30a9d015a8a18bbb6845c2385893d']['email'] = 'false';

// Ajout automatique statut inconnu 25-09-2015
$status['e492a9bd31824be5c47d9f01de9b7aba']['description'] = 'Votre colis est livré mais le destinataire a signalé un emballage modérément dégradé.';
$status['e492a9bd31824be5c47d9f01de9b7aba']['remboursable'] = 'true';
$status['e492a9bd31824be5c47d9f01de9b7aba']['initial_transit'] = 'true';
$status['e492a9bd31824be5c47d9f01de9b7aba']['email'] = 'false';

// Ajout automatique statut inconnu 25-09-2015
$status['e492a9bd31824be5c47d9f01de9b7aba']['description'] = 'Votre colis est livré mais le destinataire a signalé un emballage modérément dégradé.';
$status['e492a9bd31824be5c47d9f01de9b7aba']['remboursable'] = 'true';
$status['e492a9bd31824be5c47d9f01de9b7aba']['initial_transit'] = 'false';
$status['e492a9bd31824be5c47d9f01de9b7aba']['email'] = 'true';

// Ajout automatique statut inconnu 25-09-2015
$status['e492a9bd31824be5c47d9f01de9b7aba']['description'] = 'Votre colis est livré mais le destinataire a signalé un emballage modérément dégradé.';
$status['e492a9bd31824be5c47d9f01de9b7aba']['remboursable'] = 'true';
$status['e492a9bd31824be5c47d9f01de9b7aba']['initial_transit'] = 'false';
$status['e492a9bd31824be5c47d9f01de9b7aba']['email'] = 'false';

// Ajout automatique statut inconnu 25-09-2015
$status['85c069b2e648bb34741139a723000eca']['description'] = 'Votre colis est livré mais le destinataire a signalé un emballage fortement dégradé.';
$status['85c069b2e648bb34741139a723000eca']['remboursable'] = 'true';
$status['85c069b2e648bb34741139a723000eca']['initial_transit'] = 'false';
$status['85c069b2e648bb34741139a723000eca']['email'] = 'false';

// Ajout automatique statut inconnu 25-09-2015
$status['beb30a9d015a8a18bbb6845c2385893d']['description'] = 'Votre colis est en cours d\'\'acheminement.';
$status['beb30a9d015a8a18bbb6845c2385893d']['remboursable'] = 'true';
$status['beb30a9d015a8a18bbb6845c2385893d']['initial_transit'] = 'true';
$status['beb30a9d015a8a18bbb6845c2385893d']['email'] = 'false';

// Ajout automatique statut inconnu 25-09-2015
$status['24348563b6838908df2bcd200c8bfb87']['description'] = 'Votre colis sera présenté le prochain jour ouvré et nécessite une remise en mains propres. Si vous êtes absent, vous pouvez nous donner vos instructions sur wwww.colissimo.fr/monchoix.';
$status['24348563b6838908df2bcd200c8bfb87']['remboursable'] = 'true';
$status['24348563b6838908df2bcd200c8bfb87']['initial_transit'] = 'true';
$status['24348563b6838908df2bcd200c8bfb87']['email'] = 'true';

// Ajout automatique statut inconnu 25-09-2015
$status['1d9d90fd88e76202f83b6a0ed1e4191b']['description'] = 'Votre colis a quitté le pays d\'origine.';
$status['1d9d90fd88e76202f83b6a0ed1e4191b']['remboursable'] = 'true';
$status['1d9d90fd88e76202f83b6a0ed1e4191b']['initial_transit'] = 'true';
$status['1d9d90fd88e76202f83b6a0ed1e4191b']['email'] = 'true';

// Ajout automatique statut inconnu 25-09-2015
$status['82018b2e83d22119deb37bf4b4828c8d']['description'] = 'Votre colis n\'a pu être livré car le destinataire était absent. Il sera remis en livraison le prochain jour ouvré. Le destinataire peut se rendre sur http://www.colissimo.fr/monchoix pour donner de nouvelles instructions.';
$status['82018b2e83d22119deb37bf4b4828c8d']['remboursable'] = 'true';
$status['82018b2e83d22119deb37bf4b4828c8d']['initial_transit'] = 'true';
$status['82018b2e83d22119deb37bf4b4828c8d']['email'] = 'true';

// Ajout automatique statut inconnu 25-09-2015
$status['2568bfbd1364e4047391d6027d7d9c11']['description'] = 'Votre colis ne peut être livré ce jour. Il sera remis en livraison au plus tôt.';
$status['2568bfbd1364e4047391d6027d7d9c11']['remboursable'] = 'true';
$status['2568bfbd1364e4047391d6027d7d9c11']['initial_transit'] = 'true';
$status['2568bfbd1364e4047391d6027d7d9c11']['email'] = 'true';

// Ajout automatique statut inconnu 25-09-2015
$status['82018b2e83d22119deb37bf4b4828c8d']['description'] = 'Votre colis n\'a pu être livré car le destinataire était absent. Il sera remis en livraison le prochain jour ouvré. Le destinataire peut se rendre sur http://www.colissimo.fr/monchoix pour donner de nouvelles instructions.';
$status['82018b2e83d22119deb37bf4b4828c8d']['remboursable'] = 'true';
$status['82018b2e83d22119deb37bf4b4828c8d']['initial_transit'] = 'true';
$status['82018b2e83d22119deb37bf4b4828c8d']['email'] = 'true';

// Ajout automatique statut inconnu 25-09-2015
$status['a7bbd0e6b2a81ffc36a908c0377923fb']['description'] = 'Votre colis n\'a pas pu être livré, il est retourné à l\'expéditeur.';
$status['a7bbd0e6b2a81ffc36a908c0377923fb']['remboursable'] = 'true';
$status['a7bbd0e6b2a81ffc36a908c0377923fb']['initial_transit'] = 'true';
$status['a7bbd0e6b2a81ffc36a908c0377923fb']['email'] = 'true';

// Ajout automatique statut inconnu 25-09-2015
$status['beb30a9d015a8a18bbb6845c2385893d']['description'] = 'Votre colis est en cours d\'\'acheminement.';
$status['beb30a9d015a8a18bbb6845c2385893d']['remboursable'] = 'true';
$status['beb30a9d015a8a18bbb6845c2385893d']['initial_transit'] = 'true';
$status['beb30a9d015a8a18bbb6845c2385893d']['email'] = 'false';

// Ajout automatique statut inconnu 25-09-2015
$status['5343eb69f1b2acfc83903f3e6395f602']['description'] = 'Votre colis ne peut être livré ce jour, l\'accès à l\'adresse de livraison étant impossible. Il sera remis en livraison au plus tôt.';
$status['5343eb69f1b2acfc83903f3e6395f602']['remboursable'] = 'true';
$status['5343eb69f1b2acfc83903f3e6395f602']['initial_transit'] = 'true';
$status['5343eb69f1b2acfc83903f3e6395f602']['email'] = 'true';

// Ajout automatique statut inconnu 25-09-2015
$status['679dbb4f095bdfcd6eff3aef603ab273']['description'] = 'Votre colis est en cours de dédouanement.';
$status['679dbb4f095bdfcd6eff3aef603ab273']['remboursable'] = 'true';
$status['679dbb4f095bdfcd6eff3aef603ab273']['initial_transit'] = 'true';
$status['679dbb4f095bdfcd6eff3aef603ab273']['email'] = 'true';

// Ajout automatique statut inconnu 25-09-2015
$status['a7bbd0e6b2a81ffc36a908c0377923fb']['description'] = 'Votre colis n\'a pas pu être livré, il est retourné à l\'expéditeur.';
$status['a7bbd0e6b2a81ffc36a908c0377923fb']['remboursable'] = 'true';
$status['a7bbd0e6b2a81ffc36a908c0377923fb']['initial_transit'] = 'true';
$status['a7bbd0e6b2a81ffc36a908c0377923fb']['email'] = 'true';

// Ajout automatique statut inconnu 25-09-2015
$status['5343eb69f1b2acfc83903f3e6395f602']['description'] = 'Votre colis ne peut être livré ce jour, l\'accès à l\'adresse de livraison étant impossible. Il sera remis en livraison au plus tôt.';
$status['5343eb69f1b2acfc83903f3e6395f602']['remboursable'] = 'true';
$status['5343eb69f1b2acfc83903f3e6395f602']['initial_transit'] = 'true';
$status['5343eb69f1b2acfc83903f3e6395f602']['email'] = 'true';

// Ajout automatique statut inconnu 25-09-2015
$status['679dbb4f095bdfcd6eff3aef603ab273']['description'] = 'Votre colis est en cours de dédouanement.';
$status['679dbb4f095bdfcd6eff3aef603ab273']['remboursable'] = 'true';
$status['679dbb4f095bdfcd6eff3aef603ab273']['initial_transit'] = 'true';
$status['679dbb4f095bdfcd6eff3aef603ab273']['email'] = 'true';

// Ajout automatique statut inconnu 21-10-2015
$status['5b0758c8312e10c8c64a016bf2e371a9']['description'] = 'Votre colis n\'a pas été retiré dans les délais impartis , il est retourné à l\'expéditeur.';
$status['5b0758c8312e10c8c64a016bf2e371a9']['remboursable'] = 'true';
$status['5b0758c8312e10c8c64a016bf2e371a9']['initial_transit'] = 'true';
$status['5b0758c8312e10c8c64a016bf2e371a9']['email'] = 'true';

// Ajout automatique statut inconnu 21-10-2015
$status['5b0758c8312e10c8c64a016bf2e371a9']['description'] = 'Votre colis n\'a pas été retiré dans les délais impartis , il est retourné à l\'expéditeur.';
$status['5b0758c8312e10c8c64a016bf2e371a9']['remboursable'] = 'true';
$status['5b0758c8312e10c8c64a016bf2e371a9']['initial_transit'] = 'true';
$status['5b0758c8312e10c8c64a016bf2e371a9']['email'] = 'true';


// Ajout automatique statut inconnu 14-11-2015
$status['eed0ba71aa1088d6847ffe23983f0eaa']['description'] = 'Votre colis est arrivé dans le pays de destination';
$status['eed0ba71aa1088d6847ffe23983f0eaa']['remboursable'] = 'true';
$status['eed0ba71aa1088d6847ffe23983f0eaa']['initial_transit'] = 'true';
$status['eed0ba71aa1088d6847ffe23983f0eaa']['email'] = 'true';

$status['de843dd17a4d6e97207e279b4d8c727f']['description'] = 'DELIVERED';
$status['de843dd17a4d6e97207e279b4d8c727f']['remboursable'] = 'false';
$status['de843dd17a4d6e97207e279b4d8c727f']['initial_transit'] = 'false';
$status['de843dd17a4d6e97207e279b4d8c727f']['email'] = 'true';






// Ajout automatique statut inconnu 16-12-2015

$status['0c0152c1fa1ba4e0a7340c70739420a6']['description'] = 'Votre colis est livré.';

$status['0c0152c1fa1ba4e0a7340c70739420a6']['remboursable'] = 'true';

$status['0c0152c1fa1ba4e0a7340c70739420a6']['initial_transit'] = 'false';

$status['0c0152c1fa1ba4e0a7340c70739420a6']['email'] = 'true';



// Ajout automatique statut inconnu 16-12-2015

$status['0c0152c1fa1ba4e0a7340c70739420a6']['description'] = 'Votre colis est livré.';

$status['0c0152c1fa1ba4e0a7340c70739420a6']['remboursable'] = 'true';

$status['0c0152c1fa1ba4e0a7340c70739420a6']['initial_transit'] = 'false';

$status['0c0152c1fa1ba4e0a7340c70739420a6']['email'] = 'true';



// Ajout automatique statut inconnu 16-12-2015

$status['0c0152c1fa1ba4e0a7340c70739420a6']['description'] = 'Votre colis est livré.';

$status['0c0152c1fa1ba4e0a7340c70739420a6']['remboursable'] = 'true';

$status['0c0152c1fa1ba4e0a7340c70739420a6']['initial_transit'] = 'false';

$status['0c0152c1fa1ba4e0a7340c70739420a6']['email'] = 'true';



?>