import React from "react";
import PropTypes from 'prop-types';
import axios from "axios";
import { ThumbnailGallery } from "./Thumbnail";
import { SelectForm } from "./Form";
import { SimplePagination } from "./Pagination";

export class RequestImages extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
			'images' : [],
			'meta': [],
			'totalPages': '',
			'links': [],
            'selectedImage': {
                id: null,
            }
        };
		this.handleClick = this.handleClick.bind(this);
		this.handlePage = this.handlePage.bind(this);
		this.handleOffset = this.handleOffset.bind(this);
	}
	
    requestData(newPage) {
		axios.get(this.props.source, {
			params : {
				page : newPage 
			}
			})
            .then(function(result){
				const totalPages = Math.ceil(result.data.meta.total / result.data.meta.per_page);  
                this.setState({
					'images': result.data.data,
					'meta': result.data.meta,
					'totalPages': totalPages,
					'links':result.data.links,
                });
            }.bind(this));
	}
	
	handlePage(e){
		e.preventDefault();
		const page = parseInt(e.target.innerHTML);
		this.props.onChangePage(page);
	}

	handleOffset(e, offset){
		e.preventDefault();
		this.props.onChangeOffset(offset, this.state.totalPages);
	}

    handleClick(image){
        this.setState({
            selectedImage: image
        });
        const fileName = image.attributes.file_name;
        document.getElementById('inputGalleryImage' + '-' + this.props.i.toString()).value = fileName;
    }

    componentDidMount(){
        this.requestData(this.props.page);
	}

	componentWillReceiveProps(nextProps){
		if(this.props.page != nextProps.page){
			// request data within the page range only
			if (nextProps.page <= this.state.totalPages && nextProps.page > 0)
			{
				this.requestData(nextProps.page);
			}
		}
	}

    render(){
        return (
            <div>
                <h1>Gallery</h1>
                {this.state.images.map(function(image){
                    const isActive = this.state.selectedImage.id == image.id;
                    return (
                        <div className="col-md-4 col-xs-6" key={image.id}>
                            <div className="thumbnail-container" onClick={() => this.handleClick(image)}>  
                                <ThumbnailGallery
                                    selectedImage = {this.state.selectedImage}
                                    isActive = {isActive}
                                    sourceImage={image.attributes.url_cache}
                                    title={image.attributes.file_name}
									description={image.album.attributes.name}
									i={this.props.i}
                                />
                            </div>
                        </div>
                    );
                }.bind(this))}

				<SimplePagination 
					totalPages={parseInt(this.state.totalPages)} 
					currentPage={this.props.page} 
					onChangePage={this.handlePage}
					onChangeOffset={this.handleOffset}
					optionalClass="gallery"
				/>
            </div>
				
        )
    }
}

RequestImages.propTypes = {
	source : PropTypes.string.isRequired,
	page : PropTypes.number,
	onChangePage : PropTypes.func,
	onChangeOffset : PropTypes.func
}

export class RequestAlbums extends React.Component {
    constructor(props){
        super(props);
        this.state = {
            albums : []
        };
		this.requestData = this.requestData.bind(this);
    }

    requestData() {
        axios.get(this.props.source)
            .then(function(result){
                this.setState({
                    albums: result.data
                });
            }.bind(this));
    }

    componentDidMount() {
        this.requestData();
    }

    render() {
        return(
            <SelectForm label="Assign to album: " name="album">
                <option value={4}>Select Album</option>
                {this.state.albums.map(function(album){
                    return (
                        <option key={album.id} value={album.id}>{album.name}</option>
                    );
                })}
            </SelectForm>
        );
    }
}