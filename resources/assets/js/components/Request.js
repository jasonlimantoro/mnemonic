import React from "react";
import axios from "axios";
import { ThumbnailGallery } from "./Thumbnail";
import { SelectForm } from "./Form";

export class RequestImages extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            'images' : [],
            'selectedImage': {
                id: null,
            }
        };
		this.handleClick = this.handleClick.bind(this);
    }
    
    requestData() {
        // var th = this;
        axios.get(this.props.source)
            .then(function(result){
                this.setState({
                    'images': result.data.data
                });
            }.bind(this));
    }

    handleClick(image){
        this.setState({
            selectedImage: image
        });
        const fileName = image.file_name;
        document.getElementById('inputGalleryImage' + '-' + this.props.i.toString()).value = fileName;
    }

    componentDidMount(){
        this.requestData();
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
                                    title={"Name: " + image.attributes.file_name}
									description={"Album: " + image.album.attributes.name}
									i={this.props.i}
                                />
                            </div>
                        </div>
                    );
                }.bind(this))}
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