

require('./bootstrap');

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import MyUploadAdapter from './dist/myuploadadapter.js';

function MyCustomUploadAdapterPlugin(editor) {

    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        
        return new MyUploadAdapter(loader);
        
    };

}

ClassicEditor.create(document.querySelector('#content'), {

	extraPlugins: [MyCustomUploadAdapterPlugin]

})
.then(editor => {})
.catch(error => {})

