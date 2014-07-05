/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.toolbar = 'MXICToolbar';

	config.toolbar_MXICToolbar =
	[
		['Source','-','Maximize','ShowBlock'],
		['Bold','Italic','Underline','Strike'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Link','Unlink','Anchor'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
		'/',
		['Styles','Format','Font','FontSize'],
		['TextColor','BGColor'],
		['Image','Table','HorizontalRule','Smiley','SpecialChar','PageBreak']
	];
};
