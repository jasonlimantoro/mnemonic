import React from "react";
import Slider from "react-slick";
import { Modal } from "react-bootstrap";
import { RSVPTable } from "./Table";
import { ModalImagesContext } from "./Slider";
import defaultSettings from "../utils/SliderSettings";
import ImageSlide from "./Slide";

export const GalleryModal = ({ heading }) => {
  return (
    <ModalImagesContext.Consumer>
      {({ modal, hideModal, images }) => {
        const settings = {
          ...defaultSettings,
          slidesToShow: 1,
          dots: true,
          initialSlide: modal.indexImage,
          responsive: [],
        };
        const countItems = images.length;
        const items = images.map((item, index) => {
          return (
            <ImageSlide key={item.id} url={item.url_cache}>
              <span style={{ float: "right" }}>
                {index + 1} / {countItems}
              </span>
            </ImageSlide>
          );
        });
        return (
          <Modal
            show={modal.show}
            onHide={hideModal}
            bsSize="large"
            className="gallery-modal"
          >
            <Modal.Header closeButton>
              <Modal.Title
                className="font-theme modal-album-title"
                componentClass="h1"
              >
                Album: {heading}
              </Modal.Title>
            </Modal.Header>
            <Modal.Body>
              <Slider {...settings}>{items}</Slider>
            </Modal.Body>
          </Modal>
        );
      }}
    </ModalImagesContext.Consumer>
  );
};

export class RSVPModal extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      modalShow: true
    };
    this.closeModal = this.closeModal.bind(this);
    this.showModal = this.showModal.bind(this);
  }

  closeModal() {
    this.setState({
      modalShow: false
    });
  }

  showModal() {
    this.setState({
      modalShow: true
    });
  }

  render() {
    const { rsvp } = this.props;
    return (
      <Modal
        show={this.state.modalShow}
        onHide={this.closeModal}
        className={"rsvp-success-modal"}
      >
        <Modal.Header closeButton/>

        <Modal.Body>
          <h2>
            Thank You! <br/>
            Here are the confirmation details:
          </h2>
          <div className="row-center">
            <div className="col-xs-12 col-center">
              <RSVPTable data={rsvp}/>
            </div>
            <button
              className="btn btn-theme dismiss-modal"
              onClick={this.closeModal}
            >
              Ok
            </button>
          </div>
        </Modal.Body>
      </Modal>
    );
  }
}
