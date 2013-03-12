/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.ignoreEmptyParagraph = false;
	config.autoParagraph = false;
	config.enterMode = CKEDITOR.ENTER_DIV;
	
	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';
	config.filebrowserBrowseUrl = 'kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = 'kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = 'kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = 'kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = 'kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = 'kcfinder/upload.php?type=flash';
};
