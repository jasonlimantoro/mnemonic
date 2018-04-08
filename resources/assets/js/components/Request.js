import React from "react";
import { Pagination } from "react-bootstrap";
import axios from "axios";
import { ThumbnailGallery } from "./Thumbnail";
import { SelectForm } from "./Form";

export class RequestImages extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
			'images' : [],
			'meta': [],
			'links': [],
            'selectedImage': {
                id: null,
            }
        };
		this.handleClick = this.handleClick.bind(this);
		this.handlePage = this.handlePage.bind(this);
	}
	
    requestData(newPage) {
		axios.get(this.props.source, {
			params : {
				page : newPage 
			}
			})
            .then(function(result){
			console.log(result);
			console.log(result.data.meta);
                this.setState({
					'images': result.data.data,
					'meta': result.data.meta,
					'links':result.data.links
                });
            }.bind(this));
	}
	
	handlePage(e){
		e.preventDefault();
		const page = parseInt(e.target.innerHTML);
		this.props.onChangePage(page);
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
			this.requestData(nextProps.page);
		}
	}

    render(){
		const totalItem = this.state.meta.total;
		const perPage = this.state.meta.per_page;
		const totalPagination = Math.ceil(totalItem / perPage);
		let paginateItems = [];
		for(let page = 1; page <= totalPagination; page++)
		{
			paginateItems.push(
				<li key={page} className={this.props.page === page ? 'active': ''}>
					<a href="#" onClick={this.handlePage}>{page}</a>
				</li>
			);
		}
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
				<nav aria-label="...">
					<ul className="pagination">
						<li><a href="#" aria-label="Previous"><span>«</span></a></li>
						{paginateItems}
						<li><a href="#" aria-label="Next"><span>»</span></a></li>
					</ul>
				</nav>
            </div>
        )
    }
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