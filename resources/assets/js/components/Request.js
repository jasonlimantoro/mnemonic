import React from "react";
import axios from "axios";
import { ThumbnailGallery } from "./Thumbnail";

export class RequestImages extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            'images' : [],
            'selectedImageId': null
        };
        this.requestData = this.requestData.bind(this);
        this.handleClick = this.handleClick.bind(this);
    }
    
    requestData() {
        // var th = this;
        axios.get(this.props.source)
            .then(function(result){
                this.setState({
                    'images': result.data
                });
            }.bind(this));
    }

    handleClick(image){
        this.setState({
            selectedImageId: image.id
        });
    }

    componentDidMount(){
        this.requestData();
    }

    render(){
        return (
            <div>
                <h1>Gallery</h1>
                {this.state.images.map(function(image){
                    const galleryCacheUrl = '/imagecache/gallery/' + image.file_name;
                    const isActive = this.state.selectedImageId == image.id;
                    return (
                        <div className="col-md-4 col-xs-6" key={image.id}>
                            <div className="thumbnail-container" onClick={() => this.handleClick(image)}>  
                                <ThumbnailGallery 
                                    isActive = {isActive}
                                    sourceImage={galleryCacheUrl}
                                    title={image.file_name}
                                    description={image.created_at}
                                />
                            </div>
                        </div>
                    );
                }.bind(this))}
            </div>
        )
    }
}