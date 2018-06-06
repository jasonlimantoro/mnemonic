import React from "react";
import PropTypes from "prop-types";
import axios from "axios";
import { ThumbnailGallery } from "./Thumbnail";
import { SelectForm } from "./Form";
import { SimplePagination } from "./Pagination";

export class RequestImages extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      images: [],
      meta: [],
      totalPages: "",
      links: [],
      selectedImage: {
        id: null
      }
    };
    this.handleClick = this.handleClick.bind(this);
    this.handleChangePage = this.handleChangePage.bind(this);
    this.handleOffset = this.handleOffset.bind(this);
  }

  requestData(newPage) {
    axios
      .get(this.props.source, {
        params: {
          page: newPage
        }
      })
      .then(
        function(result) {
          const totalPages = Math.ceil(
            result.data.meta.total / result.data.meta.per_page
          );
          this.setState({
            images: result.data.data,
            meta: result.data.meta,
            totalPages: totalPages,
            links: result.data.links
          });
        }.bind(this)
      );
  }

  handleChangePage(page) {
    this.props.onChangePage(page);
  }

  handleOffset(offset) {
    this.props.onChangeOffset(offset, this.state.totalPages);
  }

  handleClick(image) {
    this.setState({
      selectedImage: image
    });
    const fileName = image.attributes.file_name;
    document.getElementById(
      "inputGalleryImage" + "-" + this.props.i.toString()
    ).value = fileName;
  }

  componentDidMount() {
    this.requestData(this.props.page);
  }

  componentWillReceiveProps(nextProps) {
    if (this.props.page != nextProps.page) {
      // request data within the page range only
      if (nextProps.page <= this.state.totalPages && nextProps.page > 0) {
        this.requestData(nextProps.page);
      }
    }
  }

  render() {
    return (
      <div>
        <h1>Gallery</h1>
        <div className="row gallery-tab">
          {this.state.images.map(
            function(image) {
              const isActive = this.state.selectedImage.id == image.id;
              return (
                <div className="col-md-4 col-xs-6" key={image.id}>
                  <div
                    className="thumbnail-container"
                    onClick={() => this.handleClick(image)}
                  >
                    <ThumbnailGallery
                      selectedImage={this.state.selectedImage}
                      isActive={isActive}
                      sourceImage={image.attributes.url_cache}
                      title={image.attributes.file_name}
                      description={image.album.attributes.name}
                      i={this.props.i}
                    />
                  </div>
                </div>
              );
            }.bind(this)
          )}
        </div>
        <div className="row">
          <SimplePagination
            totalPages={parseInt(this.state.totalPages)}
            currentPage={this.props.page}
            onChangePage={this.handleChangePage}
            onChangeOffset={this.handleOffset}
            optionalClass="gallery"
          />
        </div>
      </div>
    );
  }
}

RequestImages.propTypes = {
  source: PropTypes.string.isRequired,
  page: PropTypes.number,
  onChangePage: PropTypes.func,
  onChangeOffset: PropTypes.func
};
