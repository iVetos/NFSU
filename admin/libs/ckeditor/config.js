/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */


CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'ru';
	// config.uiColor = '#fff';
	config.extraPlugins = 'youtube';
    config.filebrowserUploadUrl = '../admin/libs/ckeditor/upload.php';
    config.toolbar = 'MyToolbar';
    config.toolbar_MyToolbar =
	[
        { name: 'action',      items : [ 'Undo','Redo' ] },
        { name: 'clipboard',   items : [ 'Source','-','Cut','Copy','Paste','PasteText','PasteFromWord' ] },
        { name: 'editing',     items : [ 'Find','Replace' ] },
        { name: 'tools',       items : [ 'Maximize', 'ShowBlocks' ] },
        '/',
        { name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
        { name: 'links',       items : [ 'Link','Unlink'] },
        { name: 'insert',      items : [ 'Image','Youtube', '-', 'Table','HorizontalRule','SpecialChar' ] },
        '/',
        { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript' ] },
        { name: 'styles',      items : [ 'Font','FontSize' ] },
        { name: 'colors',      items : [ 'TextColor','BGColor' ] }
	];
    /*
	config.toolbar_MyToolbar =
	[
        { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript' ] },
		{ name: 'action',      items : [ 'Undo','Redo' ] },
        { name: 'clipboard',   items : [ 'Source','-','Cut','Copy','Paste','PasteText','PasteFromWord' ] },
        { name: 'editing',     items : [ 'Find','Replace' ] },
        '/',
        { name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
        { name: 'links',       items : [ 'Link','Unlink'] },
        { name: 'insert',      items : [ 'Image','Youtube', '-', 'Table','HorizontalRule','SpecialChar' ] },
        '/',
        { name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] },
        { name: 'colors',      items : [ 'TextColor','BGColor' ] },
        { name: 'tools',       items : [ 'Maximize', 'ShowBlocks' ] }
	];*/
};