import React from "react";
import Slider from "react-slick";
import axios from "axios";
import {GalleryModal} from "./Modal";

export class AlbumSlider extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      albums: [],
      images: {
        show: false,
        album_id: "",
        items: []
      },
      modal: {
        show: false,
        index: ""
      }
    };
    this.hideModal = this.hideModal.bind(this);
    this.showModal = this.showModal.bind(this);
  }

  toggleChild(album_id = "") {
    this.setState(prevState => {
      // if other album, toggle the state
      let show =
        album_id !== prevState.images.album_id ? true : !prevState.images.show;
      let parentAlbum = this.state.albums.filter(
        album => album.id === album_id
      )[0];
      let items = parentAlbum ? parentAlbum.images : [];
      return {
        images: {show, album_id, items}
      };
    });
  }

  showModal(index) {
    this.setState({
      modal: {
        show: true,
        index
      }
    });
  }

  hideModal() {
    this.setState({
      modal: {
        show: false,
        index: ""
      }
    });
  }

  requestAlbums() {
    axios
    .get("/api/albums")
    .then(result => {
      let albums = result.data;
      this.setState({albums});
    })
    .catch(error => {
      console.log(error);
    });
  }

  componentDidMount() {
    this.requestAlbums();
  }

  render() {
    var settings = {
      useTransform: false,
      infinite: true,
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    };

    let slides = this.state.albums.map(album => {
      let featured = album.images.filter(image => image.attributes.featured)[0];
      let url = featured ? featured.attributes.url_cache : "";

      return (
        <div
          key={album.id}
          className="album-slide cursor-pointer"
          onClick={() => this.toggleChild(album.id)}
        >
          <img
            src={url}
            alt={"featured-" + album.id}
            className="img-responsive"
          />
          <h2 className="font-theme color-theme">{album.attributes.name}</h2>
        </div>
      );
    });
    let showImage, showAlbumId, album, showImages;
    if (this.state.images.show) {
      showImage = this.state.images.show;
      showAlbumId = this.state.images.album_id;
      album = this.state.albums.filter(album => album.id === showAlbumId)[0];
      showImages = album.images.map((image, index) => {
        return (
          <div
            key={image.id}
            index={index}
            className="col-md-4 cursor-pointer"
            onClick={() => this.showModal(index)}
          >
            <img
              src={image.attributes.url_cache}
              alt={"image-" + image.id}
              className="img-responsive img-album-show"
            />
          </div>
        );
      });
    }

    return (
      <div>
        <Slider {...settings}>{slides}</Slider>
        {showImage ? (
          <div>
            <h2 className="font-theme color-theme">{album.attributes.name}</h2>
            {showImages}
            <GalleryModal
              heading={album.attributes.name}
              items={this.state.images.items}
              show={this.state.modal.show}
              index={this.state.modal.index}
              hide={this.hideModal}
            />
          </div>
        ) : (
          ""
        )}
      </div>
    );
  }
}

export const BridesBestSlider = () => {
  const bridesMaidSlides = bridesMaid.map(bma => (
    <div key={bma.id} className="wedding-day-bb-container">
      {bma.image ? (
        <div className="wedding-day-bb-image">
          <img src={bma.image.url_cache} alt="bb" className="img-responsive"/>
        </div>
      ) : ''
      }
      <strong>{bma.name}</strong><br/>
      <i dangerouslySetInnerHTML={{__html: bma.testimony}}></i><br/>
      <div className="wedding-day-bb-ig">
        <div className="account">
          <a href={`https://instagram.com/${bma.ig_account}`}>
            <img src="/images/instagram-logo.png" alt="ig" className="img-responsive" width="32px"/>
          </a>
        </div>
      </div>
    </div>
  ));
  const bestMenSlides = bestMen.map(bme => (
    <div key={bme.id} className="wedding-day-bb-container">
      {bme.image ? (
        <div className="wedding-day-bb-image">
          <img src={bme.image.url_cache} alt="bb" className="img-responsive"/>
        </div>
      ) : ''
      }
      <strong>{bme.name}</strong><br/>
      <i dangerouslySetInnerHTML={{__html: bme.testimony}}></i><br/>
      <div className="wedding-day-bb-ig">
        <div className="col-center">
          <a href={`https://instagram.com/${bme.ig_account}`}>
            <img src="/images/instagram-logo.png" alt="ig" className="img-responsive" width="32px"/>
          </a>
        </div>
      </div>
    </div>
  ));
  const settings = {
    useTransform: false,
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    slidesToScroll: 1,
    className: 'bb-slider',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  };
  return (
    <div>
      <Slider {...settings}>
        {bridesMaidSlides}
      </Slider>
      <Slider {...settings}>
        {bestMenSlides}
      </Slider>
    </div>
  );
};
