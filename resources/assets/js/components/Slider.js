import React from "react";
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
      albums: this.props.data,
      images: {
        show: false,
        album: "",
        items: []
      },
      modal: {
        show: false,
        indexImage: ""
      }
    };

    this.hideModal = this.hideModal.bind(this);
    this.showModal = this.showModal.bind(this);
  }

  toggleChild(album_id = "") {
    this.setState(prevState => {
      // if other album, toggle the state
      let show =
        album_id !== prevState.images.album.id ? true : !prevState.images.show;
      let album = this.state.albums.filter(album => album.id === album_id)[0];
      const { name, id } = album;
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

  render() {
    const { albums, images, modal } = this.state;
    const { imageRoute } = this.props;

    const slides = albums.map(album => {
      const featured = album.images.filter(image => image.featured)[0];
      const url = featured ? urlCache(imageRoute, 'gallery', featured.name) : "";
      return (
        <StyledImageSlide
          key={album.id}
          data={album}
          url={url}
          onClick={() => this.toggleChild(album.id)}
        >
          <h2 className="font-theme color-theme">{album.name}</h2>
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

export const BridesBestSlider = ({ data, imageRoute }) => {
  const bridesMaidSlides = data.map(item => (
    <StyledImageSlide
      key={item.id}
      url={urlCache(imageRoute, 'bridesbest', item.image.name)}
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
  ));
  const settings = {
    ...defaultSettings,
    className: "bb-slide"
  };
  return <Slider {...settings}>{bridesMaidSlides}</Slider>;
};

