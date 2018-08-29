import React from "react";
import Slider from "react-slick";
import styled from "styled-components";

import { Modal } from "react-bootstrap";
import { StyledRSVPTable } from "./Table";
import { ModalImagesContext } from "./Slider";
import defaultSettings from "../utils/SliderSettings";

import StyledImageSlide from "./Slide";
import { screenMdMin } from "../backend/styles/breakpoints";
import { goldDark, goldGradient } from "../backend/styles/color";
import { urlCache } from "../backend/functionals/helper";


const GalleryModal = ({ heading, ...rest }) => {
  return (
    <ModalImagesContext.Consumer>
      {({ modal, hideModal, images, imageRoute }) => {
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
            <StyledImageSlide key={item.id} url={urlCache(imageRoute, 'gallery', item.name)}>
              <span style={{ float: "right" }}>
                {index + 1} / {countItems}
              </span>
            </StyledImageSlide>
          );
        });
        return (
          <Modal
            show={modal.show}
            onHide={hideModal}
            bsSize="large"
            {...rest}
          >
            <Modal.Header closeButton>
              <Modal.Title
                className="font-theme"
                componentClass="h1"
                style={{ color: goldDark }}
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

export const StyledGalleryModal = styled(GalleryModal)`
  top: 25%;
	bottom: auto;
	@media(min-width: ${screenMdMin}){
    top: 0;	
	}
	.modal-content {
	  background-color: #f6e397
	}
	.slick-dots {
	  position: static;
	}
`;

class RSVPModal extends React.Component {
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
    const { rsvp, ...rest } = this.props;
    return (
      <Modal
        show={this.state.modalShow}
        onHide={this.closeModal}
        {...rest}
      >
        <Modal.Header closeButton/>

        <Modal.Body>
          <h2>
            Thank You! <br/>
            Here are the confirmation details:
          </h2>
          <div className="row-center">
            <div className="col-xs-12 col-center">
              <StyledRSVPTable data={rsvp}/>
            </div>
            <button
              className="btn btn-theme"
              onClick={this.closeModal}
              style={{ minWidth: 150 }}
            >
              Ok
            </button>
          </div>
        </Modal.Body>
      </Modal>
    );
  }
}

export const StyledRSVPModal = styled(RSVPModal)`
  color: ${goldDark};
  .modal-content {
    ${goldGradient}
  } 
	.modal-header {
    .close {
      position: absolute;
      background: #ffffff;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      top: -10px;
      right: -10px;
      opacity: 1;
      margin-top: -2px;
    }
	}
  .modal-body {
    text-align: center;
    min-height: 500px;
    margin: 15px;
    z-index: 0;
    &:before {
      content: " ";
      position: absolute;
      z-index: -1;
      background: url('/images/bg-rsvp-modal.png');
      background-size: 100% 100%;
      width: 100%;
      height: 100%;
      left: 0;
      top: -5%;
    }
  }
`;
