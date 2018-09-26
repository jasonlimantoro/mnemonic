import React from "react";
import axios from "axios";
import PropTypes from "prop-types";
import Slider from "react-slick";
import { Image } from "react-bootstrap";
import DisplayImages from "./DisplayImages";
import defaultSettings from "../utils/SliderSettings";
import StyledImageSlide from "./Slide";
import { urlCache } from "../backend/functionals/helper";

export const ModalImagesContext = React.createContext();

export class AlbumSlider extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      albums: [],
      images: {
        show: false,
        album: {
          id: '',
          name: ''
        },
        items: []
      },
      modal: {
        show: false,
        indexImage: ""
      }
    };

    this.hideModal = this.hideModal.bind(this);
    this.showModal = this.showModal.bind(this);
    this.requestData = this.requestData.bind(this);
  }

  requestData(){
    axios
      .get('/api/albums')
      .then(result => {
        const { data } = result;
        this.setState({
          albums : data,
        });
      })
    ;
  }

  toggleChild(album_id = "") {
    this.setState(prevState => {
      // if other album, toggle the state
      let show =
        album_id !== prevState.images.album.id ? true : !prevState.images.show;
      let album = this.state.albums.filter(album => album.id === album_id)[0];
      const { attributes: { name }, id } = album;
      let items = album ? album.images : [];
      return {
        images: {
          show,
          album: {
            name,
            id
          },
          items
        }
      };
    });
  }

  showModal(indexImage) {
    this.setState({
      modal: {
        show: true,
        indexImage
      }
    });
  }

  hideModal() {
    this.setState({
      modal: {
        show: false,
        indexImage: ""
      }
    });
  }

  componentDidMount(){
    this.requestData();
  }

  render() {
    const { albums, images, modal } = this.state;
    const { imageRoute } = this.props;

    const slides = albums.map(album => {
      const featured = album.images.filter(image => image.attributes.featured === '*')[0];
      const url = featured ? urlCache(imageRoute, 'gallery', featured.attributes.name) : "";
      return (
        <StyledImageSlide
          key={album.id}
          url={url}
          onClick={() => this.toggleChild(album.id)}
        >
          <h2 className="font-theme color-theme">{album.attributes.name}</h2>
        </StyledImageSlide>
      );
    });
    const provider = {
      modal,
      hideModal: this.hideModal,
      images: images.items,
      imageRoute,
    };

    return (
      <React.Fragment>
        <Slider {...defaultSettings}>{slides}</Slider>
        <ModalImagesContext.Provider value={provider}>
          <DisplayImages data={images} showModal={this.showModal} imageRoute={imageRoute} />
        </ModalImagesContext.Provider>
      </React.Fragment>
    );
  }
}

AlbumSlider.propTypes = {
  imageRoute: PropTypes.string.isRequired,
};


export const BridesBestSlider = ({ data, imageRoute }) => {
  const bridesMaidSlides = data.map(item => {
    const name = item.images.length ? item.images[0].name : '';
    return (
    <StyledImageSlide
      key={item.id}
      url={urlCache(imageRoute, 'bridesbest', name)}
    >
      <h3 className="bb-name">{item.name}</h3>
      <div 
				className="bb-description"
				dangerouslySetInnerHTML={{ __html:item.testimony }}
			>
      </div>
      <div className="bb-ig">
        <div className="account">
          <a href={`https://instagram.com/${item.ig_account}`}>
            <Image
              src="/images/instagram-logo.png"
              alt="ig"
              width="32px"
              responsive
            />
          </a>
        </div>
      </div>
    </StyledImageSlide>
  )});
  const settings = {
    ...defaultSettings,
    className: "bb-slide"
  };
  return <Slider {...settings}>{bridesMaidSlides}</Slider>;
};

