import React from "react";
import Slider from "react-slick";
import DisplayImages from "./DisplayImages";
import defaultSettings from '../utils/SliderSettings';
import ImageSlide from "./Slide";

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
        indexImage: "",
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
      let album = this.state.albums.filter(
        album => album.id === album_id
      )[0];
      const { name, id } = album;
      let items = album ? album.images : [];
      return {
        images: {
          show,
          album: {
            name, id,
          },
          items
        },
      };
    });
  }

  showModal(indexImage) {
    this.setState({
      modal: {
        show: true,
        indexImage,
      }
    });
  }

  hideModal() {
    this.setState({
      modal: {
        show: false,
        indexImage: "",
      }
    });
  };

  render() {
    const { albums, images, modal } = this.state;

    const slides = albums.map(album => {
      const featured = album.images.filter(image => image.featured)[0];
      const url = featured ? featured.url_cache : "";

      return (
        <ImageSlide 
					key={album.id}
					data={album}
					url={url}
					containerClass={"album-slide cursor-pointer"}
					onClick={() => this.toggleChild(album.id)}
        >
          <h2 className="font-theme color-theme">{album.name}</h2>
        </ImageSlide>
      );
    });
    const provider = {
      modal,
      hideModal: this.hideModal,
      images: images.items,
    };

    return (
      <div>
        <Slider {...defaultSettings}>{slides}</Slider>
        <ModalImagesContext.Provider value={provider}>
          <DisplayImages data={images} showModal={this.showModal} />
        </ModalImagesContext.Provider>
      </div>
    );
  }
}

export const BridesBestSlider = ({ data }) => {
  const bridesMaidSlides = data.map(item => (
    <ImageSlide 
			key={item.id}
			url={item.image.url_cache}
			containerClass={"wedding-day-bb-container"}
			imageClass={"wedding-day-bb-image"}
    >
     <strong>{item.name}</strong><br/>
     <i dangerouslySetInnerHTML={{ __html: item.testimony }}></i><br/>
     <div className="wedding-day-bb-ig">
       <div className="account">
         <a href={`https://instagram.com/${item.ig_account}`}>
           <img src="/images/instagram-logo.png" alt="ig" className="img-responsive" width="32px"/>
         </a>
       </div>
     </div>

    </ImageSlide>
  ));
  const settings = {
    ...defaultSettings,
    className : 'bb-slide'
  };
  return (
    <Slider {...settings}>
      {bridesMaidSlides}
    </Slider>
  );
};
