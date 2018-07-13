import React from "react";
import PropTypes from "prop-types";
import axios from "axios";

import {ThumbnailGallery} from "./Thumbnail";
import { SimplePagination } from "./Pagination";
import { withInputChange } from "../contexts/InputValueContext";

export class RequestImages extends React.PureComponent {
  constructor(props) {
    super(props);
    this.state = {
      images: [],
      meta: [],
      totalPages: "",
      links: [],
      selectedImage: '',
      currentPage : 1,
    };
    this.toggleActive = this.toggleActive.bind(this);
    this.handleChangePage = this.handleChangePage.bind(this);
    this.handleOffsetPage = this.handleOffsetPage.bind(this);
  }

  requestData() {
    const { currentPage } = this.state;
    // cancel the previous request
    if (typeof this._source != typeof undefined) {
      this._source.cancel('Operation canceled due to new request.')
    }

    // save the new request for cancellation
    this._source = axios.CancelToken.source();

    axios
    .get(this.props.source, {
      params: {
        page: currentPage
      },
      cancelToken: this._source.token,
    })
    .then(result => {
        const totalPages = Math.ceil(
          result.data.meta.total / result.data.meta.per_page
        );
        const { meta, links, data } = result.data;
        this.setState({
          images: data,
          meta,
          totalPages,
          links,
        });
      }
    )
    .catch(err => {
      if (axios.isCancel(err)) {
        console.log('Request is cancelled', err);
      } else {
        console.log(err);
      }
    })
    ;
  }

  handleChangePage(currentPage) {
    this.setState({ currentPage });
  }

  handleOffsetPage(offset, max = this.state.totalPages, min = 1) {
    const { currentPage } = this.state;
    const newPage = currentPage + offset;
    if (newPage <= max && newPage >= min) {
      this.setState({ currentPage: newPage });
    }
  }

  toggleActive(id) {
    this.setState({
      selectedImage: id
    });
  }

  componentDidMount() {
    this.requestData();
    console.log('REQUESTIMAGE: MOUNTED');
  }

  componentDidUpdate(prevProps, prevState) {
    const { currentPage, totalPages } = this.state;
    if (currentPage !== prevState.currentPage) {
      console.log('REQUESTIMAGE: UPDATED');
      // request data within the page range only
      if (currentPage <= totalPages && currentPage > 0) {
        this.requestData();
      }
    }
  }

  componentWillUnmount() {
    console.log("REQUESTIMAGE: UNMOUNTING");
    this._source && this._source.cancel();
  }

  render() {
    console.log('REQUESTIMAGE : RENDERING');
    const {totalPages, currentPage, images, selectedImage} = this.state;
    const InputChangedThumbnail = withInputChange(ThumbnailGallery);
    return (
      <React.Fragment>
        <h1>Gallery</h1>
        <div className="row gallery-tab">
          {images.map(image => {
            const isActive = selectedImage === image.id;
            const { url_cache, file_name } = image.attributes;
            const { name } = image.album.attributes;
            return (
              <div className="col-md-4 col-xs-6 thumbnail-container" key={image.id}>
                <InputChangedThumbnail
                  id ={image.id}
                  isActive={isActive}
                  sourceImage={url_cache}
                  fileName={file_name}
                  title={file_name}
                  description={name}
                  onToggleActive={this.toggleActive}
                />
              </div>
            );
            }
          )}
        </div>
        <div className="row">
          <SimplePagination
            totalPages={parseInt(totalPages)}
            currentPage={currentPage}
            onChangePage={this.handleChangePage}
            onChangeOffset={this.handleOffsetPage}
            optionalClass="gallery"
          />
        </div>
      </React.Fragment>
    );
  }
}

RequestImages.propTypes = {
  source: PropTypes.string.isRequired,
  page: PropTypes.number,
  onChangePage: PropTypes.func,
  onChangeOffset: PropTypes.func
};
