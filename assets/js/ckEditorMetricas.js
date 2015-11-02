/**
 * Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

/* exported initSample */

var initSample = (function () {
    var wysiwygareaAvailable = isWysiwygareaAvailable(),
		isBBCodeBuiltIn = !!CKEDITOR.plugins.get('bbcode');

    return function () {
        var editorErrores = CKEDITOR.document.getById('editorErrores');
        //var editorTipos = CKEDITOR.document.getById('editorTipos');
        // :(((
        if (isBBCodeBuiltIn) {
            editorErrores.setHtml(
				'[url=http://ckeditor.com]CKEditor[/url].'
			);
        }
        /*if (isBBCodeBuiltIn) {
            editorTipos.setHtml(
				'[url=http://ckeditor.com]CKEditor[/url].'
			);
        }*/

        // Depending on the wysiwygare plugin availability initialize classic or inline editor.
        if (wysiwygareaAvailable) {
            CKEDITOR.replace('editorErrores');
        } else {
            editorErrores.setAttribute('contenteditable', 'true');
            CKEDITOR.inline('editorErrores');

            // TODO we can consider displaying some info box that
            // without wysiwygarea the classic editor may not work.
        }

        /*if (wysiwygareaAvailable) {
            CKEDITOR.replace('editorTipos');
        } else {
            editorElement.setAttribute('contenteditable', 'true');
            CKEDITOR.inline('editorTipos');

            // TODO we can consider displaying some info box that
            // without wysiwygarea the classic editor may not work.
        }*/
    };

    function isWysiwygareaAvailable() {
        // If in development mode, then the wysiwygarea must be available.
        // Split REV into two strings so builder does not replace it :D.
        if (CKEDITOR.revision == ('%RE' + 'V%')) {
            return true;
        }

        return !!CKEDITOR.plugins.get('wysiwygarea');
    }
})();

