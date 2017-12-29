import React from "react";
import axios from "axios";
import { ThumbnailGallery } from "./Thumbnail";

export class Request extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            'images' : []
        }
        this.requestData = this.requestData.bind(this);
    }
    
    requestData() {
        var th = this;
        axios.get(this.props.source)
            .then(function(result){
                console.log(result.data);
                th.setState({
                    'images': result.data
                });
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
                    return (
                        <div key={image.id}>
                            <ThumbnailGallery 
                                sourceImage={image.url_asset}
                                title={image.file_name}
                                description={image.created_at}
                            />
                        </div>
                    );
                })}
            </div>
        )
    }
}