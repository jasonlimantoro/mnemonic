import React from 'react';
import PropTypes from 'prop-types';
import $ from 'jquery';
import tinymce from 'tinymce';
// import utils
import 'tinymce/themes/modern';
import 'tinymce/plugins/wordcount';
import 'tinymce/plugins/table';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/advlist';
import 'tinymce/plugins/media';
import 'tinymce/plugins/image';
import 'tinymce/plugins/link';
import 'tinymce/plugins/preview';


export class InitializeEditor extends React.Component {
	constructor(props) {
		super(props);
	}
	componentDidMount(){
		tinymce.init({
			selector: 'textarea',
			skin_url: '/tinymce/skins/lightgray',
			menubar: true,
			branding: false,
			plugins: 'wordcount table lists advlist image link preview',
			image_advtab: true,
			image_title: true,
			automatic_uploads: true,
			file_picker_types: 'image',
			file_picker_callback: function(callback, value, meta){
				if (meta.filetype == "image") {
					$("#upload").trigger("click");
					$("#upload").on("change", function() {
						var file = this.files[0];
						var reader = new FileReader();
						reader.onload = function(e) {
							callback(e.target.result, {
								alt: ""
							});
						};
						reader.readAsDataURL(file);
					});
				}
				// let input = document.createElement('input');
				// input.setAttribute('type', 'file');
				// input.setAttribute('accept', 'image/*');
				// input.onchange = function() {
				// 	var file = this.files[0];
				// 	var reader = new FileReader();
				// 	reader.onload = function () {
				// 		var id = 'blobid' + (new Date()).getTime();
				// 		var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
				// 		var base64 = reader.result.split(',')[1];
				// 		var blobInfo = blobCache.create(id, file, base64);
				// 		blobCache.add(blobInfo);
				// 		// call the callback and populate the Title field with the file name
				// 		callback(blobInfo.blobUri(), { title: file.name });
				// 	};
				// 	reader.readAsDataURL(file);
				// };

				// input.click();
			},
		});	
	}
	
	render() {
		return (<input type="file" id="upload"/>);
	}
}