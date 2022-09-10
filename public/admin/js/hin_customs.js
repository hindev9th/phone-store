$(document).ready(function () {
    CKEDITOR.ClassicEditor.create(document.querySelector('#noi_dung_mo_ta'), {
        toolbar: {
            items: [
                'ckbox', 'uploadImage', '|',
                'exportPDF', 'exportWord', '|',
                'comment', 'trackChanges', 'revisionHistory', '|',
                'findAndReplace', 'selectAll', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'heading', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
            ],
            shouldNotGroupWhenFull: true
        },
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        heading: {
            options: [
                {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'},
                {model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5'},
                {model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6'}
            ]
        },
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        htmlEmbed: {
            showPreviews: true
        },
        cloudServices: {
            tokenUrl: 'https://91652.cke-cs.com/token/dev/Jc2GFY4DIYN6x6tfxchPmZka5MT5zwy41CnD?limit=10',
            webSocketUrl: 'wss://91652.cke-cs.com/ws'
        },
        collaboration: {
            channelId: 'document-id-2'
        },
        presenceList: {
            container: document.querySelector('#presence-list-container')
        },

        ckbox: {
            tokenUrl: 'https://91652.cke-cs.com/token/dev/Jc2GFY4DIYN6x6tfxchPmZka5MT5zwy41CnD?limit=10'
        },
        licenseKey: 'wB6Sf80sLtQu2NU94RQLAV68XzoSpmFmNgtMjq8Ia7cOlFd9JkFaoYSk1A==',
        removePlugins: [
            'Pagination',
            'Base64UploadAdapter',
            'CKFinder',
            'EasyImage',
            'WProofreader',
            'SourceEditing',
            'MathType'
        ]
    })
        .then(editor => {
            console.error(editor);
        })
        .catch(error => {
            console.error('There was a problem initializing the editor.', error);
        });
});

