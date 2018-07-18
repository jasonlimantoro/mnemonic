import React from "react";
import PropTypes from "prop-types";
import axios from "axios";

import { Col, Row } from "react-bootstrap";
import { ThumbnailGallery } from "./Thumbnail";
import { SimplePagination } from "./Pagination";
import Refresh from "./Refresh";

import { str_limit } from "../functionals/helper";


export class Images extends React.PureComponent {
  constructor(props) {
    super(props);
    this.state = {
      images: [],
      totalPages: "",
      selectedImage: '',
      currentPage: 1,
      loading: false,
    };

    this.handleClick = this.handleClick.bind(this);
    this.handleRefresh = this.handleRefresh.bind(this);
    this.handleChangePage = this.handleChangePage.bind(this);
    this.handleOffsetPage = this.handleOffsetPage.bind(this);
  }

  requestData(page) {
    // cancel the previous request
    if (typeof this._source != typeof undefined) {
      this._source.cancel('Operation canceled due to new request.')
    }

    // save the new request for cancellation
    this._source = axios.CancelToken.source();

    const { source } = this.props;

    axios
    .get(source, {
      params: { page },
      cancelToken: this._source.token,
    })
    .then(result => {
      const { data } = result.data;
      const { total, per_page } = result.data.meta;
      const totalPages = Math.ceil(total / per_page);
      this.setState({
        images: data,
        totalPages,
      });
    })
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
  };

  handleOffsetPage(offset, max = this.state.totalPages, min = 1) {
    const { currentPage } = this.state;
    const newPage = currentPage + offset;
    if (newPage <= max && newPage >= min) {
      this.setState({ currentPage: newPage });
    }
  };

  handleClick(id, name) {
    const { store: { dispatch } } = this.props;
    this.toggleActive(id);
    dispatch({ type: 'UPDATE_INPUT', payload: name });
  };

  handleRefresh() {
    const { currentPage } = this.state;
    this.setState({ loading: true }, () => {
      this.requestData(currentPage);
      setTimeout(() => {
        this.setState({
          loading: false,
        });
      }, 1000);
    });
  }

  toggleActive(id) {
    this.setState({
      selectedImage: id
    });
  }

  componentDidMount() {
    const { currentPage } = this.state;
    this.requestData(currentPage);
  }

  componentDidUpdate(prevProps, prevState) {
    const { currentPage, totalPages } = this.state;
    if (currentPage !== prevState.currentPage) {
      // request data within the page range only
      if (currentPage <= totalPages && currentPage > 0) {
        this.requestData(currentPage);
      }
    }
  }

  componentWillUnmount() {
    this._source && this._source.cancel();
  }

  render() {
    const { state : { totalPages, currentPage, images, selectedImage, loading }, handleRefresh, handleClick, } = this;
    return (
      <React.Fragment>
        <Refresh loading={loading} onRefresh={handleRefresh}/>
        <h1>Gallery</h1>
        <Row className="gallery-tab">
          {images.map(image => {
              const isActive = selectedImage === image.id;
              const { url_cache, file_name } = image.attributes;
              const { name } = image.album.attributes;
              return (
                <Col
                  md={4} xs={6}
                  className="thumbnail-container"
                  key={image.id}
                  onClick={() => handleClick(image.id, file_name)}
                >
                  <ThumbnailGallery src={url_cache} className={`thumbnail-gallery ${isActive ? 'active' : ''}`}>
                    <p>Name: <b>{str_limit(file_name)}</b></p>
                    <p>Album: <b>{name}</b></p>
                  </ThumbnailGallery>
                </Col>
              );
            }
          )}
        </Row>
        <Row>
          <SimplePagination
            totalPages={parseInt(totalPages)}
            currentPage={currentPage}
            onChangePage={this.handleChangePage}
            onChangeOffset={this.handleOffsetPage}
            optionalClass="gallery"
          />
        </Row>
      </React.Fragment>
    );
  }
}

Images.propTypes = {
  source: PropTypes.string.isRequired,
  page: PropTypes.number,
  onChangePage: PropTypes.func,
  onChangeOffset: PropTypes.func
};
