hs.graphicsDir = 'highslide/graphics/';
hs.outlineType = 'rounded-white';
hs.align = 'center';
hs.transitions = ['expand', 'crossfade'];
hs.fadeInOut = true;
hs.dimmingOpacity = 0.8;

hs.captionEval = 'this.thumb.alt';
hs.marginBottom = 105; // make room for the thumbstrip and the controls
hs.numberPosition = 'caption';

// Add the slideshow providing the controlbar and the thumbstrip
hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 5000,
	repeat: false,
	useControls: true,
	overlayOptions: {
		className: 'text-controls',
		position: 'bottom center',
		relativeTo: 'viewport',
		offsetY: -60
	},
	thumbstrip: {
		position: 'bottom center',
		mode: 'horizontal',
		relativeTo: 'viewport'
	}
});

// French language strings
hs.lang = {
	cssDirection: 'ltr',
	loadingText: 'Chargement...',
	loadingTitle: 'Cliquer pour annuler',
	focusTitle: 'Cliquer pour amener au premier plan',
	fullExpandTitle: 'Afficher à la taille r&eacute;elle',
	creditsText: '<i>Highslide</i>',
	creditsTitle: 'Site Web de Highslide JS',
	previousText: 'Pr&eacute;c&eacute;dente',
	nextText: 'Suivante',
	moveText: 'D&eacute;placer',
	closeText: 'Fermer',
	closeTitle: 'Fermer (esc ou &Eacute;chappement)',
	resizeTitle: 'Redimensionner',
	playText: 'Lancer',
	playTitle: 'Lancer le diaporama (barre d\'espace)',
	pauseText: 'Pause',
	pauseTitle: 'Suspendre le diaporama (barre d\'espace)',
	previousTitle: 'Pr&eacute;c&eacute;dente (fl&egrave;che gauche)',
	nextTitle: 'Suivante (fl&egrave;che droite)',
	moveTitle: 'D&eacute;placer',
	fullExpandText: 'Taille r&eacute;elle',
	number: 'Image %1 / %2',
	restoreTitle: 'Cliquer pour fermer l\'image, cliquer et faire glisser pour d&eacute;placer, utiliser les touches fl&egrave;ches droite et gauche pour suivant et pr&eacute;c&eacute;dent.'
};

