import React from 'react';
import PropTypes from 'prop-types';
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
import 'tinymce/plugins/paste';


export class InitializeEditor extends React.Component {
	constructor(props) {
		super(props);
	}
	componentDidMount(){
		let editor_config = {
			path_absolute: '/',
			relative_urls: false,
			selector: 'textarea',
			skin_url: '/tinymce/skins/lightgray',
			menubar: true,
			branding: false,
			plugins: 'wordcount table lists advlist image link preview media, paste',
			paste_as_text: true,
			image_advtab: true,
			image_title: true,
			automatic_uploads: true,
			file_picker_types: 'image',
			file_browser_callback : function(field_name, url, type, win) {
				var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
				var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
	
				var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
				if (type == 'image') {
					cmsURL = cmsURL + "&type=Images";
				} else {
					cmsURL = cmsURL + "&type=Files";
				}
	
				tinyMCE.activeEditor.windowManager.open({
					file : cmsURL,
					title : 'File Manager',
					width : x * 0.8,
					height : y * 0.8,
					resizable : "yes",
					close_previous : "no"
				});
			},
		}

		tinymce.init(editor_config);	
	}
	
	render() {
		return null;
	}
}