import React from "react";
import Slider from "react-slick";
import axios from "axios";
import { GalleryModal } from "./Modal";

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
				index : '',
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
        images: { show, album_id, items }
      };
    });
  }

  showModal(index) {
    this.setState({
			modal: {
				show: true,
				index: index
			}
    });
  }

  hideModal() {
    this.setState({
			modal: {
				show: false,
				index: ''
			}
    });
  }

  requestAlbums() {
    axios
      .get("/api/albums")
      .then(result => {
        let albums = result.data;
        this.setState({ albums });
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
      slidesToShow: 2,
      slidesToScroll: 1
    };

    let slides = this.state.albums.map(album => {
      let featured = album.images.filter(image => image.attributes.featured)[0];
      let url = featured ? featured.attributes.url_cache : "";

      return (
        <div
          key={album.id}
          className="album-slide"
          onClick={() => this.toggleChild(album.id)}
        >
          <img
            src={featured ? featured.attributes.url_cache : ""}
            alt={"featured-" + album.id}
            className="img-responsive"
          />
          <h3>{album.attributes.name}</h3>
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
          <div key={image.id} index={index} className="col-md-4" onClick={() => this.showModal(index)}>
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
            <h3>{album.attributes.name}</h3>
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
